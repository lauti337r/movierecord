<?php
/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 11/07/2016
 * Time: 22:39
 */

namespace AppBundle\Controller;

use AppBundle\Entity\contactEntry;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class contactController extends Controller{
    /**
     * @Route("/contact", name="contact")
     */
    public function indexAction(Request $request){
        $contactEntry = new contactEntry();
        $contactEntry->setName("Lautaro Romeo");
        $contactEntry->setEmail("lau337.r@gmail.com");
        $contactEntry->setSubject("Asunto");
        $contactEntry->setComment("Comentario");
        $form = $this->createFormBuilder($contactEntry)
            ->add('name', TextType::class)
            ->add('email', TextType::class)
            ->add('subject', TextType::class)
            ->add('comment',TextareaType::class,array())
            ->add('save', SubmitType::class, array('label' => 'Enviar'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $message = \Swift_Message::newInstance()
                ->setSubject($contactEntry->getSubject())
                ->setFrom($contactEntry->getEmail())
                ->setTo('lau337.r@gmail.com')
                ->setBody(
                    $this->renderView(
                        'contact/contact.html.twig',
                        array('name' => $contactEntry->getName(),
                            'form' => $form->createView(),
                            'message'=>'MENSAJE ENVIADO!')
                    ),
                    'text/html'
                );
            $this->get('mailer')->send($message);
            //return $this->render("contact/contact.html.twig",array());
        }
        return $this->render("contact/contact.html.twig",array('form' => $form->createView(),'message'=>''));

        /*
         */
    }
}