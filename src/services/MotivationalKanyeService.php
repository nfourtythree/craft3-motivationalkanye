<?php
/**
 * Motivational Kanye plugin for Craft CMS 3.x
 *
 * Quotes to brighten your day from one of the greatest minds of our time
 *
 * @link      https://n43.me
 * @copyright Copyright (c) 2019 Nathaniel Hammond (nfourtythree)
 */

namespace nfourtythree\motivationalkanye\services;

use craft\feeds\GuzzleClient;
use GuzzleHttp\Exception\RequestException as GuzzleRequestException;
use nfourtythree\motivationalkanye\MotivationalKanye;

use Craft;
use craft\base\Component;

/**
 * @author    Nathaniel Hammond (nfourtythree)
 * @package   MotivationalKanye
 * @since     1.0.0
 */
class MotivationalKanyeService extends Component
{

    private $url = 'https://api.kanye.rest';
    // Public Methods
    // =========================================================================

    /*
     * @return mixed
     */
    public function getQuote()
    {
        try {
            //make Guzzle request to Nasa api
            $guzzleClient = new GuzzleClient;
            $response = $guzzleClient->get($this->url);
            $responseBody = $response->getBody();
            $result = json_decode($responseBody);
        } catch (GuzzleRequestException $e){
            $result = json_decode($e->getResponse()->getBody());
        }

        return $result;
    }
}
