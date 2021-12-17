<?php

namespace App\Controller;

use App\Repository\FacilityRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;

class SensorController extends AbstractController
{
    /**
     * @Route("/facility/{id}/update", name="facility.update", methods={"POST"})
     */
    public function updateFacility(
        string $id, 
        Request $request, 
        FacilityRepository $facilityRepository, 
        EntityManagerInterface $entityManager
    ): Response
    {
        $data = json_decode($request->getContent(), true);

        $facility = $facilityRepository->find($id);

        if ($facility && !empty($data['state']) && ($data['state'] == 'free' || $data['state'] == 'occupied')){
            $facility->setState($data['state']);
            $entityManager->persist($facility);
            $entityManager->flush();

            return new JsonResponse([
                'success' => true
            ]);
        }

        return new JsonResponse([
            'success' => false
        ]);
    }
}
