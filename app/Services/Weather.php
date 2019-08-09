<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/8/8
 * Time: 19:44
 */

namespace App\Services;

//天气
class Weather
{
    /**
     * //获取天气
     * @param      $cityName   //城市名称
     * @param bool $isTomorrow //是否显示明天
     */
    public function getSojsonWeather($cityName, $isTomorrow = false)
    {
        /**
         * 获取天气信息。网址：https://www.sojson.com/blog/305.html .
         * :param city_name: str,城市名
         * :return: str ,例如：2019-06-12 星期三 晴 南风 3-4级 高温 22.0℃ 低温 18.0℃ 愿你拥有比阳光明媚的心情
         **/
        if($isTomorrow) {

        } else {

        }
    }


    public function getSojsonWeatherTomorrow($cityName)
    {
        /**
         * 获取明日天气信息。网址：https://www.sojson.com/blog/305.html .
         * :param city_name: str,城市名
         * :return: str ,例如：2019-06-12 星期三 晴 南风 3-4级 高温 22.0℃ 低温 18.0℃ 愿你拥有比阳光明媚的心情
         */
        if (!$cityName) {
            return null;
        }


    }
}