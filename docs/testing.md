# MyDojoSite - Testing
../ [Main ReadMe file ("index")](../README.md)

## Testing
This project contains both PHPUnit and Cypress tests.

## PHP Unit Testing
PHPUnit tests are located in the app/tests/ folder, organised by type with a single fixtures
folder for all test fixtures.

The unit test should be run from within the server (vm, eg `ddev`):

`% ddev ssh`

**Note:** `ddev` requires that the `SS_DATABASE_USERNAME` and `SS_DATABASE_PASSWORD` environment variables 
(in the `.env` file) both be set to `root`. Check these values in your local environment if the tests fail due to not
being able to connect to the database.

The simplest way to run the tests is to do so all in one go:

`$ phpunit`

Alternately, it's possible to run only the specified tests:

`$ phpunit app/tests/PageTypes/HomePageTest.php`

[Back to Top](#testing)

## Cypress End-to-End Testing

Cypress tests are located under the project root `cypress/` folder. As these tests check for specified front-end scenarios,
it is necessary to populate the development database with the supplied fixture data before running the tests:

`$ composer populate`
`$ sake dev/build flush=1`

The cypress tests can be run on the local command line (ie not inside the server shell) either in cli-only mode:

`% composer run`

or by opening a Cypress test browser instance:

`% cypress open`

[Back to Top](#testing)
