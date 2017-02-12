<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use \AppBundle\Repository\DoctorRepository;
class HospitalApiControllerTest extends WebTestCase
{
    
    public function testGetpatientslist()
    {
        $result = '[{"id":6,"name":"drung drun ","dob":{"date":"2017-04-05 00:00:00.000000","timezone_type":3,"timezone":"Europe\/Berlin"},"hospital":1,"doctor":1}]';
        $client = static::createClient();
        $container = $client->getContainer();
        $crawler = $client->request('GET', '/getPatientsList/1');
        $responce = $client->getResponse();
        $this->assertEquals($responce->getContent(), $result);
    }

    public function testAddpatient()
    {
        $result = '{"success":"ok"}';
        $client = static::createClient();
        /* get patients numbers before inser*/
        $crawler = $client->request('GET', '/getPatientsList/2');
        $responce = $client->getResponse();
        $count = count(json_decode($responce->getContent()));
       
        $crawler = $client->request('GET', '/addPatient/1/2/trala lala/fam/2017-08-09');
        $responce = $client->getResponse()->getContent();
        $this->assertEquals($responce, $result);
        /* get patients numbers after inser*/
        $crawler = $client->request('GET', '/getPatientsList/2');
        $responce = $client->getResponse();
        $count++;
        
        $this->assertEquals(count(json_decode($responce->getContent())),$count);
    }

}
