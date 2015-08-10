<?php

namespace App\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * The controller handling the homepage action
 */
class HomepageController extends Controller
{
    /**
     * Render the homepage
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function indexAction()
    {
        return $this->render('AppMainBundle:Homepage:index.html.twig');
    }
}
