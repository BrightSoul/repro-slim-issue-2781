# Repro of Slim issue #2781
Support project to this issue with Slim3.
[https://github.com/slimphp/Slim/issues/2781](https://github.com/slimphp/Slim/issues/2781)


## Getting started
Run these command to install dependencies and prepare autoload
```
composer install
composer dump-autoload
```

Then run the test with:
```
 ./vendor/bin/phpunit --bootstrap vendor/autoload.php ./test/UtilityControllerTests
```
You'll see the test failing because the [RequireHttpsMiddleware](src/middlewares/RequireHttpsMiddleware.php) is not executed in the [PHPUnit test](test/UtilityControllerTests.php), even if it's been [added to the app](src/Bootstrapper.php#L14).

If, instead, you host this application in Apache (choose `src/` as the DocumentDirectory) then the [RequireHttpsMiddleware](src/middlewares/RequireHttpsMiddleware.php) is going to be executed and you'll correctly see get a 400 response if you send a request to `http://your-host/serverTime`.