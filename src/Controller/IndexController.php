<?php

namespace App\Controller;

use App\Repository\FacilityRepository;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class IndexController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(): Response
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("/facility/list", name="facility.list")
     *
     * @return Response
     */
    public function getFacilities(FacilityRepository $facilityRepository): Response
    {
        $normalizers = [new ObjectNormalizer()];
        $serializer = new Serializer($normalizers, []);

        $facilities = $serializer->normalize($facilityRepository->findAll());

        return new JsonResponse($facilities);
    }
}
