# Gousto API

## Contents

1. [Gousto API Repository](https://github.com/mstnorris/GoustoAPI-Dev)
2. [readme](readme.md)
3. [Installation](installation.md)
4. [API Documentation](instructions.md)
5. [Report](report.md) 

## Installation

I'm using Laravel Homestead for local development. This is nothing more than a wrapper for Vagrant. Please consult the [documentation](https://laravel.com/docs/5.3/homestead#installation-and-setup) if you are unfamiliar.

1. Clone this repository

    ```
    git clone https://github.com/mstnorris/GoustoAPI-Dev goustoapi.dev
    ```

2. Install dependencies

    ```
    composer install
    ```

3. Create an environment file

    ```
    cp .env.example .env
    ```

4. Generate Application Key

    ```
    php artisan key:generate
    ```