<?php

namespace Fadhil\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('FadhilTestBundle:Default:index.html.twig', array('name' => $name));
    }

    public function randomAction($number)
    {
    	# code...
    	$number = rand(0, $number);
    	return $this->render('FadhilTestBundle:Default:random.html.twig', array('number' => $number));
    }

    public function formAction(Request $request)
    {
    	# code...
    	
    }
}
