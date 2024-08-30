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
    use Symfony\Component\Mailer\Transport;
    use Symfony\Component\Mailer\Transport\Dsn;
    use Symfony\Component\Mailer\Mailer;
    use Symfony\Component\Mime\Email;
    
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

        public function dashboard(ServerRequestInterface $request,ResponseInterface $response, array $args){
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'dashboard.php');
        }

        public function home(ServerRequestInterface $request, ResponseInterface $response, array $args):ResponseInterface
        {
            $renderer = new PhpRenderer(APP_ROOT . '/templates');
            return $renderer->render($response, 'LandingPage.php');

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

        
        public function generate(ServerRequestInterface $request,ResponseInterface $response, array $args){
            try{

                //generating password
                $renderer = new PhpRenderer(APP_ROOT . '/templates');

                $generator = new ComputerPasswordGenerator();

                $generator
                ->setOptionValue(ComputerPasswordGenerator::OPTION_UPPER_CASE, true)
                ->setOptionValue(ComputerPasswordGenerator::OPTION_LOWER_CASE, true)
                ->setOptionValue(ComputerPasswordGenerator::OPTION_NUMBERS, true)
                ->setOptionValue(ComputerPasswordGenerator::OPTION_SYMBOLS, false);

                $password = $generator->generatePassword();

                //sending email

                $addr = "smtp://3c4253e46e0b19:a07a46c261abe3@sandbox.smtp.mailtrap.io:2525?encryption=ssl&auth_mode=login";
                
                $dsn = new Dsn("smtp", "sandbox.smtp.mailtrap.io", "3c4253e46e0b19", "a07a46c261abe3", 2525);

                $transport = Transport::fromDsn($addr);
                
                $mailer = new Mailer($transport);

                $email = (new Email())
                    ->from('toto.awaya@gmail.com')  
                    ->to('seyive.waya@gmail.com')
                    ->subject('Time for Symfony Mailer!')
                    ->text('Sending emails is fun again!')
                    ->html('<p>See Twig integration for better HTML integration!</p>');

                $mailer->send($email);

            }
            catch(\Exception $e){
                return $renderer->render($response, 'error.php', ['message' => 'Please retry.' . $e->getMessage()]);
            }


            return $renderer->render($response, 'dashboard.php', ['password'=>$password]);

        }
        
        /**
         * Send an email using Symfony Mailer.
         *
         * This function sets up a transport using the MAILER_DSN environment variable,
         * creates a new Mailer instance, and sends an email with a predefined subject and body.
         *
         * @throws \Exception If there is an error sending the email
         */
        /*public function mailer(){


            $addr = "smtp://3c4253e46e0b19:a07a46c261abe3@sandbox.smtp.mailtrap.io:2525?encryption=ssl&auth_mode=login";
            
            $dsn = Dsn ::fromString($addr);

            $transport = Transport::fromDsn($dsn);
            
            $mailer = new Mailer($transport);

            $email = (new Email())
                ->from('tito@sandbox.smtp.mailtrap.io')
                ->to('seyive.awaya@gmail.com')
                ->subject('Time for Symfony Mailer!')
                ->text('Sending emails is fun again!')
                ->html('<p>See Twig integration for better HTML integration!</p>');

            $mailer->send($email);

        }*/

    }
?>