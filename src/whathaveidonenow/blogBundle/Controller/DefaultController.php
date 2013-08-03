<?php

namespace whathaveidonenow\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use whathaveidonenow\blogBundle\Entity\Posts;

class DefaultController extends Controller
{
	public function indexAction()
	{
		//return new Response('<html><body> Blog Test!</body> </html>');

		$posts = $this->getDoctrine()
		->getRepository('whathaveidonenowblogBundle:Posts')
		->findAll();

		$data=['posts'=> $posts];

		return $this->render(
				'whathaveidonenowblogBundle:Default:index.html.twig',$data);
	}

	public function postAction()
	{
		$post = new Posts();
		$post->setPath('/web/020733_2_1.jpg');
		$post->setComment('This is a comment I have written');

		$em = $this->getDoctrine()->getManager();
		$em->persist($post);
		$em->flush();

		return new Response('Created product id '.$post->getId());
	}
}
