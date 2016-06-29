# Болванка PHP проекта на Symfony
[![Latest Stable Version](https://img.shields.io/packagist/v/itmh/php-symfony-project.svg?style=flat-square)](https://packagist.org/packages/itmh/php-symfony-project)

### Использование
    
Чтобы создать новый проект, выполните команду `composer create-project itmh/php-symfony-project my-new-app`, где `my-new-app` 
    
### Окружение разработчика

    cp etc/example.docker-compose.yml docker-compose.yml
    vim docker-compose.yml
    cp etc/example.htaccess web/.htaccess
    composer install --prefer-dist --optimize-autoloader --ignore-platform-reqs -vv
    docker-compose up -d
    docker-compose exec upstream chmod 777 -R /var/www/var
    docker-compose exec upstream php /var/www/bin/console
    docker-compose exec upstream php /var/www/bin/console cache:clear
