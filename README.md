<p align="center">
<!-- PROJECT LOGO
  <a href="https://github.com/chas-academy/u08-recipe-api-johanneslepsius">
      <img src="images/logo.png" alt="Logo" width="80" height="80">
  </a>
-->

  <h3 align="center">Recipe-App: User-API</h3>

  <p align="center">
    A user-API to create an account and save recipes on your own lists.
  </p>
</p>

<!-- ABOUT THE PROJECT -->
## About The Project

In addition to [my Recipe-app][recipe-app] which simply shows you recipes from the [Edamam API](https://developer.edamam.com/edamam-recipe-api), this project lets you create an account, create lists and save your favourite recipes on them.


### Built With

* [Laravel Sail](https://laravel.com/docs/8.x/sail), so you need [Docker](https://www.docker.com/)
* [Laravel Sanctum](https://laravel.com/docs/8.x/sanctum)



<!-- GETTING STARTED -->
## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

* WSL2
* [Docker for WSL2](https://docs.docker.com/desktop/windows/wsl/)

### Installation (on WSL2)

1. Clone the repo & cd into folder
   ```sh
   git clone https://github.com/chas-academy/u08-recipe-api-johanneslepsius && cd u08-recipe-api-johanneslepsius
   ```
2. Install Composer Dependencies [more info](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects)
   If you copy the command from the docs, don't forget to remove the line breaks \
   ```sh
   docker run --rm -u "$(id -u):$(id -g)" -v $(pwd): /opt -w /opt laravelsail/php80-composer:latest composer install --ignore-platform-reqs
   ```
4. Create environment file
   ```sh
   cp .env.example .env
   ```
5. Start sail
   ```sh
    ./vendor/bin/sail up
   ```
6. Open another wsl tab and cd into project
7. Create sail alias
   ```sh
   alias sail="./vendor/bin/sail"
   ```
8. Create app encryption key
   ```sh
   sail php artisan key:generate
   ```
9. Navigate to "localhost:8080" in your browser and log in using the credentials from .env
11. Verify that the database "recipe_api" exists, create it otherwise
12. In the same terminal as before, migrate the database
    ```sh
    sail php artisan migrate
    ```

If you still can't make it work, take a look at [this article](https://medium.com/@achalaarunalu/setting-up-an-existing-laravel-8-sail-docker-project-on-windows-wsl2-and-ubuntu-20-04-f0def4210258).

<!-- USAGE EXAMPLES -->
## Usage

You can see the available routes in /routes/api.php. Since this is an api, all requests start with /api/.
To verify everything is working, send an example request like this, using ThunderClient / Postman / whatever:

localhost/api/register?name=nallebjorn&email=nalle@bjorn.se&password=nallebjorn



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[recipe-app]: https://github.com/chas-academy/u07-recipe-app-johanneslepsius
