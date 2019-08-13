<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/8/8
 * Time: 19:44
 */

namespace App\Services;

//天气
use GuzzleHttp\Client;

class Weather
{
    /**
     * @param $cityName
     * @return string
     */
    public function getRAttodayweather($cityName)
    {
        /**
         * 获取特定城市今日天气
         * https://github.com/MZCretin/RollToolsApi#获取特定城市今日天气
         * :param cityname:str 传入你需要查询的城市，请尽量传入完整值，否则系统会自行匹配，可能会有误差
         * :return:str 天气(2019-06-12 星期三 晴 南风 3-4级 高温 22.0℃ 低温 18.0℃ 愿你拥有比阳光明媚的心情)
         */
        $api = 'https://www.mxnzp.com/api/weather/current/';
        $response = app(Client::class)->get($api . $cityName);
        $weekarray = ["日", "一", "二", "三", "四", "五", "六"];
        if($response->getStatusCode() == 200) {
            $resp = json_decode($response->getBody());
            if($resp != null && $resp->code == 1) {
                $data = $resp->data;
                return "[{$cityName}星期{$weekarray[date('w')]}天气] {$data->weather},[气温]{$data->temp}";
            }
        }
    }
}

