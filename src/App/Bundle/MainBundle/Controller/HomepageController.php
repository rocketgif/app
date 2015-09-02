<?php

namespace App\Bundle\MainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use App\Application\Command\Post\AddCommand;
use App\Bundle\MainBundle\Form\Type\Post\AddType as AddPostType;
use App\Bundle\MainBundle\Form\Model\Post\Add as AddPostModel;

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
        $page  = $request->get('page', 1);
        $posts = $this->get('app_main.post.reader')->page($page);

        return $this->render('AppMainBundle:Homepage:index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * Add a new post
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $model = new AddPostModel();
        $form  = $this->createAddPostForm($model);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            $this->get('app_main.post.writer')->add(
                $this->get('app_main.post.factory')->create($model)
            );

            $this->addFlash('success', 'flash.post.add.success');

            return $this->redirectToRoute('app_main_post_add');
        }

        return $this->render('AppMainBundle:Homepage:add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @param AddPostModel $model
     *
     * @return \Symfony\Component\Form\Form
     */
    private function CreateAddPostForm(AddPostModel $model)
    {
        $form = $this->createForm(new AddPostType(), $model, [
            'action' => $this->generateUrl('app_main_post_add'),
        ]);
        $form->add('submit', 'submit');

        return $form;
    }
}
