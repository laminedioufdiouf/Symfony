<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use App\Entity\Employer;
use App\Repository\EmployerRepository;
use APP\Controller\BogController;

class BlogController extends AbstractController

{
    
    /**
     * @Route("/blog", name="blog")
     */
    public function index()
    {

        return $this->render('blog/index.html.twig', [
            'controller_name' => 'BlogController', 
              ]);
    }
      
        /**
         * @Route("/",name="home")
         */
    public function home() {
        return $this->render('blog/home.html.twig');
    }
        /**
         *@Route("/blog/new" , name="blog_create")
        */
        public function create(Request $request, ObjectManager $manager ) {
            $employer = new Employer();
            $form = $this->createFormBuilder($employer)

                    ->add('matricule')
                    ->add('nomcomplet')
                    ->add('datenaissance',DateType::class,[
                            'attr' => [
                                'placeholder'=> "datenaissance de employer",
                                'class' => 'form-control'  
                            ]
                         ]) 
                    ->add('salaire')
                    
                        ->getForm();
                $form ->handleRequest($request);
                /*dump($employer);*/
            return $this->render('blog/create.html.twig',[
                'formEmployer' => $form->createView()
            ]);
    }
        /**
         * @Route("/blog/show", name="blog_show")
         */
    public function  show(){
        return $this->render('blog/show.html.twig');
    }
     
}
