<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class serieController extends Controller
{
    /**
     * @Route("/series", name="series")
     */
    public function indexAction(){
        $mod = new serieModel();
        $listtvs = $mod->listTVShows();

        foreach($listtvs as $tvshow){
            $g = $mod->listTVShowGenre($tvshow['id']);
            foreach($g as $genre){
                $genres[]=$genre['name'];
            }
            $a = $mod->listTVShowCast($tvshow['id']);
            foreach($a as $actor){
                $actors[]=$actor['name'];
            }
            $tvshows[]=array('titulo' => $tvshow['title'],
                'generos' => $genres,
                'anio_i' => $tvshow['year_s'],
                'anio_f' => $tvshow['year_e'],
                'escritor' => $tvshow['name'],
                'actores' => $actors,
                'sinopsis' => $tvshow['plot'],
                'opinion' => $tvshow['review'],
                'poster' => $tvshow['poster']);
            $a="";
            $actors="";
            $g="";
            $genres="";
        }
        return $this->render('tvshows/tvshows.html.twig',['tvshows' => $tvshows]);
    }
}
