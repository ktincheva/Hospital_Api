<?php

namespace AppBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Doctor
 *
 * @ORM\Table(name="patient")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PatientRepository")
 */
class Patient {

    const GENDER_MALE = 1;
    const GENDER_FEMALE = 2;
    const GENDER_OTHER = 3;

     /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** @var  string 
    *  @ORM\Column(name="name", type="string")
    */
    private $name;

    /** @var  \DateTime 
      @ORM\Column(name="dob", type="datetime")
     */
    private $dob;

    /** @var  string */
    private $gender;

    /** @var  Hospital 
    * @ORM\Column(name="hospital_id", type="integer")
     */
    private $hospital;

    /** @var  doctor
     * @ORM\Column(name="doctor_id", type="integer")
     */
    
    private $doctor;

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Patient
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getName() {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Patient
     */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getDob() {
        return $this->dob;
    }

    /**
     * @param \DateTime $dob
     * @return Patient
     */
    public function setDob($dob) {
        $this->dob = $dob;
        return $this;
    }

    /**
     * @return string
     */
    public function getGender() {
        return $this->gender;
    }

    /**
     * @param string $gender
     * @return Patient
     */
    public function setGender($gender) {
        $this->gender = $gender;
        return $this;
    }

    /**
     * @return Hospital
     */
    public function getHospital() {
        return $this->hospital;
    }

    /**
     * @param Hospital $hospital
     * @return Patient
     */
    public function setHospital($hospital) {
        $this->hospital = $hospital;
        return $this;
    }

    /**
     * @return Docotr
     */

    public function getDocrot() {
        return $this->doctor;
    }
    
    /**
     * @param Doctor $doctor
     * @return Parient
     */
    
    public function setDoctor($doctor)
    {
        $this->doctor = $doctor;
        return $this;
    }
}
