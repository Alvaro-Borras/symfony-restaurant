<?php

namespace App\Controller;
use App\Entity\Foodrinks;

use App\Repository\FoodrinksRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\Length;

class MenuController extends AbstractController
{
    public $session;
       
    #[Route('/menu', name: 'app_menu')]
    public function menu(FoodrinksRepository $response): Response
    {
        $session= new Session();
        $session->start();
        if(!$session->get('carrito')){
            $session->set('carrito',[]);
        }
        // print_r($session->get('carrito'));
        // unset($_SESSION["carrito"]);
        if(isset($_GET['lineacarro'])){
            $lcarro= $_GET['lineacarro'];
            $tokens = $session->get('carrito');// agafa valor de la sessio de carrito y el fica en la variable $token
            $tokens[] = $lcarro;// anyade el valor que queremos a la siguiente posicion del array $tokens
            $session->set('carrito', $tokens);// Iguala el valor de la session de carrito a el valor de tokens (La diferencia es que el aumento del nuevo valor)
        }
        $catalog =  $response->findAll();
        return $this->render('main/createMenu/menu.html.twig', [
            'catalog' => $catalog,
            'total'=>count($session->get('carrito')),
        ]);
    }

    // public $lista;
    #[Route('/add/{id_F}', name: 'add_item')]
    public function addItem($id_F, EntityManagerInterface $em): Response
    {
        $fooddrink = $em->getRepository(Foodrinks::class)->find($id_F);
        $lineacarro=$fooddrink;
        return $this->redirectToRoute('app_menu', [
            'lineacarro' => $lineacarro,
        ]);
    }

    #[Route('/cart', name: 'app_ircarrito')]
    public function ircarrito(): Response
    {        
        $session= new Session();
        $session->start();
        $ar=$session->get('carrito');
        // print_r($ar);
        return $this->render('main/createMenu/cart.html.twig', [
            'vec'=>$ar,
        ]);    
    }

    #[Route('/delete', name: 'delete_cart')]
    public function deleteCart(): Response
    {
        $session= new Session();
        $session->start();
        $session->remove('carrito');
        return $this->redirectToRoute('app_ircarrito');
    }
}
