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

        $isNextPage = (count($orderedPosts) === PostController::NUMBER_PER_PAGE);

        return $this->render('AppMainBundle:Post:list.html.twig', [
            'posts'    => $orderedPosts,
            'nextPage' => ($isNextPage ? 2 : null),
        ]);
    }

    /**
     * Construct the list of ordered posts using ordered identifiers to get the
     * order and posts to get objects
     *
     * @param int[]              $identifiers
     * @param \App\Domain\Post[] $posts
     *
     * @return \App\Domain\Post[]
     */
    private function getOrderedPosts(array $identifiers, array $posts)
    {
        $orderedPosts = [];

        foreach ($identifiers as $identifier) {
            $orderedPosts[] = $posts[$identifier];
        }

        return $orderedPosts;
    }
}
