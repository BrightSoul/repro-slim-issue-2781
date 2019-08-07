<?php
namespace Example\Middlewares {
    use \Psr\Http\Message\ServerRequestInterface;
    use \Psr\Http\Message\ResponseInterface;

    class RequireHttpsMiddleware
    {
        /**
         * Require HTTPS middleware invokable class
         *
         * @param  \Psr\Http\Message\ServerRequestInterface $request  PSR7 request
         * @param  \Psr\Http\Message\ResponseInterface      $response PSR7 response
         * @param  callable                                 $next     Next middleware
         *
         * @return \Psr\Http\Message\ResponseInterface
         */
        public function __invoke(ServerRequestInterface $request, ResponseInterface $response, callable $next) : ResponseInterface
        {
            $isHttps = strtolower($request->getUri()->getScheme()) == 'https';
            if(!$isHttps) {
                return $response->withStatus(400);
            }
            return $next($request, $response);
        }
    }
}