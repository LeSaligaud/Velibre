<?php

namespace App\Controller;

use App\Repository\StationRepository;
use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin')]
    public function index(StationRepository $station_repo, VeloRepository $velo_repo): Response
    {
        $stations = $station_repo->findAll();
        $velos = $velo_repo->findAll();

        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
            'stations' => $stations,
            'velos' => $velos
        ]);
    }
}
