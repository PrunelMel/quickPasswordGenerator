<?php

namespace Eroto\HomeHandler\Model;
use DateTimeImmutable;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'user')]
#[UniqueConstraint(name: "unique_name", columns: ["name"])]
final class User{
    
    #[Id, Column(type: 'integer'), GeneratedValue(strategy: 'AUTO')]
    private int $id ;
    
    #[Column(type: 'string', unique: true, nullable: false)]
    private string $mail;

    #[Column(type: 'string', unique: false, nullable: false)]
    private string $password;


    /*public function __construct(){

        $this->name = $name;
    }*/

    public function getId ():int{
        
        return $this->id;
    }

    public function getMail():string{
        
        return $this->mail;
    }

    public function setMail(string $name):static
    {
        $this->mail = $mail;

        return $this;
    }

    public function getPassword():string{
        
        return $this->password;
    }

    public function setPassword(string $password):static
    {
        $this->password = $password;

        return $this;
    }
}

