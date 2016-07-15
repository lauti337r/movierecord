<?php
/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 11/07/2016
 * Time: 23:23
 */

namespace AppBundle\Entity;


class contactEntry{
    protected $name;
    protected $email;
    protected $subject;
    protected $comment;

    public function getName(){return $this->name;}
    public function getEmail(){return $this->email;}
    public function getSubject(){return $this->subject;}
    public function getComment(){return $this->comment;}
    public function setName($name){$this->name=$name;}
    public function setEmail($email){$this->email=$email;}
    public function setSubject($subject){$this->subject=$subject;}
    public function setComment($comment){$this->comment=$comment;}



}