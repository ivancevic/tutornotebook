<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(): Response
    {
        $hasAdminAccess = $this->isGranted('ROLE_ADMIN');
        if($hasAdminAccess) {
            return $this->render('dashboard/index.html.twig', [
                'controller_name' => 'Admin Dashboard',
            ]);
        }
        
        
        $hasUserAccess = $this->isGranted('ROLE_USER');
        if($hasUserAccess) {
            return $this->render('dashboard/index.html.twig', [
                'controller_name' => 'User Dashboard',
            ]);
        }
    }

}
