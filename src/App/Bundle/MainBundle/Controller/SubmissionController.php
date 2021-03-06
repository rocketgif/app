<?php

namespace App\Bundle\MainBundle\Controller;

use App\Bundle\MainBundle\Entity\Submission;
use App\Bundle\MainBundle\Form\Model\Submission\Add as AddSubmissionModel;
use App\Bundle\MainBundle\Form\Type\Submission\AddType as AddSubmissionType;
use App\Domain\Post\Resolver\Exception\InvalidUrlException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;

/**
 * The controller handling the submission actions
 */
class SubmissionController extends Controller
{
    /**
     * Add a new submission
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function addAction(Request $request)
    {
        $model = new AddSubmissionModel();
        $form  = $this->createAddSubmissionForm($model);

        if ($form->handleRequest($request)->isSubmitted() && $form->isValid()) {
            try {
                $submission = $this->get('app_main.submission.factory')->create($model);
                $this->get('app_main.submission.writer')->add($submission);

                $this->addFlash('success', 'flash.submission.add.success');

                return $this->redirectToRoute('app_main_submission_add');
            } catch (InvalidUrlException $exception) {
                $form->get('url')->addError(new FormError('Unfortunately, this URL didn\'t allow us to collect all necessary data. Please try to enter another URL.'));
            }
        }

        return $this->render('AppMainBundle:Submission:add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * Render the submission list
     *
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function listAction(Request $request)
    {
        $submissions = $this->get('app_main.submission.reader')->findAll();

        return $this->render('AppMainBundle:Submission:list.html.twig', [
            'submissions' => $submissions,
        ]);
    }

    /**
     * Validate the given submission
     *
     * @param Request $request
     * @param int     $identifier
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function validateAction(Request $request, $identifier)
    {
        $entity = $this->get('app_main.submission.reader')->find($identifier);

        if (!$entity) {
            throw $this->createNotFoundException(
                sprintf(
                    'Cannot find the submission with identifier "%s"',
                    $identifier
                )
            );
        }

        $submission = $this->get('app_main.submission.entity_converter')
            ->from($entity)
        ;

        $this->get('app_main.submission.validator')->validate($submission);

        $this->addFlash('success', 'flash.submission.validate.success');

        return $this->redirectToRoute('app_main_submission_list');
    }

    /**
     * Refuse the given submission
     *
     * @param Request $request
     * @param int     $identifier
     *
     * @Security("is_granted('ROLE_ADMIN')")
     *
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function refuseAction(Request $request, $identifier)
    {
        $entity = $this->get('app_main.submission.reader')->find($identifier);

        if (!$entity) {
            throw $this->createNotFoundException(
                sprintf(
                    'Cannot find the submission with identifier "%s"',
                    $identifier
                )
            );
        }
        $submission = $this->get('app_main.submission.entity_converter')
            ->from($entity)
        ;

        $this->get('app_main.submission.validator')->refuse($submission);

        $this->addFlash('success', 'flash.submission.refuse.success');

        return $this->redirectToRoute('app_main_submission_list');
    }

    /**
     * @param AddSubmissionModel $model
     *
     * @return \Symfony\Component\Form\Form
     */
    private function createAddSubmissionForm(AddSubmissionModel $model)
    {
        $form = $this->createForm(new AddSubmissionType(), $model, [
            'action' => $this->generateUrl('app_main_submission_add'),
        ]);
        $form->add('submit', 'submit');

        return $form;
    }
}
