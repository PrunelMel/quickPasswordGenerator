<?php
    use Psr\Http\Message\ResponseInterface as Response;
    use Psr\Http\Message\ServerRequestInterface as Request;
    use Slim\App;
    use Eroto\HomeHandler\DI\Slim;
    use Eroto\HomeHandler\DI\Doctrine;
    $container = require_once __DIR__ . '/../bootstrap.php';

    $container->register(new Doctrine());
    $container->register(new Slim());

    /** @var App $app */
    $app = $container->get(App::class);
    $app->run();
?>
