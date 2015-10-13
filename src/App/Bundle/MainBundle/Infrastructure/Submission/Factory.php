<?php

namespace App\Bundle\MainBundle\Infrastructure\Submission;

use App\Bundle\MainBundle\Form\Model\Submission\Add as AddModel;
use App\Bundle\MainBundle\Infrastructure\Clock\Clock;
use App\Domain\Post\Resolver\ResolverInterface;
use App\Domain\Submission\Submission;

/**
 * Create a new Submission
 */
class Factory
{
    /**
     * The application clock
     *
     * @var Clock
     */
    private $clock;

    /**
     * The service used to retrieve a correct gif URL from a user-readable URL
     *
     * @var ResolverInterface
     */
    private $resolver;

    /**
     * The Submission constructor
     *
     * @param Clock             $clock
     * @param ResolverInterface $resolver
     */
    public function __construct(Clock $clock, ResolverInterface $resolver)
    {
        $this->clock    = $clock;
        $this->resolver = $resolver;
    }

    /**
     * Create a new submission from the form model
     *
     * @param AddModel $model
     *
     * @return Submission
     */
    public function create(AddModel $model)
    {
        $title   = $model->title;
        $author  = $model->author;
        $now     = $this->clock->now();
        $baseUrl = $this->transformUrl($model->url);
        $video   = $this->resolver->resolve($model->url);
        $key     = $video->getKey();
        $webm    = $video->getWebmUrl();
        $mp4     = $video->getMp4Url();
        $width   = $video->getWidth();
        $height  = $video->getHeight();

        $submission = new Submission(
            $title, $key, $now, $baseUrl, $webm, $mp4, $width, $height, $author
        );

        return $submission;
    }

    /**
     * Transform a given HTTP url to HTTPS url
     *
     * @param string $url
     *
     * @return string
     */
    private function transformUrl($url)
    {
        $url = preg_replace('#^http://#', 'https://', $url);

        return $url;
    }
}
