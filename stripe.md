# Stripe payment

- open vpn
- sign in to your stripe account
- open [api keys](https://dashboard.stripe.com/test/apikeys) 
- add stripe publishable key to your **.env** file:
```env
STRIPE_KEY="Your publishable key"
STRIPE_SECRET="Your secret key"
```
- install cashier:
```bash
composer require laravel/cashier

php artisan vendor:publish --tag="cashier-migrations"

php artisan migrate

php artisan vendor:publish --tag="cashier-config"
```
- add this trait to [User Model](app/Models/User.php) 
```php
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    //this trait
    use Billable;
```
- add this trait to [User Model](app/Models/User.php) 
```php
class User extends Authenticatable
{
    use HasFactory, Notifiable;
    //this trait
    use Billable;
```
- make stripe helper to handle the payment on the server-side:
    - execute this command:
    ```bash
    php artisan make:class Helpers/StripeHelper
    ```
    - remove the code inside [StripeHelper](app/Helpers/StripeHelper.php) and copy this code:
    ```php
    <?php

    namespace App\Helpers;

    use Illuminate\Database\Eloquent\Collection;

    class StripeHelper
    {
        public function charge($user, $request, $confirmation_number, $reservations = null)
        {
            if (session()->has('coupon')) {
                $discountValue = session()->get('coupon')['discount'] / 100;
                $discountCode = session()->get('coupon')['name'];
            } else {
                $discountCode = 'NULL';
                $discountValue = 0;
            }
            $payment = $user->charge(ceil($request->amount), $request->payment_method_id, [
                'receipt_email' => $request->email,
                'statement_descriptor' => 'Coders Shop',
                'description' => 'You bought my swag!',
                'return_url' => route('checkout-success'),
                'metadata' => [
                    'Confirmation # ' => $confirmation_number,
                    'Item(s)' => json_encode([
                        'Product Code: dmc-alp ' .
                            'Product Name: damascus to aleppo ' .
                            'Product Qty: 1 '
                    ]),
                    'Total Item(s) Count' => $reservations?->sum(fn ($item) => $item->price) ?? 100,
                    'Discount' => $discountCode . ': -$' . $discountValue . ' off',
                ],
            ]);
            $payment = $payment->asStripePaymentIntent();
        }
    }
    ```
    - create [CheckoutController](app/Http/Controllers/CheckoutController.php) and add this code to it:
    ```php
    <?php

    namespace App\Http\Controllers;
    
    use App\Helpers\StripeHelper;
    use App\Models\User;
    use Illuminate\Support\Str;
    use Illuminate\Http\Request;
    use Stripe\Exception\CardException;

    public function store(StripeHelper $stripeHelper, Request $request) {
        try {
            $confirmation_number = Str::uuid();
            $user = auth()->user() ?? new User;

            $paymentService->charge($user, $request, $confirmation_number);

            // add the rest of the logic here

            return response()->noContent();
        }catch (CardException $e) {
            return response([
                'errors' => $e->getMessage()
            ], 500);
        }catch (\Error $e) {
            return response([
                'errors' => $e->getMessage()
            ], 500);
        }
    }
    ```
    - add the route to [web.php](routes/web.php):
    ```php
    use App\Http\Controllers\CheckoutController;
    
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    ```
- on the front we will initialize stripe and connect it with the server-side:
add this js script into the blade that you want to use stripe in:
    - add this in you html first:
    ```html
    <head>
        // add this line
        @vite('resources/js/app.js')
    </head>
    <body x-data="data()" x-init="init()">
        <div id="card-element">
            <!-- A Stripe Element will be inserted here. -->
        </div>
        // add this line
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        function data() {
            return {
                elements: {},
                cardElement: {},
                cardError: '',
                stripe: '',
                form: {
                    email: '',
                    amount: '',
                },
                init() {
                    this.stripe = Stripe('{{ env('STRIPE_KEY') }}')
                    this.elements = this.stripe.elements()
                    this.cardElement = this.elements.create("card", {
                        hidePostalCode: true,
                    })
                    this.cardElement.mount("#card-element")
                },
                processPayment() {
                    this.stripe.createPaymentMethod({
                        type: 'card',
                        card: this.cardElement,
                        billing_details: {
                            email: this.email,
                        }
                    }).then(({
                        paymentMethod,
                        error
                    }) => {
                        this.form.payment_method_id = paymentMethod.id
                        this.checkout()
                    })
                },
                checkout() {
                    axios.post('/checkout', this.form)
                        .then((resp) => {
                            // make an alert that it succeeded
                        })
                }
            }
        }
    </script>
    </body>
    ``` 