<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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
    public function getFacilities(): Response
    {
        $facilities = [
            [
                'id' => 1,
                'name' => 'Klo 1',
                'position' => 'left'
            ],
            [
                'id' => 2,
                'name' => 'Klo 2',
                'position' => 'middle'
            ],
            [
                'id' => 3,
                'name' => 'Klo 3',
                'position' => 'right'
            ]
        ];

        return new JsonResponse($facilities);
    }
}
