# Daily Mood Survey

## Getting Started

Prerequisites: You must have [Composer](https://getcomposer.org/) installed.

After cloning/forking this repo:
- Run `composer install`
- Open the app in a text editor, and rename the `.env.example` file to just `.env`
- Run `php artisan key:generate`

## Running the App

Run `php -S localhost:8888 -t public` in the command line, and then visit `localhost:8888`.

## Tests

To use the test suite, run `./vendor/bin/phpunit` in the command line.
