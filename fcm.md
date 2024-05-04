# Firebase Cloud Messaging (FCM)

- open vpn
- sign into your firebase account
- open your project > Settings > Service accounts and click "Generate new private key". 
- take the json file and put it inside a folder **private** and rename it to be **"fcm.json"** 
- run the command:
```bash
echo "/private" >> .gitignore 

composer require google/apiclient

touch config/fcm.php

echo "\nFCM_PROJECT_ID=" >> .env 

php artisan make:class DTOs/FcmDTO

php artisan make:class Helpers/FcmHelper

php artisan make:model FcmToken -m

php artisan make:trait Traits/Models/HasFcmToken
```
- go to [env](.env) and add your project id:
> Get your project id firebase dashbord > Settings > General
- go to [config/fcm.php](config/fcm.php) and add this code:
```php
<?php

return [
    'project_id' => env('FCM_PROJECT_ID', null),

    'config_file_path' => base_path("private/fcm.json"),
];

```

- go to [FcmDTO](app/DTOs/FcmDTO.php) remove the old code and put this code instead:
```php
<?php

namespace App\DTOs;

readonly class FcmDTO
{
    public function __construct(
        private string $token,
        private string $title,
        private string $body,
        private ?array $data = null,
        private ?string $image = null,
        private string $clickAction = 'FLUTTER_NOTIFICATION_CLICK',
    ) {
    }

    public function toArray(): array
    {
        $array = [
            'token' => $this->token,
            'notification' => [
                'title' => $this->title,
                'body' => $this->body,
            ],
            'android' => [
                'notification' => [
                    'click_action' => $this->clickAction,
                    'title' => $this->title,
                    'body' => $this->body,
                    'image' => $this->image,
                ],
            ],
            'apns' => [
                'fcm_options' => [
                    'image' => $this->image,
                ],
            ],
        ];

        if ($this->data) {
            $array['data'] = $this->data;
        }

        return $array;
    }
}

```

- go to [FcmHelper](app/Helpers/FcmHelper.php) remove the old code and put this code instead:
```php
<?php

namespace App\Helpers;

use App\DTOs\FcmDTO;
use Exception;
use Illuminate\Support\Facades\Http;

class FcmHelper
{
    static private function getFcmApiUrl(): string
    {
        $projectId = config('fcm.project_id');

        throw_if(empty($projectId), new Exception('You did\'t provide any project id yet'));

        return "https://fcm.googleapis.com/v1/projects/$projectId/messages:send";
    }

    static private function getFcmHeader(): array
    {
        $credentialsFilePath = config('fcm.config_file_path');
        $client = new \Google_Client();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $client->refreshTokenWithAssertion();
        $token = $client->getAccessToken();
        $access_token = $token['access_token'];

        return [
            "Authorization" => "Bearer $access_token",
            'Content-Type' => 'application/json'
        ];
    }

    static public function send(FcmDTO ...$dtos): void
    {
        foreach ($dtos as $dto) {
            $payload['message'] = $dto->toArray();
            Http::withHeaders(static::getFcmHeader())
                ->post(static::getFcmApiUrl(), $payload);
        }
    }
}

```

- now you can use **FcmHelper::send($dtos)** to send notifications.

- go to **fcm_tokens_migration** remove the old code and put this code instead:
```php
<?php

use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fcm_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('token');
            $table->foreignIdFor(User::class)
                ->constrained()
                ->cascadeOnDelete()
                ->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fcm_tokens');
    }
};
```
- run in the terminal:
```bash
php artisan migrate
```
- go to [FcmToken Model](app/Models/FcmToken.php) remove the old code and put this code instead:
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FcmToken extends Model
{
    use HasFactory;

    protected $fillable = [
        'token',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
```
- go to [HasFcmToken Trait](app/Models/User.php) remove the old code and put this code instead:
```php
<?php

namespace App\Traits\Models;

use App\Models\FcmToken;
use Illuminate\Database\Eloquent\Relations\HasMany;

trait HasFcmToken
{
    public function tokens(): HasMany
    {
        return $this->hasMany(FcmToken::class);
    }
}
```
- go to [User Model](app/Models/User.php) and add this trait:
```php
use HasFcmToken;
```