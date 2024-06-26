<?php

namespace App\Helpers;

use App\DTOs\FcmDTO;
use Exception;
use Illuminate\Support\Facades\Http;

class FcmHelper
{
    private static function getFcmApiUrl(): string
    {
        $projectId = config('fcm.project_id');

        dump("https://fcm.googleapis.com/v1/projects/$projectId/messages:send");

        throw_if(empty($projectId), new Exception('You did\'t provide any project id yet'));

        return "https://fcm.googleapis.com/v1/projects/$projectId/messages:send";
    }

    private static function getFcmHeader(): array
    {
        $credentialsFilePath = config('fcm.config_file_path');
        $client = new \Google_Client();
        $client->setAuthConfig($credentialsFilePath);
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $client->refreshTokenWithAssertion();
        $token = $client->getAccessToken();
        $access_token = $token['access_token'];

        dump([
            'Authorization' => "Bearer $access_token",
            'Content-Type' => 'application/json',
        ]);

        return [
            'Authorization' => "Bearer $access_token",
            'Content-Type' => 'application/json',
        ];
    }

    public static function send(FcmDTO ...$dtos): void
    {
        foreach ($dtos as $dto) {
            $payload['message'] = $dto->toArray();
            $res = Http::withHeaders(static::getFcmHeader())
                ->post(static::getFcmApiUrl(), $payload);
            dump($res->body());
        }
    }

    public static function sendToTopic(string $topic, string $title, string $body, ?string $image = null): void
    {
        $payload['message'] = [
            "to" => "/topics/$topic",
            'notification' => [
                'title' => $title,
                'body' => $body,
            ],
            'android' => [
                'notification' => [
                    'click_action' => 'FLUTTER_NOTIFICATION_CLICK',
                    'title' => $title,
                    'body' => $body,
                    'image' => $image,
                ],
            ],
            'apns' => [
                'fcm_options' => [
                    'image' => $image,
                ],
            ],
        ];
        $res = Http::withHeaders(static::getFcmHeader())
            ->post(static::getFcmApiUrl(), $payload);
    }
}
