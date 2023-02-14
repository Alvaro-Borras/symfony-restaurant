<?php

namespace App\Controller;

use App\Repository\FoodrinksRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CrearTablaController extends AbstractController
{
    #[Route('/catalog', name: 'app_catalog')]
    public function catalog(FoodrinksRepository $response): Response
    {
        $catalog =  $response->findAll();
        return $this->render('main/manageCatalog/catalog.html.twig', [
            'catalog' => $catalog,
        ]);
    }

    #[Route('/delete/{id_F}', name: 'delete_author')]
    public function delete(FoodrinksRepository $repository, EntityManagerInterface $entityManager, int $id_F): Response
    {
        $catalog = $repository->find($id_F);

        $entityManager->remove($catalog);
        $entityManager->flush();

        return $this->redirect('/catalog');
    }
}
