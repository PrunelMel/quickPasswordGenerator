<?php
    namespace Eroto\HomeHandler\Controller;

    use Slim\Views\PhpRenderer;
    use Doctrine\ORM\EntityManager;
    use Psr\Container\ContainerInterface;
    use Psr\Http\Message\ResponseInterface;
    use Slim\Exception\HttpNotFoundException;
    use Psr\Http\Message\ServerRequestInterface;
    use Eroto\HomeHandler\Model;
    
    
    class AppController{

        private ContainerInterface $container;
        
        public function __construct(ContainerInterface  $c)
        {
            $this->container = $c;
        }

        public function get_member (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
        {
            $EntityManager = $this->container->get(EntityManager::class);
            $member = $EntityManager->find('Member', $args['id']);

            if ($member === null){
                return 'Not found';
            }

            return $member;
        }

        public function create_member_temp(ServerRequestInterface $request,ResponseInterface $response, array $args): ResponseInterface
        {
            //Create member
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'form.html', ['type'=>'Member']);
        }

        public function home(ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
        {
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'home.html', ['type'=>'Member']);

        }

        public function create_member(ServerRequestInterface $request,ResponseInterface $response, array $args)
        {
            $EntityManager = $this->container->get(EntityManager::class);
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            $parsedData = $request->getParsedBody();
            $name = $parsedData['name'];

        }
        


    }
?>