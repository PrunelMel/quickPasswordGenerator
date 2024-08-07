<?php

namespace Eroto\HomeHandler\DI;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use Eroto\HomeHandler\Controller\AppController;
use Slim\Middleware\ContentLengthMiddleware;



final class Slim implements ServiceProvider{

    public function provide (Container $container):void{
        
        $settings = $container->get('settings') ;

        $container->set('view', function() use ($settings){
            // Create Twig
            return Twig::create($settings['twig']['templatePath'], ['cache' => $settings['twig']['cache']]);

        });

        $container->set(App::class, static function (Container $container) use ($settings): App {
            
            $app = AppFactory::create(null, $container);

        

            /**
             * The routing middleware should be added earlier than the ErrorMiddleware
            * Otherwise exceptions thrown from it will not be handled by the middleware
            */
            $app->addRoutingMiddleware();

            /**
             * Add Error Middleware
             *
             * @param bool                  $displayErrorDetails -> Should be set to false in productionuse Slim\Views\Twig;

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

            // Add Twig-View Middleware
            $app->add(TwigMiddleware::createFromContainer($app));

            $app->add(new ContentLengthMiddleware());


            //Define routes
            $app->get('/', [AppController::class,'home'])->setName('home');
        
            $app->get('/members',[AppController::class,'create_member_temp']);
            
            $app->post('/members', [AppController::class,'createUser'])->setName('AddMember');

            $app->get('/member/{id}',[AppController::class,'get_member'] );

            $app->get('/workspace',[AppController::class,'workspaceTemp'] );
        
            $app->get('/workspace/plan',[AppController::class,'generate'] );

            $app->get('/tasks', function (Request $request, Response $response, $args) {
                //show all tasks
            });
        
            $app->get('/tasks/{id}', function (Request $request, Response $response, $args) {
                //show task by identified $args['id']
            });
                
            $app->post('/tasks', function (Request $request, Response $response, $args) {
                //create a new task
            });
        
            
        
            /*$app->get('/tasks', function (Request $request, Response $response, $args) {
                //remove a task
            });*/

            return $app;

        });



    }
}
?>