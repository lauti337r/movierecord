<?php

namespace AppBundle\Controller;

/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 11/07/2016
 * Time: 13:13
 */
class serieModel{
    function listTVShows(){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT t.id,t.title,a.name,t.year_s,t.year_e,t.seasons,t.plot,t.review,t.poster
                          FROM tvshow AS t, artist AS a WHERE a.id=t.id_writer");
    }

    function listTVShowByID($id){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT t.id,t.title,a.name,t.year_s,t.year_e,t.seasons,t.plot,t.review,t.poster
                          FROM tvshow AS t, artist AS a WHERE a.id=t.id_writer AND t.id=$id")->fetch_assoc();
    }

    function listTVShowGenre($idTVShow){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT g.name FROM genre AS g, tvshowgenre AS tg WHERE tg.id_tvshow=$idTVShow AND g.id=tg.id_genre");
    }

    function listTVShowCast($idTVShow){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT a.name FROM artist AS a, tvshowcast AS tc WHERE tc.id_tvshow=$idTVShow AND a.id=tc.id_act");
    }

}
