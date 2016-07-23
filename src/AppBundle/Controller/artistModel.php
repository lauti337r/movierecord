<?php

/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 11/07/2016
 * Time: 14:37
 */

namespace AppBundle\Controller;

class artistModel{
    function idArt($artist){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT id FROM artist WHERE name=\"$artist\"")->fetch_row()[0];
    }
    function listMovApp($idArt){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $res = $db->query("SELECT m.id,m.title,a.name,m.year,m.plot,m.review,m.runtime,m.releaseDate,m.poster 
                            FROM movie AS m, artist AS a, moviecast as mc 
                            WHERE mc.id_act=$idArt AND a.id=m.id_dir AND m.id=mc.id_movie");
        if($res->num_rows != 0)return $res;
        else return -1;
    }
    function listMovDirected($idDir){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $res = $db->query("SELECT m.id,m.title,a.name,m.year,m.plot,m.review,m.runtime,m.releaseDate,m.poster 
                          FROM movie AS m, artist AS a WHERE m.id_dir=$idDir AND m.id_dir=a.id");
        if($res->num_rows != 0)return $res;
        else return -1;
    }
    function listTVSApp($idArt){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $res = $db->query("SELECT t.id,t.title,a.name,t.year_s,t.year_e,t.plot,t.review,t.poster 
                          FROM tvshow AS t, artist AS a, tvshowcast as tc
                          WHERE tc.id_act=$idArt AND a.id=tc.id_act AND t.id=tc.id_tvshow");
        if($res->num_rows != 0)return $res;
        else return -1;
    }
    function listTVSWritten($idWri){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $res = $db->query("SELECT t.id,t.title,a.name,t.year_s,t.year_e,t.plot,t.review,t.poster 
                          FROM tvshow AS t, artist AS a WHERE t.id_writer=$idWri AND t.id_writer=a.id");
        if($res->num_rows != 0)return $res;
        else return -1;
    }

}
