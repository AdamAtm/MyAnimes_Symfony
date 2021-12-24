<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/default", name="default")
     */
    public function index(): Response
    {
        $roles = $this->getUser()->getRoles();
        switch ($roles[0]) {
            case 'ROLE_USER':
                return $this->redirectToRoute('account');
                break;
            case 'ROLE_ADMIN':
                return $this->redirectToRoute('dashboard');
                break;
            default:
                return $this->redirectToRoute('app_login');
                break;
        }
    }
}
