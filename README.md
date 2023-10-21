# IUT teacher's wishes (sae5-01-back)
## Author
- Billiau Benjamin
- Bushukin Gleb
- Monet Emilien
- Reyal Wesley
- Vasseur Lucas


## Installation/configuration

Install symfony6 and composer
```shell
composer install
```

Install front dependencies
```shell
npm install
```

Build front
```shell
npm run build
```

You can also use
```shell
npm run watch
```

Lauch server
```shell
composer start
```

## Database
To launch database and adminer service
```shell
docker-compose up
```
Adminer is expose with 8080 port and autoconnect while dev with app user and !ChangeMe! password.
## Script description
Launch test web server without execution time restrictions 

```shell
composer test:cs
```
PHP CS Fixer check command

```shell
composer fix:cs
```
PHP CS Fixer fixing command

```shell
composer test:yaml
```
command to check the YAML files contained in the “config” directory 

```shell
composer test:twig
```
check the Twig files contained in the “templates” directory

```shell
composer db
```
destroy and create the database and load fixtures

# Tests

The connection identifiers are :

|     Login     | Password |          Roles           |
|:-------------:|:--------:|:------------------------:|
|     admin     |   test   |        ROLE_ADMIN        |
|    tenured    |   test   |       ROLE_TENURED       |
| admin_tenured |   test   | ROLE_ADMIN, ROLE_TENURED |
