<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 11/07/2016
 * Time: 19:23
 */
class genreController  extends Controller{
    /**
     * @Route("/genre/{genero}", name="genre {genero}")
     */
    public function indexAction($genero){
        $genero = str_replace("%20"," ",$genero);
        $mod = new genreModel();
        $modmov = new movieModel();
        $modtvs = new serieModel();
        
        $listmovies = $mod->listMovByGenre($genero);
        $listtvshows = $mod->listTVByGenre($genero);
        
        foreach($listmovies as $movie){
            $mov[] = $modmov->listMovieByID($movie['id']);
        }

        foreach($listtvshows as $tvshow){
            $tvs[] = $modtvs->listTVShowByID($tvshow['id']);
        }

        if(!empty($mov)){
            foreach($mov as $movie){
                $g = $modmov->listMovieGenre($movie['id']);
                foreach($g as $genre){
                    $genres[]=$genre['name'];
                }
                $a = $modmov->listMovieCast($movie['id']);
                foreach($a as $actor){
                    $actors[]=$actor['name'];
                }
                $movies[]=array('titulo' => $movie['title'],
                    'generos' => $genres,
                    'anio' => $movie['year'],
                    'director' => $movie['name'],
                    'actores' => $actors,
                    'sinopsis' => $movie['plot'],
                    'opinion' => $movie['review'],
                    'poster' => $movie['poster']);
                $a="";
                $actors="";
                $g="";
                $genres="";
            }
        }else $movies=-1;

        if(!empty($tvs)){
            foreach($tvs as $tvshow){
                $g = $modtvs->listTVShowGenre($tvshow['id']);
                foreach($g as $genre){
                    $genres[]=$genre['name'];
                }
                $a = $modtvs->listTVShowCast($tvshow['id']);
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
        }else $tvshows=-1;

        return $this->render('genres/genre.html.twig',[
            'genre' => $genero,
            'gremovie' => $movies,
            'gretvs' => $tvshows,
        ]);

    }

}