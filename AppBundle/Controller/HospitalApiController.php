<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use AppBundle\Entity\Doctor;
use AppBundle\Entity\Patient;
use Doctrine\ORM\EntityManager;

class HospitalApiController extends Controller {

    private $em;

    public function __construct() {
        // create  entity maanget 
    }

    /**
     * @Route("/getPatientsList/{id}")
     */
    public function getPatientsListAction($id) {
        $result = [];
        $doctor = $this->getDoctor($id);
        if (!empty($doctor->getId())) {
            $result = $this->getPatientsList($doctor->getId());
        }
        return new JsonResponse($result);
    }

    /**
     * return Patients list by dobctor id
     * @Route("/addPatient/{hosptalId}/{doctorId}/{name}/{gender}/{dob}")
     */
    public function addPatientAction(Request $request) {
        $result = ['success' => 'failed'];
        if (!empty($request->get('doctorId'))) {
            $doctor = $this->getDoctor($request->get('doctorId'));
            if (!empty($doctor->getId())) {
                $this->addNewPatient($request);
                $result = ['success' => 'ok'];
            } else {
                $result['reasion'] = 'Could not find doctor with this doctorId';
            }
        } else {
            $result['reasion'] = 'Missind parameter doctor Id';
        }
        return new JsonResponse($result);
    }

    private function getDoctor($id) {
        return $this->container->get('doctrine')->getManager()->getRepository("AppBundle:Doctor")->selectById($id);
    }

    private function addNewPatient($request) {
        return $this->container->get('doctrine')->getManager()->getRepository("AppBundle:Patient")->addPatient($request);
    }

    private function getPatientsList($id) {
        return $this->container->get('doctrine')->getManager()->getRepository("AppBundle:Doctor")->getPatientsList($id);
    }

}
