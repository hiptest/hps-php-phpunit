hps-php-phpunit
===============

Hiptest publisher samples using PHP/PHPUnit

# Update tests

```
hiptest-publisher --config phpunit.conf --only=tests
```

# Run tests

You need PHP and [PHPUnit](https://phpunit.de/) to run generated tests. If you
do not have them installed on your OS, the easiest way I found is to use the [phpunit/phpunit](https://hub.docker.com/r/phpunit/phpunit/) docker image.

```
# pull PHPUnit docker image
docker pull phpunit/phpunit:5.0.3

# run tests
docker run -t -v $(pwd):/app phpunit/phpunit:5.0.3 tests
```

If you have phpunit installed, you can run test with the following command:

```
phpunit tests
```
