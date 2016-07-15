<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;


/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 11/07/2016
 * Time: 14:37
 */
class artistController extends Controller{
    /**
     * @Route("/artist/{artist}", name="artist {artist}")
     */
    public function indexAction($artist){
        $artist = str_replace("%20"," ",$artist);
        $mod = new artistModel();
        $modMov = new movieModel();
        $modTVS = new serieModel();
        $idArt = $mod->idArt($artist);
        $movapps = $mod->listMovApp($idArt);
        $movdirs = $mod->listMovDirected($idArt);
        $tvapps = $mod->listTVSApp($idArt);
        $tvwris = $mod->listTVSWritten($idArt);

        if($movapps!="-1"){
        foreach($movapps as $movie){
            $g = $modMov->listMovieGenre($movie['id']);
            foreach($g as $genre){
                $genres[]=$genre['name'];
            }
            $a = $modMov->listMovieCast($movie['id']);
            foreach($a as $actor){
                $actors[]=$actor['name'];
            }
            $movapp[]=array('titulo' => $movie['title'],
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
        }else $movapp=-1;
        if($movdirs!="-1"){
        foreach($movdirs as $movie){
            $g = $modMov->listMovieGenre($movie['id']);
            foreach($g as $genre){
                $genres[]=$genre['name'];
            }
            $a = $modMov->listMovieCast($movie['id']);
            foreach($a as $actor){
                $actors[]=$actor['name'];
            }
            $movdir[]=array('titulo' => $movie['title'],
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
        }else $movdir=-1;
        if($tvapps!="-1"){
        foreach($tvapps as $tvshow){
            $g = $modTVS->listTVShowGenre($tvshow['id']);
            foreach($g as $genre){
                $genres[]=$genre['name'];
            }
            $a = $modTVS->listTVShowCast($tvshow['id']);
            foreach($a as $actor){
                $actors[]=$actor['name'];
            }
            $tvapp[]=array('titulo' => $tvshow['title'],
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
        }else $tvapp=-1;
        if($tvwris!="-1"){
        foreach($tvwris as $tvshow){
            $g = $modTVS->listTVShowGenre($tvshow['id']);
            foreach($g as $genre){
                $genres[]=$genre['name'];
            }
            $a = $modTVS->listTVShowCast($tvshow['id']);
            foreach($a as $actor){
                $actors[]=$actor['name'];
            }
            $tvwri[]=array('titulo' => $tvshow['title'],
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
        }else $tvwri=-1;

        return $this->render('artist/artist.html.twig',[
            'artist' => $artist,
            'appmovie' => $movapp,
            'dirmovie' => $movdir,
            'apptvshow' => $tvapp,
            'writvshow' => $tvwri,
        ]);
    }


}