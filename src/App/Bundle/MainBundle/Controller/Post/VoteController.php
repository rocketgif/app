<?php

namespace App\Bundle\MainBundle\Controller\Post;

use App\Bundle\MainBundle\Form\Model\Post\Vote\Upvote as UpvoteModel;
use App\Bundle\MainBundle\Form\Type\Post\Vote\UpvoteType;
use App\Domain\Vote\UpvoteCommand;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * The controller handling vote actions on posts
 */
class VoteController extends Controller
{
    /**
     * Upvote a post
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function upvoteAction(Request $request)
    {
        $model = new UpvoteModel();
        $form  = $this->createForm(new UpvoteType(), $model);

        $this->handleUpvoteRequest($form, $request);

        if ($form->isValid()) {
            $command = new UpvoteCommand($model->object, $model->user);
            $bus     = $this->getCommandBus();
            $bus->launch($command);

            $reader = $this->getReader();
            if ($reader->isUpvoted($model->object, $model->user)) {
                return new Response(
                    sprintf('User \'%s\' successfully upvoted the post \'%d\'.', $model->user, $model->object),
                    200
                );
            }
        }

        return new Response(
            sprintf('User \'%s\' cannot upvote the post \'%d\'.', $model->user, $model->object),
            400
        );
    }

    /**
     * Submit all necessary properties from the request
     *
     * @param FormInterface $form
     * @param Request       $request
     */
    private function handleUpvoteRequest(FormInterface $form, Request $request)
    {
        $object = $request->get('identifier');
        $user   = $this->getCurrentUser();

        $form->submit([
            'object' => $object,
            'user'   => $user,
        ]);
    }

    /**
     * Retrieve the unique user identifier in the session. Create a new user if
     * it still does not exist
     *
     * @return string
     */
    private function getCurrentUser()
    {
        $authenticator = $this->get('app_main.user.authenticator');

        $user = $authenticator->getUser();
        if ($user === null) {
            $user = $authenticator->createUser();
        }

        return $user;
    }

    /**
     * Retrieve the vote command bus service
     *
     * @return \App\Domain\Command\BusInterface
     */
    private function getCommandBus()
    {
        return $this->get('app_main.post.vote.command.bus');
    }

    /**
     * Retrieve the vote reader service
     *
     * @return \App\Domain\Vote\ReaderInterface
     */
    private function getReader()
    {
        return $this->get('app_main.post.vote.reader');
    }
}
