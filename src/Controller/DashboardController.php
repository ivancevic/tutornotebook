<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    /**
     * @var Security
     */
    private $security;
    
    public function __construct(\Symfony\Component\Security\Core\Security $security) {
        $this->security = $security;
    }
    /**
     * @Route("/dashboard", name="dashboard")
     */
    public function dashboard(): Response
    {
        $user = $this->security->getUser();
        if (!$user) {
            return $this->redirectToRoute('app_login');
        }
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
