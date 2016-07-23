<?php

/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 09/07/2016
 * Time: 19:53
 */

namespace AppBundle\Controller;


class addModel{

    function insert($imdbid,$type,$review){
        $js = json_decode(file_get_contents("http://omdbapi.com/?i=".$imdbid ."&plot=full"), true);
        foreach($js as $i){
            $i=str_replace("'","\'",$i);
            $i=str_replace('"',"\"",$i);
        }
        $review=str_replace("'","\'",$review);
        while ($js['Genre']) {
            if (strpos($js['Genre'], ',') == false) {
                $genres[] = $js['Genre'];
                $js['Genre'] = "";
            } else {
                $genres[] = before(", ", $js['Genre']);
                $js['Genre'] = after(", ", $js['Genre']);
            }
        }

        while ($js['Actors']) {
            if (strpos($js['Actors'], ', ') == false) {
                $actors[] = $js['Actors'];
                $js['Actors'] = "";
            } else {
                $actors[] = before(", ", $js['Actors']);
                $js['Actors'] = after(", ", $js['Actors']);
            }
        }

        foreach ($actors as $act) {
            $idsAct[] = $this->insertArtist($act);
        }

        foreach ($genres as $genre){
            $idsGen[] = $this->insertGenre($genre);
        }

        //FECHA
        //20 Dec 1974 -> 1974-12-20
        //Armar string de la fecha
        $date = substr($js['Released'], -4) . "-" . $this->month(between(" ", " ", $js['Released'])) . "-" . substr($js['Released'], 0, 2);

        //DURACION
        $runtime = before(" ", $js['Runtime']);

        $title = $js['Title'];
        $plot = $js['Plot'];

        file_put_contents("posters\\$imdbid.png",file_get_contents($js['Poster']));
        if ($type == "movie") {
            if (strpos($js['Director'], ', ') == false) {        //Guarda el primer director en $director
                $director = $js['Director'];
            } else {
                $director = before(", ", $js['Director']);
            }
            $idDW = $this->insertArtist($director);
            $year = $js['Year'];
            $idMovie = $this->insertMovie($title,$idDW,$year,$plot,$review,$runtime,$date,"posters/".$js['imdbID'].".png");
            if($idMovie == -1)return "PELICULA YA EXISTENTE";

            foreach ($idsAct as $act){
                $this->insertMovieCast($idMovie,$act);
            }

            foreach ($idsGen as $gen){
                $this->insertMovieGenre($idMovie,$gen);
            }
        } else {
            if (strpos($js['Writer'], ', ') == false) {
                $writer = $js['Writer'];
            } elseif($type == "tv") {
                $writer = before(', ', $js['Writer']);
            }
            $idDW = $this->insertArtist($writer);
            if(strpos($js['Year'],"–")) {
                $year_s = before("–", $js['Year']);
                $year_e = after("–", $js['Year']);
            }else {
                $year_s=$js['Year'];
                $year_e=$year_s;
            }
            if($year_e == "")$year_e="null";
            $seasons=$js['totalSeasons'];
            $idTVShow = $this->insertTVShow($title,$idDW,$year_s,$year_e,$seasons,$plot,$review,"posters/".$js['imdbID'].".png");
            if($idTVShow == -1)return "SERIE YA EXISTENTE";
            foreach ($idsAct as $act){
                $this->insertTVShowCast($idTVShow,$act);
            }

            foreach ($idsGen as $gen){
                $this->insertTVShowGenre($idTVShow,$gen);
            }
        }
        if($type == "movie")
            return "PELICULA INGRESADA CON EXITO";
        else return "SERIE INGRESADA CON EXITO";

    }

    function idArt($art){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT id FROM artist WHERE name=\"$art\"")->fetch_row()[0];
    }

    function idGen($gen){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        return $db->query("SELECT id FROM genre WHERE name=\"$gen\"")->fetch_row()[0];
    }

    function insertMovie($title,$idDir,$year,$plot,$review,$runtime,$date,$poster){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO movie(id,title,id_dir,year,plot,review,runtime,releaseDate,poster)
                    VALUES(null,\"$title\",$idDir,$year,\"$plot\",\"$review\",$runtime,\"$date\",\"$poster\")");
        if($db->insert_id)
            return $db->insert_id;
        else return -1;

    }

    function insertTVShow($title,$idWri,$year_s,$year_e,$seasons,$plot,$review,$poster){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO tvshow(id,title,id_writer,year_s,year_e,seasons,episodes,plot,review,poster) 
                        VALUES (null,\"$title\",$idWri,$year_s,$year_e,$seasons,null,\"$plot\",\"$review\",\"$poster\")");
        if($db->insert_id)return $db->insert_id;
        else return -1;
    }

    function insertArtist($art){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO artist (id,name,birthDate) VALUES (null,\"$art\",null)");
        if($db->insert_id)return $db->insert_id;
        else return $this->idArt($art);
    }

    function insertGenre($gen){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO genre (id,name) VALUES (null,\"$gen\")");
        if($db->insert_id)return $db->insert_id;
        else return $this->idGen($gen);
    }

    function insertMovieCast($idMov,$idAct){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO moviecast(id_movie,id_act) VALUES ($idMov,$idAct)");
    }

    function insertMovieGenre($idMov,$idGen){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO moviegenre(id_movie,id_genre) VALUES ($idMov,$idGen)");
    }

    function insertTVShowCast($idTVShow,$idAct){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO tvshowcast(id_tvshow,id_act) VALUES($idTVShow,$idAct)");
    }

    function insertTVShowGenre($idTVShow,$idGen){
        global $db;
        //$db = new \mysqli("localhost","root","","w2w");
        $db->query("INSERT INTO tvshowgenre(id_tvshow,id_genre) VALUES ($idTVShow,$idGen)");
    }

    function month($m){
        if($m == "Jan")return "01";
        else if($m == "Feb")return "02";
        else if($m == "Mar")return "03";
        else if($m == "Apr")return "04";
        else if($m == "May")return "05";
        else if($m == "Jun")return "06";
        else if($m == "Jul")return "07";
        else if($m == "Aug")return "08";
        else if($m == "Sep")return "09";
        else if($m == "Oct")return "10";
        else if($m == "Nov")return "11";
        else if($m == "Dec")return "12";
        else return "";
    }

}
