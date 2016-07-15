<?php
/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 11/07/2016
 * Time: 19:25
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;



class genreModel{
    function listMovByGenre($genre){
        $db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT m.id FROM movie AS m, genre AS g, moviegenre AS mg 
                            WHERE g.name=\"$genre\" AND m.id=mg.id_movie AND mg.id_genre=g.id");
    }
    function listTVByGenre($genre){
        $db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT t.id FROM tvshow AS t, genre AS g, tvshowgenre AS tg
                            WHERE g.name=\"$genre\" AND t.id=tg.id_tvshow AND tg.id_genre=g.id");
    }

}