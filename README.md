## Pictureworks test

### Local Setup
-   Clone this project into your local computer, run `git clone https://github.com/franklinekoh/pictureworks.git`.
-   Navigate to project root in command line e.g. cd c:/xampp/htdocs/{project}.
-   `cp` `.env.example` to `.env` and set your environment variables.
-   Run `Composer Insall`.
-   Run `php artisan key:generate`.
-   Run `php artisan serve`.


## Testing

-   Follow the instructions in the Local Section Setup Above.
-   Run `php artisan migrate`.
-   Run `php artisan db:seed`.
-   Run `./vendor/bin/phpunit tests/Feature/StoreCommentTest.php`.
-   Run `php artisan comment:append` and follow the prompt.
-   Visit `localhost:8000`.

## Documentation

### Postman documentation
https://www.getpostman.com/collections/24ce2de1b2d6eba88f67
### Swagger documentation
-   Run `php artisan  l5-swagger:generate`
-   Visit `localhost:8000`.



