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

* npm (7.1.3 in my case)
* Docker (https://www.docker.com/get-started)

### Installation (on WSL2)

1. Clone the repo & cd into folder
   ```sh
   git clone https://github.com/chas-academy/u08-recipe-api-johanneslepsius && cd u08-recipe-api-johanneslepsius
   ```
2. Install Composer Dependencies [more info](https://laravel.com/docs/8.x/sail#installing-composer-dependencies-for-existing-projects)
   ```sh
   docker run --rm \ -u "$(id -u):$(id -g)" \ -v $(pwd):/opt \ -w /opt \ laravelsail/php80-composer:latest \ composer install --ignore-platform-reqs
   ```
4. Create environment file
   ```sh
   cp .env.example .env
   ```
5. Create Sail alias, when i write sail from now on i expect you created the alias
   ```sh
   alias sail="./bin/vendor/sail"
   ```
7. Create app encryption key
   ```sh
   sail php artisan key:generate
   ```



<!-- USAGE EXAMPLES -->
## Usage

Use this space to show useful examples of how a project can be used. Additional screenshots, code examples and demos work well in this space. You may also link to more resources.

_For more examples, please refer to the [Documentation](https://example.com)_



<!-- ROADMAP -->
## Roadmap

See the [open issues](https://github.com/github_username/repo_name/issues) for a list of proposed features (and known issues).



<!-- CONTRIBUTING -->
## Contributing

Contributions are what make the open source community such an amazing place to be learn, inspire, and create. Any contributions you make are **greatly appreciated**.

1. Fork the Project
2. Create your Feature Branch (`git checkout -b feature/AmazingFeature`)
3. Commit your Changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the Branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request



<!-- LICENSE -->
## License

Distributed under the MIT License. See `LICENSE` for more information.



<!-- CONTACT -->
## Contact

Your Name - [@twitter_handle](https://twitter.com/twitter_handle) - email

Project Link: [https://github.com/github_username/repo_name](https://github.com/github_username/repo_name)



<!-- ACKNOWLEDGEMENTS -->
## Acknowledgements

* []()
* []()
* []()





<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[contributors-shield]: https://img.shields.io/github/contributors/github_username/repo.svg?style=for-the-badge
[contributors-url]: https://github.com/github_username/repo_name/graphs/contributors
[forks-shield]: https://img.shields.io/github/forks/github_username/repo.svg?style=for-the-badge
[forks-url]: https://github.com/github_username/repo_name/network/members
[stars-shield]: https://img.shields.io/github/stars/github_username/repo.svg?style=for-the-badge
[stars-url]: https://github.com/github_username/repo_name/stargazers
[issues-shield]: https://img.shields.io/github/issues/github_username/repo.svg?style=for-the-badge
[issues-url]: https://github.com/github_username/repo_name/issues
[license-shield]: https://img.shields.io/github/license/github_username/repo.svg?style=for-the-badge
[license-url]: https://github.com/github_username/repo_name/blob/master/LICENSE.txt
[linkedin-shield]: https://img.shields.io/badge/-LinkedIn-black.svg?style=for-the-badge&logo=linkedin&colorB=555
[linkedin-url]: https://linkedin.com/in/github_username
[recipe-app]: https://github.com/chas-academy/u07-recipe-app-johanneslepsius
