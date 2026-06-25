# MyDojoSite - Installation
../ [Main ReadMe file ("index")](../README.md)
## Installation
#### 1. Set up initial environment variables
`cp .env.example .env`

#### 2. Config and start a virtual server, such as ddev
`ddev config`

`ddev start`

#### 3. Install the project
`ddev composer install`

#### 4. Expose the vendor assets for public consumption
`ddev composer vendor-expose`

#### 5. Build the front end
`nvm use`

`yarn`

`yarn dev`

#### 6. Build the back end
`ddev sake dev/build`

#### 8. Populate site with sample data if desired
`ddev composer populate`

#### 8. Access the front end at the url given for `SS_HOST` in the `.env` file.
If using the default value set in `.env.example` that is copied to `.env` in [Step 1](#1-set-up-initial-environment-variables)
above, this url will be:
https://mydojosite.ddev.site

[Back to Top](#installation)
