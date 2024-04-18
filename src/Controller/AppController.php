<?php
    namespace Eroto\HomeHandler\Controller;

    use Slim\Views\PhpRenderer;
    use Doctrine\ORM\EntityManager;
    use Psr\Container\ContainerInterface;
    use Psr\Http\Message\ResponseInterface;
    use Slim\Exception\HttpNotFoundException;
    use Psr\Http\Message\ServerRequestInterface;
    use Eroto\HomeHandler\Model\Member;
    use Eroto\HomeHandler\Model\Task;

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
            return $renderer->render($response, 'home.php', ['type'=>'Member']);

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
        
        public function generatePlan(ServerRequestInterface $request,ResponseInterface $response, array $args){
            try{
                $entityManager = $this->container->get(EntityManager::class);
                $renderer = new PhpRenderer(APP_ROOT . '/templates');
                $memberRepository = $entityManager->getRepository(Member::class);
                $taskRepository = $entityManager->getRepository('');
                $member = $memberRepository->findAll();
                $task = $taskRepository->findAll();

            }
            catch(\Exception $e){
                return $renderer->render($response, 'error.php', ['message' => 'Please retry. ' . $e->getMessage()]);

            }
            return $renderer->render($response, 'workspace.php', ['member'=>$member, 'task'=>$task]);

        }


    }
?>