<?php

namespace App\Controller;

use App\Entity\Velo;
use App\Repository\StationRepository;
use App\Repository\VeloRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class HomeController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(StationRepository $station_repo, VeloRepository $velo_repo, AuthenticationUtils $authenticationUtils): Response
    {
        if ($authenticationUtils->getLastUsername()) {
            $stations = $station_repo->findAll();
            $velos = $velo_repo->findAll();

            return $this->render('home/index.html.twig', [
                'controller_name' => 'HomeController',
                'stations' => $stations,
                'velos' => $velos
            ]);
        } else {
            return $this->redirectToRoute('app_login');
        }

    }
}
