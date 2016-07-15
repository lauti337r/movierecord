<?php

namespace AppBundle\Controller;

use AppBundle\Entity\item;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

include 'string.php';


class addController extends Controller
{
    /**
     * @Route("/add", name="add")
     */
    public function indexAction(Request $request){
        $item = new item();
        $item->setID("ID");
        $item->setType("Movie or TVShow");
        $form = $this->createFormBuilder($item)
            ->add('id', TextType::class)
            ->add('type', ChoiceType::class, array('choices' => array('Tv Show' => 'tv', 'Movie' => 'movie')))
            ->add('review',TextareaType::class,array())
            ->add('save', SubmitType::class, array('label' => 'Insert item'))
            ->getForm();

        $form->handleRequest($request);


        if ($form->isSubmitted() && $form->isValid()) {
            $result = $this->insert($item->getID(),$item->getType(),$item->getReview());
            return $this->render("add/add.html.twig",array('form' => $form->createView(),'message'=>$result));

        }
        return $this->render("add/add.html.twig",array('form' => $form->createView(),'message'=>''));
    }


    private function insert($imdbid, $type,$review){
        $mod = new addModel();
        $mod = new addModel();
        return $mod->insert($imdbid, $type, $review);
    }
}
