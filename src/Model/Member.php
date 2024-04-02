<?php

namespace Eroto\HomeHandler\Model;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;

#[Entity, Table(name: 'Member')]
final class Member{
    
    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    private int $id ;
    
    #[Column(type: 'string', unique: true, nullable: false)]
    private string $name;

    public function __construct(string  $name){

        $this->name = $name;
    }

    public function getId ():int{
        
        return $this->id;
    }

    public function getName():string{
        
        return $this->name;
    }
}


#[Entity, Table(name: 'Task')]
final class Task{

    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    private int $id;

    #[Column(type: 'string', unique: true, nullable: false)]
    private string $name;

    public function __construct(string  $name){

        $this->name = $name;
    }

    public function getId ():int{
        
        return $this->id;
    }

    public function getName():string{
        
        return $this->name;
    }
}
?>
