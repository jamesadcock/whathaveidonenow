<?php

namespace whathaveidonenow\blogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use whathaveidonenow\blogBundle\Entity\Posts;
use whathaveidonenow\blogBundle\Entity\Task;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class DefaultController extends Controller
{

    public function indexAction()  //controller for index page page
	{

		$posts = $this->getDoctrine()
		->getRepository('whathaveidonenowblogBundle:Posts')
		->findAll();
		$data['posts']= $posts;
		return $this->render(
				'whathaveidonenowblogBundle:Default:index.html.twig',$data);
	}


    public function postFormAction(Request $request)  //controller for postscrewup page
    {
        $post = new Posts();
        $form = $this->createFormBuilder($post)
            ->add('title', 'text')  // post title field
            ->add('description', 'text')  // description field
            ->add('relation', 'choice', array(     // relationship to person posting review
                'choices'   => array('Girlfriend' => 'Girlfriend', 'Wife ' => 'Wife',
                'Boyfriend' => 'Boyfriend', 'Husband' => 'Husband'),
                'required'  => true ))
            ->add('file','file')   // screenshot of message file
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid())  // if form submitted and valid
        {

            $em = $this->getDoctrine()->getManager();
            $post->upload();  //move file to to web/uploads/documents
            $path = $post->getWebPath();
            $post->setPath($path);
            $em->persist($post);
            $em->flush();  // persist post properties to DB;
            return $this->redirect($this->generateUrl('whathaveidonenowblog_homepage'));  //redirect to homepage after submission
        };

        return $this->render('whathaveidonenowblogBundle:Default:post.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}





