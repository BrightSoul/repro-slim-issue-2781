<?php
declare(strict_types=1);
use \PHPUnit\Framework\TestCase;
use \Example\Bootstrapper;
use \Slim\Http\Environment;
use \Slim\Http\Request;
use \Slim\Http\Response;

final class UtilityControllerTest extends TestCase
{
    public function testItShouldRequireHttps(): void {

        //Arrange
        $app = Bootstrapper::createApp();
        $env = Environment::mock([
            'REQUEST_METHOD' => 'GET',
            //'HTTPS' => 'on', //No https
            'REQUEST_URI' => '/serverTime',
            'QUERY_STRING' => '',
            'SERVER_NAME' => 'localhost',
            'CONTENT_TYPE' => 'application/json'
        ]);
        $request = Request::createFromEnvironment($env);
        $response = new Response();

        //Act
        $response = $app($request, $response);

        //Assert
        //This won't pass because the RequireHttpsMiddleware is not executed
        $this->assertEquals(400, $response->getStatusCode());
    }
}