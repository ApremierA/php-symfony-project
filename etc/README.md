#Настройка окружения разработчика

```
cp ./etc/example.docker-compose.yml ./docker-compose.yml
cp ./etc/example.htaccess ./web/.htaccess
composer install --prefer-dist --optimize-autoloader --ignore-platform-reqs -vv
docker-compose up -d
docker-compose exec upstream chmod 777 -R /var/www/var
docker-compose exec upstream php ../bin/console
```
