<?php

/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 09/07/2016
 * Time: 15:09
 */
namespace AppBundle\Entity;
class item{
    protected $id;
    protected $type;
    protected $review;

    public function getID(){return $this->id;}
    public function setID($id){$this->id = $id;}
    public function getType(){return $this->type;}
    public function setType($type){$this->type = $type;}
    public function getReview(){return $this->review;}
    public function setReview($review){$this->review = $review;}

}