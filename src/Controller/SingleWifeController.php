<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use App\Examples\Wife;

/**
 * This the controller for the singleton pattern tuto request
 * 
 */
class SingleWifeController extends AbstractController
{
    /**
     * How to get a singleton class
     * 
     * @Route("/getmywife", name="singleton_getwife")
     */
    public function getWife()
    {
        $wife = Wife::getInstance();
        return $this->json([
            'tutorial' => 'Singleton pattern',
            'myWifeMessage' => $wife->sayLove(),
        ]);
    }

    /**
     * No! You can't instantiate it. You have to use getInstance() method
     * 
     * @Route("/cheatmywife", name="singleton_cheatwife")
     */
    public function cheatWife()
    {
        try {
            $wife = new Wife();
        } catch (\Error $e) {
            $wife = Wife::getInstance();
        }
        
        return $this->json([
            'tutorial' => 'Singleton pattern',
            'myWifeMessage' => $wife->sayFuck(),
        ]);
    }

    /**
     * No matter how many times you call Wife::getInstance(), it will be the same. 
     * 
     * @Route("/areyoustillmywife", name="singleton_stillMyWife")
     */
    public function areYouStillMyWife()
    {
        $wife  = Wife::getInstance();
        $wife1 = Wife::getInstance();
        $wife2 = Wife::getInstance();
        $message = "No I'm not";
        
        if ( $wife1 === $wife2 ) {
            $message = $wife->sayIamTheSame();
        }
        
        return $this->json([
            'tutorial' => 'Singleton pattern',
            'myWifeMessage' => $message,
        ]);
    }
}
