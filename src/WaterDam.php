<?php

namespace afiqiqmal\WaterDisruption;

use afiqiqmal\library\ApiRequest;
use afiqiqmal\Library\Constant;
use Symfony\Component\DomCrawler\Crawler;

class WaterDam
{
    public function fetch()
    {
        $result = $this->apiCall(Constant::JBA_URL)->getRaw()->fetch();
        if (!$result['error']) {
            return $this->scrap($result['body']);
        }

        return die_response('Unable to Fetch Data');
    }

    private function apiCall($url): ApiRequest
    {
        return water_request()->baseUrl($url);
    }

    private function scrap($body)
    {
        $crawler = new Crawler($body);
        $crawlerResult = $crawler->filter('#mainbody table tr:not(:first-child)')->each(function (Crawler $node, $i) {
            $result = $node->filter('td:not(:first-child)')->each(function (Crawler $node, $i) {
                return trim_spaces($node->text());
            });
            $data = [];
            foreach ($result as $key => $item) {
                if ($key == 0) {
                    $data['name'] = ucwords(strtolower($item));
                    $data['name'] = str_replace('Bunded Storage', 'Kolam Takungan', $data['name']);
                }
                if ($key == 1) $data['built_date'] = $item;
                if ($key == 2) $data['owner'] = $item;
                if ($key == 3) $data['operator'] = $item;
                if ($key == 4) $data['status'] = $item;
            }
            return $data;
        });

        $result = $this->apiCall(Constant::IWRIMS_URL)->getRaw()->fetch();
        if (!$result['error']) {
            $data = $this->scrapData($result['body']);
            foreach ($crawlerResult as $key => $station) {
                foreach ($data as $station_data) {
                    $sim = similar_text($station['name'], $station_data['station'], $per);
                    if ($per > 50) {
                        $crawlerResult[$key]['data'] = $station_data;
                        break;
                    }
                }
            }

            return water_response($crawlerResult, 'Lembaga Urus Air Selangor');
        }

        return die_response('Unable to Fetch Data');
    }

    private function scrapData($body)
    {
        $crawler = new Crawler($body);
        $crawlerResult =  $crawler->filter('table tr td table tr td table tr:nth-child(n+3)')->each(function (Crawler $node, $i) {
            $result = $node->filter('td')->each(function (Crawler $node, $i) {
                return trim_spaces($node->text());
            });

            $data = [];
            foreach ($result as $key => $item) {
                if ($key == 0) $data['update_date'] = $item;
                if ($key == 1) $data['station'] = ucwords(strtolower($item));
                if ($key == 2)  {
                    $data['water_level_amount'] = $item;
                    $data['water_level_metric'] = 'm MSL';
                }
                if ($key == 3) {
                    $data['reservoir'] = $item;
                    $data['reservoir_metric'] = 'Mm³';
                }
                if ($key == 4) {
                    $data['reservoir_percentage'] = $item;
                }
                if ($key == 5) {
                    $data['rain'] = $item;
                    $data['rain_metric'] = 'mm';
                }
            }
            return $data;
        });

        return $crawlerResult;
    }
}
