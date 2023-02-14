<?php

namespace App\Controller;
use App\Form\FoodrinksFormType;
use App\Form\FoodrinksNewItemFormType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\FoodrinksRepository;
use Symfony\Component\HttpFoundation\Request as HttpFoundationRequest;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ManageCatalogController extends AbstractController
{
    #[Route('/modifyItem/{id_F}', name: 'app_manage_catalog')]
    public function index(FoodrinksRepository $repository, HttpFoundationRequest $request, $id_F, EntityManagerInterface $entityManager): Response
    {
        $catalog= $repository->find($id_F);
        $form = $this->createForm(FoodrinksFormType::class, $catalog);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $catalog = $form->getData();
            $entityManager->persist($catalog);
            $entityManager->flush();

            return $this->redirect('/catalog');
        }
        return $this->render('main/manageCatalog/modifyItem.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/newItem', name: 'app_newItem')]
    public function addItems(HttpFoundationRequest $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(FoodrinksNewItemFormType::class);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $catalog = $form->getData();
            $entityManager->persist($catalog);
            $entityManager->flush();

            return $this->redirect('/catalog');
        }
        return $this->render('main/manageCatalog/newItem.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
