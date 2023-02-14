<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FooDrinksController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(): Response
    {
        return $this->render('main/main.html.twig', [
            'controller_name' => 'FooDrinksController',
        ]);
    }


    // CREATEMENU     
    // #[Route('/cart', name: 'app_cart')]
    // public function cart(): Response
    // {
    //     return $this->render('main/createMenu/cart.html.twig', [
    //         'controller_name' => 'FooDrinksController',
    //     ]);
    // }
    
    #[Route('/modStock', name: 'app_modStock')]
    public function modStock(): Response
    {
        return $this->render('main/createMenu/modifyStock.html.twig', [
            'controller_name' => 'FooDrinksController',
        ]);
    }

    #[Route('/stockFood', name: 'app_stock')]
    public function stock(): Response
    {
        return $this->render('main/createMenu/stock_foodDrinks.html.twig', [
            'controller_name' => 'FooDrinksController',
        ]);
    }

    // MANAGECATALOG     

    // #[Route('/modifyItem', name: 'app_modItem')]
    // public function modItem(): Response
    // {
    //     return $this->render('main/manageCatalog/modifyItem.html.twig', [
    //         'controller_name' => 'FooDrinksController',
    //     ]);
    // }

    // #[Route('/newItem', name: 'app_newItem')]
    // public function newItem(): Response
    // {
    //     return $this->render('main/manageCatalog/newItem.html.twig', [
    //         'controller_name' => 'FooDrinksController',
    //     ]);
    // }

    // TICKETSLIST 
    // #[Route('/listTickets', name: 'app_list')]
    // public function listTicket(): Response
    // {
    //     return $this->render('main/manageTickets/listTickets.html.twig', [
    //         'controller_name' => 'FooDrinksController',
    //     ]);
    // }

    // #[Route('/ticketsReport', name: 'app_report')]
    // public function ticketReport(): Response
    // {
    //     return $this->render('main/manageTickets/ticketsReport.html.twig', [
    //         'controller_name' => 'FooDrinksController',
    //     ]);
    // }
    
}
