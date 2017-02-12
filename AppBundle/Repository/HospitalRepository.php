<?php

namespace AppBundle\Repository;


use AppBundle\Entity\Hospital;
use Doctrine\ORM\EntityRepository;

class HospitalRepository extends EntityRepository implements RepositoryInterface  {

    /** @return Hospital */
    public function selectById($id) {
        // TODO: Implement selectById() method.
        $em = $this->getManager();
        $query =$em->createQuery(
                        'SELECT h
                                FROM AppBundle:Hospital h
                                WHERE h.id = :id LIMIT 1'
                )->setParameter('id', $id);
        return $query->getSingleResult();
    }

}
