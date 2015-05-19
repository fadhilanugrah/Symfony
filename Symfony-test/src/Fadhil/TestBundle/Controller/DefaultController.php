<?php

namespace Fadhil\TestBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Fadhil\TestBundle\Entity\Todo\Notes;
use Symfony\Component\HttpFoundation\Request;

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
    	// create a task and give it some dummy data for this example
        $notes = new Notes();

        $form = $this->createFormBuilder($notes)
            ->add('notes', 'text', array(
            	'required' => true
            	))
            ->add('save', 'submit', array('label' => 'Create Notes'))
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
        // perform some action, such as saving the task to the database
        	$data=$form->getData();
        	$notes->setNotes($form->get('notes')->getData());
        	$notes->setDone(0);
        	$em = $this->getDoctrine()->getManager();

    		$em->persist($notes);
    		$em->flush();
        	return $this->redirectToRoute('fadhil_test_all_todo');
    	
    	}

        return $this->render('FadhilTestBundle:Default:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    public function allNotesAction()
    {
    	# code...
    	$notes = $this->getDoctrine()->getRepository('FadhilTestBundle:Todo\Notes')->findAll();
    	return $this->render('FadhilTestBundle:Default:todo.html.twig', array(
    		'notes' => $notes
    	));
    }

    /*
	* @Route("/todo/done/{id}")
    */


    public function doneNotesAction(Request $request, $id)
    {
    	# code...
    	$em = $this->getDoctrine()->getManager();
    	$notes = $this->getDoctrine()->getRepository('FadhilTestBundle:Todo\Notes')->find($id);
    	$notes->setDone(1);
    	$em->flush();

    	return $this->redirectToRoute('fadhil_test_all_todo');
    }
}
