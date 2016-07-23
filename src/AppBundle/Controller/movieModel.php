<?php

namespace AppBundle\Controller;

/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 09/07/2016
 * Time: 21:33
 */
class movieModel{

    function listMovies(){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT m.id,m.title,a.name,m.year,m.plot,m.review,m.runtime,m.releaseDate,m.poster 
                          FROM movie AS m, artist AS a WHERE a.id=m.id_dir");
    }

    function listMovieByID($id){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT m.id,m.title,a.name,m.year,m.plot,m.review,m.runtime,m.releaseDate,m.poster 
                          FROM movie AS m, artist AS a WHERE a.id=m.id_dir AND m.id=$id")->fetch_assoc();
    }

    function listMovieGenre($idMovie){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT g.name FROM genre AS g, moviegenre AS mg WHERE mg.id_movie=$idMovie AND g.id=mg.id_genre");

    }

    function listMovieCast($idMovie){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT a.name FROM artist AS a, moviecast AS mc WHERE mc.id_movie=$idMovie AND a.id=mc.id_act");
    }

}
