<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class FormulariosController extends AbstractController
{
    #[Route('/formularios', name: 'formularios_inicio')]
    public function index(): Response
    {
        return $this->render('formularios/index.html.twig', [
            'controller_name' => 'FormulariosController',
        ]);
    }

    #[Route('/formularios/simple', name: 'formulario_simple')]
    public function simple(Request $request): Response
    {
        $form = $this->createFormBuilder(null)
        ->add('nombre', TextType::class, ['label'=>'Nombre'])
        ->add('correo', TextType::class, ['label'=>'E-Mail'])
        ->add('telefono', TextType::class, ['label'=>'Telefono'])
        ->add('save', SubmitType::class)
        ->getForm();

        $form->handleRequest($request);

        if($form->isSubmitted())
        {   //Si viene la peticion POST del formulario

            $campos = $form->getData();
            //print_r($campos);

            echo "Nombre:".$campos['nombre']." | E-Mail:".$campos['correo']." | Telefono:".$campos['telefono'];
            die();

        }else
        {

        }
        return $this->render('formularios/simple.html.twig', compact('form'));
    }
}
