<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Doctor
 *
 * @ORM\Table(name="doctor")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DoctorRepository")
 */
class Doctor {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
/**
     * @var string
     *
     * @ORM\Column(name="name", type="string")
     */
    private $name;
    /**
     * Get id
     *
     * @return integer 
     */
    
    
    
    public function getId() {
        return $this->id;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="integer")
     */
    public function getName()
    {
        return $this->name;
    }
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
}