<?php

namespace App\Bundle\MainBundle\Controller;

use App\Bundle\MainBundle\Form\Model\Post\Add as AddPostModel;
use App\Bundle\MainBundle\Form\Type\Post\AddType as AddPostType;
use App\Domain\Post;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * The controller handling the Post actions
 */
class PostController extends Controller
{
    /**
     * Render the post list
     *
     * @param Request $request
     * @param int     $page
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request, $page)
    {
        $orderedPosts = $this->get('app_main.post.paginator.date')->page($page);

        if (count($orderedPosts) === 0) {
            return $this->redirectToRoute('app_main_post_soon');
        }

        return $this->render('AppMainBundle:Post:list.html.twig', [
            'posts'    => $orderedPosts,
            'nextPage' => $page + 1,
        ]);
    }

    /**
     * Render a post
     *
     * @param Request $request
     * @param Post    $post
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function showAction(Request $request, Post $post)
    {
        return $this->render('AppMainBundle:Post:show.html.twig', [
            'post' => $post,
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
            $post = $this->get('app_main.post.factory')->create($model);
            $this->get('app_main.post.writer')->add($post);

            $this->addFlash('success', 'flash.post.add.success');

            return $this->redirectToRoute('app_main_post_add');
        }

        return $this->render('AppMainBundle:Post:add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Display the soon™ page
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function soonAction(Request $request)
    {
        return $this->render('AppMainBundle:Post:soon.html.twig');
    }

    /**
     * Create the form to add a post
     *
     * @param AddPostModel $model
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createAddPostForm(AddPostModel $model)
    {
        $form = $this->createForm(new AddPostType(), $model, [
            'action' => $this->generateUrl('app_main_post_add'),
        ]);
        $form->add('submit', 'submit');

        return $form;
    }
}
