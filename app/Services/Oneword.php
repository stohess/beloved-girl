<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/8/11
 * Time: 22:57
 */

namespace App\Services;


use GuzzleHttp\Client;

class Oneword
{
    /**
     * 获取彩虹屁
     * @return string
     */

    public function getLimit($limit)
    {
        while(true) {
            $data = $this->getCaihongpi();
            if(mb_strlen($data, "UTF8") <= $limit) {
                return $data;
            }
        }
    }

    public function getCaihongpi()
    {
        $api = "https://chp.shadiao.app/api.php";
        $response = app(Client::class)->get($api);
        if($response->getStatusCode() == 200) {
            return $response->getBody()->getContents();
        }
    }
}