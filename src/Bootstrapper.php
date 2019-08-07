<?php
namespace Example {
    use \Example\Middlewares\RequireHttpsMiddleware;
    use \Example\Controllers\UtilityController;
    use \Slim\App;
    
    class Bootstrapper {

        public static function createApp()
        {
            $settings = [];
            //Create a Slim App
            $app = new App($settings);
            //Add a middleware
            $app->add(new RequireHttpsMiddleware());
            //Add a route action
            $app->get('/serverTime', UtilityController::class . ':getServerTime');
            return $app;
        }
    }
}