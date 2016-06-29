# Болванка проекта на PHP7/Symfony3
[![Latest Stable Version](https://img.shields.io/packagist/v/itmh/php-symfony-project.svg?style=flat-square)](https://packagist.org/packages/itmh/php-symfony-project)

### Использование
    
Чтобы создать новый проект, выполните команду `composer create-project itmh/php-symfony-project my-new-app`, где `my-new-app` - имя директории будущего приложения.

> После создания проекта обязательно отредактируйте composer.json и укажите собственные имя проекта, авторов и прочее.
    
### Запуск окружения разработчика

Необходимо скопировать конфигурационные файлы и настроить их по своему усмотрению. Затем установить зависимости приложения. После этого запустить контейнер и установить права на папку с временными файлами приложения.

    cp etc/example.docker-compose.yml docker-compose.yml
    vim docker-compose.yml
    cp etc/example.htaccess web/.htaccess
    
    composer install --prefer-dist --optimize-autoloader --ignore-platform-reqs -vv
    
    docker-compose up -d
    docker-compose exec upstream chmod 777 -R /var/www/var
    docker-compose exec upstream php /var/www/bin/console
    docker-compose exec upstream php /var/www/bin/console cache:clear
    
### Запуск сборки

    composer install --prefer-dist --optimize-autoloader --ignore-platform-reqs -vv
    composer build
