<?php

namespace App\Controller;

use App\Repository\FacilityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SensorController extends AbstractController
{
    /**
     * @Route("/facility/{id}/update", name="facility.update", methods={"POST"})
     */
    public function updateFacility(string $id, Request $request, FacilityRepository $facilityRepository): Response
    {

        //get body
        $data = json_decode($request->getContent(), true);
        print_r($data);
        die();
//
//
//        $facility = $facilityRepository->find($id);
//
//        if ($facility) {
//            $facility->setState()
//        }
//        echo "Id is: " . $id;
        return new Response();
    }
}
