<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SensorController extends AbstractController
{
    /**
     * @Route("/facility/update", name="facility.update")
     */
    public function updateFacility(): Response
    {
        echo 'UPDATED FACILITY';
        return new Response();
    }
}
