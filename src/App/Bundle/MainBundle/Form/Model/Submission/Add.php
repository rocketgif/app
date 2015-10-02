<?php

namespace App\Bundle\MainBundle\Form\Model\Submission;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * Add Submission Model
 */
class Add
{
    /**
     * The title of the submission
     *
     * @var string
     *
     * @Assert\NotBlank(message="Please enter a title.")
     */
    public $title;

    /**
     * The author of the submission
     *
     * @var string
     */
    public $author;

    /**
     * The media url
     *
     * @var string
     *
     * @Assert\NotBlank(message="Please paste your gfycat link here.")
     * @Assert\Regex(
     *     pattern="/^((http(s)?)?:\/\/)?(www\.)?gfycat\.com\/(?P<key>\w+)$/",
     *     message="Please paste a valid gfycat link."
     * )
     */
    public $url;
}
