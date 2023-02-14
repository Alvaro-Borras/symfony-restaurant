<?php

namespace App\Controller;

use App\Entity\Foodrinks;
use App\Entity\Lintic;
use App\Entity\Tickets;

use App\Repository\TicketsRepository;
use Doctrine\ORM\EntityManagerInterface;
use ContainerPgHsVwR\getTicketsRepositoryService;
use DateTimeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

// class ManageTicketController extends AbstractController
// {
//     // #[Route('/listTickets', name: 'list_tickets')]
//     // public function listTickets():  Response
//     // {
//     //     // $tickets = $this->$doctrine->getRepository(Tickets::class)->findByDate($fechaInicial, $fechaFinal);

//     //     return $this->render('main/manageTickets/listTickets.html.twig', [
//     //         // 'tickets' => $tickets,
//     //     ]);
//     // }

//     // #[Route('/ticketsReport', name: 'tickets_report', methods:['GET'])]
//     // public function ReportsTickets(LinticRepository $repository): Response
//     // {
//     //     $dataInicial=$_GET['di']; //data inicio --> di
//     //     $dataFinal=$_GET['df']; //data final --> df

//     //     $tickets = $repository->findByDateRange($dataInicial, $dataFinal);
//     //     // $tickets = $this->$doctrine->getRepository(Tickets::class)->findByDate($fechaInicial, $fechaFinal);

//     //     return $this->render('main/manageTickets/ticketsReport.html.twig', [
//     //         'tickets' => $tickets,
//     //     ]);
//     // }
// }

class ManageTicketController extends AbstractController
{
    #[Route('/listTickets', name: 'list_tickets')]
    public function listTickets():  Response
    {
        // $tickets = $this->$doctrine->getRepository(Tickets::class)->findByDate($fechaInicial, $fechaFinal);

        return $this->render('main/manageTickets/listTickets.html.twig', [
            // 'tickets' => $tickets,
        ]);
    }

    #[Route('/ticketsReport/', name: 'tickets_report', methods:['GET'])]
    public function ReportsTickets(EntityManagerInterface $entityManager)
    {
        $repositoryT = $entityManager->getRepository(Tickets::class);
        // $repositoryF = $entityManager->getRepository(Foodrinks::class);

        // $repositoryL = $entityManager->getRepository(Lintic::class);                                       
    
        $dataInicial = $_GET['di']; //data inicio --> di
        $dataFinal = $_GET['df']; //data final --> df
        // print_r($dataInicial);
        $aran=[];
        
        $tickets = $repositoryT->findAll();    
        // $foodrinks = $repositoryF->findAll();    
        // $query = $entityManager->createQuery('SELECT id_F FROM App\Entity\Foodrinks');
        // $result = $query->getResult();

        //print_r($result); 
        // 
        foreach ($tickets as $ticket) {
            // $data = $ticket->getDatic();            
            $data = $ticket->getDatic()->format('Y-m-d');            
            // print_r($data);
            
            if ($dataInicial <= $data && $dataFinal >= $data) { 
                // $lintic = $repositoryT->findAll();

                // print_r($lintic);                
                // $numL = $lintic->getNumL();
             
                $aran[] = [
                    'id_T' => $ticket->getIdT(),             
                    'people' => $ticket->getPeople(),
                    'datic' => $ticket->getDatic()->format('Y-m-d'),
                    // 'numL' =>$this->$numL,
                ];             
                // print_r($aran);
                // print_r($aran2);
            }
        }
    
        return $this->render('main/manageTickets/ticketsReport.html.twig',[
            'tickets' => $aran,
            // 'tickets1' => $aran2, 
        ]);
    }
    


}  //     for ($i = 1; $i= $len; $i++) {
            
    //    if($dataInicial < $data[$i] && $dataFinal> $data[$i]){

    //     $aran = $data[$i];
    //     }
    //     }
    