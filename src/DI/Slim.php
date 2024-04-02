<?php

namespace Eroto\HomeHandler\DI;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Factory\AppFactory;



final class Slim implements ServiceProvider{

    public function provide (Container $c){
        
        $settings = $c->get('settings') ;

        $container->set('view', function() use ($settings): AppFactory {
            // Create Twig
            return Twig::create($settings['twig']['templatePath'], ['cache' => $settings['twig']['cache']]);

        });

        $container->set(App::class, static function (ContainerInterface $container) use ($settings): App {
            
            $app = AppFactory::create(null, $container);

        

            /**
             * The routing middleware should be added earlier than the ErrorMiddleware
            * Otherwise exceptions thrown from it will not be handled by the middleware
            */
            $app->addRoutingMiddleware();

            /**
             * Add Error Middleware
             *
             * @param bool                  $displayErrorDetails -> Should be set to false in production
             * @param bool                  $logErrors -> Parameter is passed to the default ErrorHandler
             * @param bool                  $logErrorDetails -> Display error details in error log
             * @param LoggerInterface|null  $logger -> Optional PSR-3 Logger  
             *
             * Note: This middleware should be added last. It will not handle any exceptions/errors
             * for middleware added after it.
             */
            $errorMiddleware = $app->addErrorMiddleware(
                $settings['slim']['displayErrorDetails'],
                $settings['slim']['logErrors'],
                $settings['slim']['logErrorDetails']
            );

            //Define routes
            $app->get('/', function (Request $request, Response $response, $args) {
                $response->getBody()->write("Hello world!");
                return $response;
            });
        
            $app->get('/members', function (Request $request, Response $response, $args) {
                //show all members
            });
        
            $app->get('/members/{id}', function (Request $request, Response $response, $args) {
                //show member by identified $args['id']
            });
        
            $app->get('/tasks', function (Request $request, Response $response, $args) {
                //show all tasks
            });
        
            $app->get('/tasks/{id}', function (Request $request, Response $response, $args) {
                //show task by identified $args['id']
            });
        
            $app->post('/members', function (Request $request, Response $response, $args) {
                //create a new member
            });
        
            $app->post('/tasks', function (Request $request, Response $response, $args) {
                //create a new task
            });
        
            $app->get('/members', function (Request $request, Response $response, $args) {
                //remove a member
            });
        
            $app->get('/tasks', function (Request $request, Response $response, $args) {
                //remove a task
            });

            return $app;

        });



    }
}
?>