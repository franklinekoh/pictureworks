## Pictureworks test

### Local Setup
-   Ensure you have Xampp or Wampp Installed on your local computer.
-   Locate C:/xamppOrWampp/htdocs.
-   Clone this project into the htdocs folder.
-   Navigate to project root in command line e.g. cd c:/xampp/htdocs/{project}.
-   `cp` `.env.example` to `.env` and set your environment variables.
-   Run `Composer Insall` .
-   Run `php artisan serve`.


## Testing

-   Follow the instructions in the Local Section Setup Above.
-   Run `php artisan migrate`.
-   Run `php artisan db:seed`.
-   Run `./vendor/bin/phpunit tests/Feature/StoreCommentTest.php`.
-   Run `php artisan comment:append` and follow the prompt.
-   Visit `localhost:8000`.


