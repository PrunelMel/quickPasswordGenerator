<?php

namespace Eroto\HomeHandler\DI;

use Doctrine\ORM\ORMSetup;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use Psr\Container\ContainerInterface;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

final class Doctrine implements ServiceProvider
{
    public function provide (Container $c):void
    {
        $c->set(EntityManager::class, function (Container $c): EntityManager{

            $settings = $c->get('settings');

            $config = ORMSetup::createAttributeMetadataConfiguration(
                $settings['doctrine']['metadata_dirs'],
                $settings['doctrine']['dev_mode'],
            );

            $connection = DriverManager::getConnection([
                $settings['doctrine']['connection'],
                $settings['doctrine']['path'],
            ], $config);

            return $entityManager = new EntityManager($connection, $config);
        }); 
    }
}
