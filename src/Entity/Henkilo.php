<?php
namespace App\Entity;

class Henkilo{
   private $etunimi;
   private $sukunimi;
   private $email;
   private $kirjauspvm;
   public function setEtunimi($etunimi){
       $this->etunimi = $etunimi;
   }
   public function getEtunimi(){
       return $this->etunimi;
   }
   public function setSukunimi($sukunimi){
       $this->sukunimi = $sukunimi;
   }
   public function getSukunimi(){
       return $this->sukunimi;
   }
   public function setEmail($email){
       $this->email = $email;
   }
   public function getEmail(){
       return $this->email;
   }
   public function setKirjauspvm(\DateTimeInterface $kirjauspvm){
       $this->kirjauspvm = $kirjauspvm;
   }
   public function getKirjauspvm(){
       return $this->kirjauspvm;
   }
}
?>