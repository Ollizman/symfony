<?php
namespace App\Controller;

//use Lihapiirakka;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EsimerkitController extends AbstractController{
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
        /*include Lihapiirakka.php;
       
        $lihis = new Lihapiirakka();
        $lihis->setHinta(2.5);
        $lihis->setRahaa(10);
        if($lihis->getRahaa() >= $lihis->getHinta()) {
            return new Response('Rahat ' . $lihis->getRahaa() . ' €, riittävät lihapiirakkaan (' . $lihis->getHinta() . ' euroa)');
            $lihis->ostaLihis();
        } else {
            return new Response('Ei rahaa lihapiirakkaan! =)');
        }*/
    }
    /** 
    * @Route("esimerkit/esim7")
    */
    public function laskePakkasasteet(){
        // Muuttujat
        $summa = 0;
        $pakkaspaivat = 0;
        $tekija = "Olli Manninen";
        $mittausviikko = 35;
        $ka1 = 0;
        $ka2 = 0;
        //Talletetaan viikon lämpötilat taulukkoon
        $pakkasasteet = [
        'ma' => 6,
        'ti' => 3,
        'ke' => -10,
        'to' => -32,
        'pe' => -5,
        'la' => -6,
        'su' => -3
        ];
        foreach ($pakkasasteet as $pakkasta) {
            if($pakkasta < 0) {
                $summa += $pakkasta;
                $pakkaspaivat++;
            }
        }
        //Lasketaan pakkaspäivien ka pakkasmäärä yhdellä desilä
        $ka1 = number_format(($summa / $pakkaspaivat), 1);
        //Lasketaan koko viikon ka lämpötila 1:llä desillä
        $ka2 = number_format(array_sum($pakkasasteet) / count($pakkasasteet), 1);

        //Kutsutaan näkymää ja lähetetään sille dataa sisältävät muuttujat
        return $this->render('esimerkit/pakkasasteet.html.twig' , [
            'pakkasasteet' => $pakkasasteet,
            'ka1' => $ka1,
            'ka2' => $ka2,
            'viikko' => $mittausviikko,
            'tekija' => $tekija
        ]);
        }
}

?>