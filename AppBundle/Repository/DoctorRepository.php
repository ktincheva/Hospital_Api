<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Doctor;
use AppBundle\Entity\Patient;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping;

class DoctorRepository extends EntityRepository implements RepositoryInterface {

    /** @return Patient */
    public function selectById($id) {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
                        'SELECT d
                                FROM AppBundle:Doctor d
                                WHERE d.id = :id'
                )->setParameter('id', $id);
        return $query->getSingleResult();
        // TODO: Implement selectById() method.
    }

    public function getPatientsList($id) {
        $em = $this->getEntityManager();
        $query = $em->createQuery(
                        'SELECT p
                                FROM AppBundle:Patient as p
                                WHERE p.doctor = :id'
                )->setParameter('id', $id);
        return $query->getArrayResult();
    }

}
