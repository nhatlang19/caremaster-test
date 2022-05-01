### PRESEREQUISITES ###

- php8.1
- docker (latest) (optional)

### START WITH DOCKER ###

- ./vendor/bin/sail up

### UNIT TEST ###

- php artisan test --env=testing
- docker exec -it caremaster-test_laravel.test_1 bash
    - run `php artisan migrate --seed`

### PORT ###

- localhost:80