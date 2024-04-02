<?php
    namespace Eroto\HomeHandler\Controller;

    use Slim\Views\PhpRenderer;
    use Doctrine\ORM\EntityManager;
    use Nwg\WalletHandler\Model\Wallet;
    use Psr\Container\ContainerInterface;
    use Psr\Http\Message\ResponseInterface;
    use Slim\Exception\HttpNotFoundException;
    use Psr\Http\Message\ServerRequestInterface;
    
    
    class Controller{

        private ContainerInterface $container;
        
        public function __construct(ContainerInterface $c)
        {
            $this->container = $c;
        }

        public function get (ServerRequestInterface $request, array $args):ResponseInterface
        {
            $EntityManager = $this->container->get(EntityManager::class);
            $member = $EntityManager->find('Member', $args['id']);

            if ($member === null){
                return 'Not found';
            }

            return $member;
        }


    }
?>