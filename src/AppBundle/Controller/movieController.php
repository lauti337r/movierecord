<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


class movieController extends Controller
{
    /**
     * @Route("/movies", name="movies")
     */
    public function indexAction(){
        $mod = new movieModel();
        $listm = $mod->listMovies();

        foreach($listm as $movie){
            $g = $mod->listMovieGenre($movie['id']);
            foreach($g as $genre){
                $genres[]=$genre['name'];
            }
            $a = $mod->listMovieCast($movie['id']);
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
        return $this->render('movies/movie.html.twig',['peliculas' => $movies]);
    }
    /**
     * @Route("/movies/random", name="random movie")
     */
    public function randomAction()
    {
        return new Response("Mira la peli ".rand(0,100));
    }
}
