<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ProprioChiensController extends AbstractController
{
    public function __construct(private EntityManagerInterface $entityManager)
    {
    }
    #[Route('/', name: 'app_proprio_chiens')]
    public function index(): Response
    {
        $repo = $this->entityManager->getRepository(Personne::class);
        $personnes = $repo->findAll();
        /*var_dump($personnes);*/
        return $this->render('proprio_chiens/index.html.twig', [
            'personnes' => $personnes,
        ]);
    }
}
