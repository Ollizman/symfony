<?php
namespace App\Controller;

use Lihapiirakka;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;


class EsimerkitController {
    //Kontrollerit tulee tänne
    private $veroprosentti;
    private $vuosi;
    private $ph;

    public function laskePalkka(){
        $this->veroprosentti = 25;
        $netto = 4000  * 1.00 - $this->veroprosentti;

    //Pyydetään Response-oliota näyttämään tulos
    return new Response('<h4>Bruttopalkkasi on 4500e ja nettopalkkasi on <strong>'
     . $netto . '</strong></h4>');
        }

    public function tarkistaKarkausvuosi(){
        $this->vuosi = 1566;
        if($this->vuosi % 4 == 0) {
            return new Response($this->vuosi . ' on karkausvuosi!');
        }else {
            return new Response($this->vuosi . ' ei ole karkausvuosi!');
        }
    }
    public function laskePh(){
        $this->ph = -log10(2.13*pow(10, -5));
        return new Response('<h4>Kun vesiliuoksen vetyioni-konsenraatio on 2.13 *10-5mol/l 
        sen pH on </h4>' . number_format($this->ph,1));
    }
    public function heitaNoppaa(){
        return new Response('<h1>' . rand(1,6) . '</h1>');
    }  
    public function naytaJSON(){
        $nimet = [
            'Etunimi' => 'Olli',
            'Sukunimi' => 'MAnninen'
        ];
        return new JsonResponse($nimet);
    }
    public function lihapiirakka(){
        
        $rahaaLompakossa = 10;
        $lihapiirakanHinta = 2.5;
        if($rahaaLompakossa - $lihapiirakanHinta >= -0.025) {
            return new Response('Rahat ' . $rahaaLompakossa . ' €, riittävät lihapiirakkaan (' . $lihapiirakanHinta . ' euroa)');
            $rahaaLompakossa -= $lihapiirakanHinta;
        } else {
            return new Response('Ei rahaa lihapiirakkaan! =)');
        }
    }
}

?>