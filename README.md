# Installation
- clone the project
```bash
git clone https://github.com/Evenza-App/laravel.git
``` 
- run this commands
```bash
composer i

php artisan migrate --seed

php artisan storage:link
```
- add stripe keys to .env file.
- make folder called private and copy your fcm private key in it and call it fcm.json.
