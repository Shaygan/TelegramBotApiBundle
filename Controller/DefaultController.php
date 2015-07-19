<?php

namespace Shaygan\TelegramBotApiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{

    public function indexAction($name)
    {
        return $this->render('ShayganTelegramBotApiBundle:Default:index.html.twig', array('name' => $name));
    }

}
