<?php
    namespace Eroto\HomeHandler\Controller;

    use Slim\Views\PhpRenderer;
    use Doctrine\ORM\EntityManager;
    use Psr\Container\ContainerInterface;
    use Psr\Http\Message\ResponseInterface;
    use Slim\Exception\HttpNotFoundException;
    use Psr\Http\Message\ServerRequestInterface;
    use Hackzilla\PasswordGenerator\Generator\ComputerPasswordGenerator;
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
            $member = $EntityManager->find(Member::class, $args['id']);

            $renderer = new PhpRenderer(APP_ROOT . '/templates');

            if (!empty($member)){
                $members = array('member'=>$member);
            }else{
                throw new HttpNotFoundException($request);
            }

            return $renderer->render($response,'home.php',['members'=>$members]);
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
            return $renderer->render($response, 'LandingPage.php', ['type'=>'Member']);

        }

        public function create_member(ServerRequestInterface $request,ResponseInterface $response, array $args)
        {
            try{
                $EntityManager = $this->container->get(EntityManager::class);
                $renderer = new PhpRenderer(APP_ROOT . '/templates');
                $parsedData = $request->getParsedBody();
                $name = $parsedData['email'];
                $member = new Member;
                $member->setName($name);
                $EntityManager->persist($member);
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

        public function mailer(ServerRequestInterface $request,ResponseInterface $response, array $args){
            
            $transport = Transport::fromDsn('smtp://localhost');
            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from('hello@example.com')
                ->to('you@example.com')
                //->cc('cc@example.com')
                //->bcc('bcc@example.com')
                //->replyTo('fabien@example.com')
                //->priority(Email::PRIORITY_HIGH)
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);
        }


    }
?>