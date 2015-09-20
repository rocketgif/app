<?php

namespace App\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * The controller handling the homepage action
 */
class HomepageController extends Controller
{
    /**
     * Render the homepage
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction(Request $request)
    {
        $orderedPosts = $this->get('app_main.post.paginator.date')->page(1);

        return $this->render('AppMainBundle:Post:list.html.twig', [
            'posts'    => $orderedPosts,
            'nextPage' => 2,
        ]);
    }
}
