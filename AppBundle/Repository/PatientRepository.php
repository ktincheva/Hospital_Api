<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Patient;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;
class PatientRepository extends EntityRepository implements RepositoryInterface {

    /** @return Patient */
    public function selectById($id) {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
                            'SELECT p
                                FROM AppBundle:Patient p
                                WHERE p.id = :id LIMIT 1'
                )->setParameter('id', $id);
        return $query->getSingleResult();
        // TODO: Implement selectById() method.
    }

    /**
     * @param \AppBundle\Entity\Hospital $hospital
     * @return Patient[]
     */
    public function selectByHospital($hospital) {
        
    }
    
    public function addPatient($request){
        $patient = new Patient();
        $patient->setName($request->get("name"));
        $patient->setDoctor($request->get("doctorId"));
        $patient->setGender($request->get("gender"));
        $patient->setHospital($request->get("hosptalId")); 
        $patient->setDob(new \DateTime($request->get("dob")));
        $em = $this->getEntityManager();
        $em->persist($patient);
        $em->flush();
    }
}
