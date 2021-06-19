<?php

namespace ErgonautTM\GNewsApi;

use ErgonautTM\GNewsApi\Exceptions\GNewsApiException;
use ErgonautTM\GNewsApi\Helpers\Helpers;
use GuzzleHttp\Client;
use PHPUnit\Runner\Exception;

class GNewsApi
{
    private $auth;

    private $payload = [];

    /**
     * GNewsApi constructor.
     */
    public function __construct()
    {

        if (Helpers::isApiKeyValid(config('gnewsapi.api_key'))) {
            $this->auth = new GNewsApiAuth(config('gnewsapi.api_key'));
            $this->payload = $this->auth->ApiKey();
        } else {
            throw new GNewsApiException("Invalid API Key Provided");
        }

        $this->client = new Client(['timeout' => 30]);
    }

    /**
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @throws GNewsApiException
     */
    public function getTopHeadLines($q = null, $topic = null, $from = null, $to = null, $max = 10, $country = 'gr', $lang = 'el')
    {
        if (!is_null($q)) {
            $this->payload['q'] = $q;
        }

        if (!is_null($topic)) {
            if (Helpers::isTopicValid($topic)) {
                $this->payload['topic'] = $topic;
            } else {
                throw new GNewsApiException("Invalid Topics Identifier Provided");
            }
        }

        if (!is_null($from)) {
            if (strlen($from) < 10) {
                throw new GNewsApiException('from argument must be YYYY-MM-DD format');
            } else {
                $this->payload['from'] = $from;
            }
        }

        if (!is_null($to)) {
            if (strlen($to) < 10) {
                throw new GNewsApiException('to argument must be YYYY-MM-DD format');
            } else {
                $this->payload['to'] = $to;
            }
        }

        if ($max >= 1 && $max <= 10) {
            $this->payload['max'] = $max;
        } else {
            throw new GNewsApiException("Invalid Max Value Provided");
        }

        if (!is_null($country)) {
            if (Helpers::isCountryValid($country)) {
                $this->payload['country'] = $country;
            } else {
                throw new GNewsApiException("Invalid Country Identifier Provided");
            }
        }

        if (!is_null($lang)) {
            if (Helpers::isLanguageValid($lang)) {
                $this->payload['lang'] = $lang;
            } else {
                throw new GNewsApiException("Invalid Language Identifier Provided ");
            }
        }

        $url = Helpers::topHeadlinesUrl();

        try {

            $response = $this->client->request('GET', $url, ['query' => $this->payload]);

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->__toString());
            } else {
                $response_body = json_encode($response->getBody());
                throw new GNewsApiException($response_body->message);
            }
        } catch (Exception $e) {
            throw new GNewsApiException($e->getMessage());
        }
    }

    public function getSearch($q = null, $from = null, $to = null, $sort_by = null, $max = 10, $country = 'gr', $lang = 'el')
    {
        if (!is_null($q)) {
            $this->payload['q'] = $q;
        } else {
            throw new GNewsApiException('query argument is required');
        }

        if (!is_null($from)) {
            if (strlen($from) < 10) {
                throw new GNewsApiException('from argument must be YYYY-MM-DD format');
            } else {
                $this->payload['from'] = $from;
            }
        }

        if (!is_null($to)) {
            if (strlen($to) < 10) {
                throw new GNewsApiException('to argument must be YYYY-MM-DD format');
            } else {
                $this->payload['to'] = $to;
            }
        }

        if (!is_null($sort_by)) {
            if (Helpers::isSortByValid($sort_by)) {
                $this->payload['sortby'] = $sort_by;
            } else {
                throw new GNewsApiException("Invalid SortBy Identifier Provided ");
            }
        }

        if ($max >= 1 && $max <= 10) {
            $this->payload['max'] = $max;
        } else {
            throw new GNewsApiException("Invalid Max Value Provided");
        }

        if (!is_null($country)) {
            if (Helpers::isCountryValid($country)) {
                $this->payload['country'] = $country;
            } else {
                throw new GNewsApiException("Invalid Country Identifier Provided");
            }
        }

        if (!is_null($lang)) {
            if (Helpers::isLanguageValid($lang)) {
                $this->payload['lang'] = $lang;
            } else {
                throw new GNewsApiException("Invalid Language Identifier Provided ");
            }
        }

        $url = Helpers::searchUrl();

        try {

            $response = $this->client->request('GET', $url, ['query' => $this->payload]);

            if ($response->getStatusCode() == 200) {
                return json_decode($response->getBody()->__toString());
            } else {
                $response_body = json_encode($response->getBody());
                throw new GNewsApiException($response_body->message);
            }
        } catch (Exception $e) {
            throw new GNewsApiException($e->getMessage());
        }
    }

    /**
     * @return array
     */
    public function getCountries(): array
    {
        return config('gnewsapi.countries');
    }

    /**
     * @return array
     */
    public function getLanguages(): array
    {
        return config('gnewsapi.languages');
    }

    /**
     * @return array
     */
    public function getTopics(): array
    {
        return config('gnewsapi.topics');
    }

    /**
     * @return array
     */
    public function getSortBy(): array
    {
        return config('gnewsapi.sort');
    }
}
