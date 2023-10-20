# PHP_MVC Film

## Prerequisites

You must have docker installed on your machine.

## Installation

### Clone the repository

```
git@github.com:BatMaxou/licence-php-mvc.git
```

### Go to the project folder

```
cd licence-php-mvc
```

### Init the submodules

```
git submodule update --init
```

### Put the wanted port into the docker-compose.override.yaml file

```yaml
version: "3"

services:
  web:
    ports:
      - %your-port%:80
```

### Build the docker image

```
docker-compose up -d
```

### Databse

```
docker-compose exec -T db mysql -uroot -proot < dump/skeleton.sql
```

### FIxtures

- Load fixtures
```
docker-compose exec -T db mysql -uroot -proot php_mvc < dump/fixtures.sql
```

- Add images of the /public/images/fixtures file from the website with the admin account (login: admin, password: admin)

### Access the website

Go to http://localhost:%your-port%
