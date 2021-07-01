<?php

namespace App\Controller;

use App\Repository\VideoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(VideoRepository $videoRepository): Response
    {
        $videos = $videoRepository->findAll();
        // dd($list);

        return $this->render('list/index.html.twig', [
            'videos' => $videos,
        ]);
    }
}
