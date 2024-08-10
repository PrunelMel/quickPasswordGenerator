<?php
    namespace Eroto\HomeHandler\Controller;

    use Slim\Views\PhpRenderer;
    use Doctrine\ORM\EntityManager;
    use Psr\Container\ContainerInterface;
    use Psr\Http\Message\ResponseInterface;
    use Slim\Exception\HttpNotFoundException;
    use Psr\Http\Message\ServerRequestInterface;
    use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;
    use Eroto\HomeHandler\Model\User;
    use Doctrine\DBAL\Connection;
    
    
    class AppController{

        private ContainerInterface $container;
        
        public function __construct(ContainerInterface  $c)
        {
            $this->container = $c;
        }

        public function get_member (ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
        {
            $EntityManager = $this->container->get(EntityManager::class);
            $user = $EntityManager->find(User::class, $args['id']);

            $renderer = new PhpRenderer(APP_ROOT . '/templates');

            if (!empty($member)){
                $user = array('member'=>$user);
            }else{
                throw new HttpNotFoundException($request);
            }

            return $renderer->render($response,'home.php',['user'=>$user]);
        }

        public function create_member_temp(ServerRequestInterface $request,ResponseInterface $response, array $args): ResponseInterface
        {
            //Create member
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'form.php', ['type'=>'Member']);
        }

        public function workspaceTemp(ServerRequestInterface $request,ResponseInterface $response, array $args){
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'workspace.php');
        }

        public function home(ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
        {
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'home.php', ['type'=>'Member']);

        }

        public function createUser(ServerRequestInterface $request,ResponseInterface $response, array $args)
        {
            try{
                $EntityManager = $this->container->get(EntityManager::class);
                $renderer = new PhpRenderer(APP_ROOT . '/templates');
                $parsedData = $request->getParsedBody();
                $mail = $parsedData['email'];
                $password = $parsedData['password'];
                $user = new User;
                $user->setMail($mail);
                $user->setPassword($password);
                $EntityManager->persist($user );
                $EntityManager->flush();
                /*var_dump($member);
                exit;*/
            }
            catch(\Exception $e){
                $hasError = true;
                $messages = ['message' => 'Please retry. ' . $e->getMessage()];
            }

            return $renderer->render($response, "home.php", ['message'=> 'Member added']);
        }

        public function createTask(ServerRequestInterface $request,ResponseInterface $response, array $args){

        }

        public function createTaskTemp(ServerRequestInterface $request,ResponseInterface $response, array $args){
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'form.php', ['type'=>'Member']);
        }
        
        public function generate(ServerRequestInterface $request,ResponseInterface $response, array $args){
            try{
                $renderer = new PhpRenderer(APP_ROOT . '/templates');

                $generator = new ComputerPasswordGenerator();

                $generator
                ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
                ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
                ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
                ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, false);

                $password = $generator->generatePassword();
            }
            catch(\Exception $e){
                return $renderer->render($response, 'error.php', ['message' => 'Please retry. ' . $e->getMessage()]);

            }
            return $renderer->render($response, 'workspace.php', ['password'=>$password]);

        }
        /*public function authen(ServerRequestInterface $request, ResponseInterface $response):Response
        {
            $EntityManager = $this->container->get(EntityManager::class);
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            $parsedData = $request->getParsedBody();
            $name = $parsedData['email'];
        }*/


    }
?>