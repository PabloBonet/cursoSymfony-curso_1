<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TemplateController extends AbstractController
{
    #[Route('/template', name: 'template_inicio')]
    public function index(): Response
    {  
        return $this->render("template/index.html.twig");
    }

   // #[Route('/template/parametros/{id}/{slug}', name: 'template_parametros', defaults: ['id'=>1, 'slug'=>'algo'])]
   #[Route('/template/parametros/{id}/{slug}', name: 'template_parametros')]
   public function parametros(int $id, string $slug ): Response
    {
        if ($id > 0)
        {
            die("id={$id} | slug={$slug}");
        }else
        {
            throw new NotFoundHttpException('ID <= 0');
        }
        
    }

    #[Route('/template/excepcion', name: 'template_excepcion')]
    public function excepcion(): Response
    {
       // throw $this->createNotFoundException('Esta URL no esta disponible');
       throw new NotFoundHttpException('Esta URL no esta disponible');
        
    }

    #[Route('/template/trabajo', name: 'template_trabajo')]
    public function trabajo(): Response
    {  //Interpolación
        $name='Adrian';
        $lastname ='Magnago';
       
        return $this->render("template/trabajo.html.twig", compact('name','lastname'));
       // return $this->render("template/trabajo.html.twig", ['nombre'=>$name, 'apellido'=>$lastname]);

       // return $this->render("template/trabajo.html.twig", ['nombre'=>'Pablo', 'apellido'=>'Bonet']);
    }
    #[Route('/template/layout', name: 'template_layout')]
    public function layout(): Response
    {  
        return $this->render("template/layout.html.twig");
    }



}
