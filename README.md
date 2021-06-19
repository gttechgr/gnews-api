## Laravel GNews API
A PHP client for the [GNews API](https://gnews.io/docs/v4#introduction).

### Installation
You can install GNews API by using [Composer](https://getcomposer.org/)

You can use the following composer command to install it into an existing laravel project.
```
composer require gt-tech/gnews-api
```
Laravel will already register the service provider to your application because GNews API does make use of the extra laravel tag on the `composer.json` schema

### Publish the configuration file
You can publish the configuration file of GNews API by running the following command:
```
php artisan vendor:publish --provider="ErgonautTM\GNewsApi\GNewsApiServiceProvider" --tag="config"
```
### Usage
After installation and publish configuration file in your project,

Get Your API key from [here](https://gnews.io/dashboard)

```php
use ErgonautTM\GNewsApi\GNewsApi;
.
.
.
$newsapi = new GNewsApi();
```
### Get TopHeadLines
```php
$newsapi->getTopHeadLines($q, $topic, $from, $to, $max, $country, $lang);
```

Parameter | Default | Description
--- | --- | ---
$q | None | Keep articles that matched keywords.
$topic | breaking-news | Set the articles topic. Topics available are **breaking-news**, **world**, **nation**, **business**, **technology**, **entertainment**, **sports**, **science** and **health**.
$from | None | Keep articles with a publication date greater than or equal to the given date. ISO 8601 format (e.g. 2021-06-19T07:32:32Z)
$to | None | Keep articles with a publication date less than or equal to the given date. ISO 8601 format (e.g. 2021-06-19T07:32:32Z)
$max | 10 | Set the maximum number of articles returned per query. **100** is the maximum value. The maximum value allowed depend on your plan (FREE has 10, PLUS has 30 and PRO has 100).
$country | gr | Set the country of returned articles. See countries list in config file.
$lang | el | Set the language of returned articles. See languages list in config file.

### Get Search
```php
$newsapi->getSearch($q, $from, $to, $sort_by, $max, $country, $lang);
```

Parameter | Default | Description
--- | --- | ---
$q | None | Keep articles that matched keywords.
$from | None | Keep articles with a publication date greater than or equal to the given date. ISO 8601 format (e.g. 2021-06-19T07:32:32Z)
$to | None | Keep articles with a publication date less than or equal to the given date. ISO 8601 format (e.g. 2021-06-19T07:32:32Z)
$sort_by | publishedAt | Set the order in which the items are sorted. (**publishedAt**: sort articles first according to the most recent date of publication, **relevance**: sort articles that most closely match the query)
$max | 10 | Set the maximum number of articles returned per query. **100** is the maximum value. The maximum value allowed depend on your plan (FREE has 10, PLUS has 30 and PRO has 100).
$country | gr | Set the country of returned articles. See countries list in config file.
$lang | el | Set the language of returned articles. See languages list in config file.

### Get Countries
Returns an array of allowed countries

```php
$newsapi->getCountries();
```

### Get Languages
Returns an array of allowed languages

```php
$newsapi->getLanguages();
```
### Get Topics
Returns an array of allowed topics

```php
$newsapi->getTopics();
```

### Get SortBy
Returns an array of allowed sorts

```php
$newsapi->getSortBy();
```
### CONTRIBUTORS

This package is authored by [George Tsachrelias](https://g-tsachrelias.com).

### TODO
- [ ] PHP Unit Test
