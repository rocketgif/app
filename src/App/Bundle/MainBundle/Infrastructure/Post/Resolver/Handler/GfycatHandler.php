<?php

namespace App\Bundle\MainBundle\Infrastructure\Post\Resolver\Handler;

use App\Domain\Post\Resolver\Exception\InvalidUrlException;
use App\Domain\Post\Resolver\Handler\HandlerInterface;
use App\Domain\Post\Resolver\Video;
use GuzzleHttp\Client;
use GuzzleHttp\GuzzleException;

/**
 * Fetch data from a gfycat page
 */
class GfycatHandler implements HandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function resolve($url)
    {
        $client = new Client();

        $key = $this->retrieveKey($url);
        try {
            $response = $client->request('GET', sprintf('http://gfycat.com/cajax/get/%s', $key), []);
        } catch (\Exception $exception) {
            throw new InvalidUrlException(sprintf('Unable to access to the given URL "%s".', $url));
        }

        $result = json_decode($response->getBody()->getContents());

        if (!isset($result->gfyItem)) {
            throw new InvalidUrlException(sprintf('The URL "%s" is not linking to valid Gfycat.', $url));
        }

        if (
            $result->gfyItem->webmUrl === null
            || $result->gfyItem->mp4Url === null
            || $result->gfyItem->width === null
            || $result->gfyItem->height === null
        ) {
            throw new InvalidUrlException(sprintf('Gfycat didn\'t provide all informations for the URL "%s".', $url));
        }

        $video = new Video(
            $key,
            $this->transformUrl($result->gfyItem->webmUrl),
            $this->transformUrl($result->gfyItem->mp4Url),
            $result->gfyItem->width,
            $result->gfyItem->height
        );

        return $video;
    }

    /**
     * Retrieve the unique gfycat key from the given url
     *
     * @param string $url
     *
     * @return string
     *
     * @throws InvalidUrlException
     */
    private function retrieveKey($url)
    {
        $pattern = "/^((http(s)?)?:\/\/)?(www\.)?gfycat\.com\/(?P<key>\w+)$/";
        $matches = [];
        preg_match($pattern, $url, $matches);

        if (!isset($matches['key'])) {
            throw new InvalidUrlException(sprintf('The URL "%s" is not a valid Gfycat URL.', $url));
        }

        $key = $matches['key'];

        return $key;
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
