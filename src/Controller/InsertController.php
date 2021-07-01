<?php

namespace App\Controller;

use App\Entity\Video;
use App\Form\DataFormType;
use App\Repository\VideoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsertController extends AbstractController
{
    
    /**
     * @Route("/insert", name="insert")
     */
    public function insert(Request $request): Response
    {
        $video = new Video();
        $form = $this->createForm(DataFormType::class, $video);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           

            $dataForm = $form->getData();

            // dd($dataForm);
            
            $video->setName($dataForm->getName());
            $video->setSlug($dataForm->getSlug());
            $video->setUrl($dataForm->getUrl());
            $video->setImage($dataForm->getImage());

            $em = $this->getDoctrine()->getManager();
            $em->persist($video);
            $em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('insert/insert.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
