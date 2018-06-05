<?php
/**
 * Created by PhpStorm.
 * User: nicol
 * Date: 04/06/2018
 * Time: 23:13
 */

namespace App\Controller;


use App\Controller\Models\IdeasManager;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class MainController extends AbstractController
{
    /**
     * @Route("/")
     */
    public function homepage()
    {
        return $this->render('home.html.twig');
    }

    /**
     * @Route("/addIdea",methods={"POST"})
     */
    public function addIdea(Request $request)
    {
        $title = $request->request->get('title');
        $content = $request->request->get('description');
        if (strlen($title) > 0 && strlen($content) > 0) {
            $em = $this->getDoctrine()->getManager();
            $idea = new IdeasManager();
            $idea = $idea->addIdea($title, $content);
            $em->persist($idea);
            $em->flush();

        }
        return $this->redirectToRoute('//');
    }


}