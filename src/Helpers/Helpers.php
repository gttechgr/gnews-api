<?php

namespace ErgonautTM\GNewsApi\Helpers;

final class Helpers
{
    /**
     * @param null $params
     * @return string
     */
    final static public function topHeadlinesUrl($params = null): string
    {
        if (!is_null($params)) {
            return config('gnews.endpoint')."/top-headlines?{$params}";
        }
        return config('gnews.endpoint').'/top-headlines';
    }

    /**
     * @param null $params
     * @return string
     */
    final static public function searchUrl($params = null): string
    {
        if (!is_null($params)) {
            return config('gnewsapi.endpoint')."/search?{$params}";
        }
        return config('gnewsapi.endpoint').'/search';
    }

    /**
     * @param $country
     * @return bool
     */
    final static public function isCountryValid($country): bool
    {
        if (in_array($country, config('gnewsapi.countries'))) {
            return true;
        }
        return false;
    }

    /**
     * @param $language
     * @return bool
     */
    final static public function isLanguageValid($language): bool
    {
        if (in_array($language, config('gnewsapi.languages'))) {
            return true;
        }
        return false;
    }

    /**
     * @param $topic
     * @return bool
     */
    final static public function isTopicValid($topic): bool
    {
        if (in_array($topic, config('gnewsapi.topics'))) {
            return true;
        }
        return false;
    }

    /**
     * @param $sort_by
     * @return bool
     */
    final static public function isSortByValid($sort_by): bool
    {
        if (in_array($sort_by, config('gnewsapi.sort'))) {
            return true;
        }
        return false;
    }

    final static public function isApiKeyValid($api_key): bool
    {
        if (!empty(config('gnewsapi.api_key'))) {
            return true;
        }
        return false;
    }
}
