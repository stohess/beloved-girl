<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/8/8
 * Time: 19:53
 */

namespace App\Services;

use AlibabaCloud\Client\AlibabaCloud;
use AlibabaCloud\Client\Exception\ClientException;
use AlibabaCloud\Client\Exception\ServerException;

class Sms
{
    public $startDay = "2019-07-28";

    /**
     * @param $mobile
     * @param $template
     * @throws ClientException
     * @throws ServerException
     */
    public function SendMessage($mobile, $template)
    {
        $region_id = env("region_id");
        $sign_name = env("sign_name");
        $access_Id = env("access_Id");
        $access_secret = env("access_secret");
        AlibabaCloud::accessKeyClient($access_Id, $access_secret)->regionId($region_id)->asDefaultClient();
        $data = [
            "name" => "小可爱",
            "hour" => date("Y-m-d"),
            "str"  => app(Weather::class)->getRAttodayweather("海珠"),
            "day"  => $this->diffBetweenTwoDays($this->startDay, date("Y-m-d")),
            'msg'  => app(Oneword::class)->getLimit(20),
        ];
        $data = json_encode($data);
        try {
            $result = AlibabaCloud::rpc()->product('Dysmsapi')->version('2017-05-25')->action('SendSms')->method('POST')->host('dysmsapi.aliyuncs.com')->options([
                'query' => [
                    'RegionId'      => "default",
                    'PhoneNumbers'  => $mobile,
                    'SignName'      => $sign_name,
                    'TemplateCode'  => $template,
                    'TemplateParam' => $data,
                ]
            ])->request();
            dd($result->toArray());
        } catch (ClientException $e) {
            $result = AlibabaCloud::rpc()->product('Dysmsapi')->version('2017-05-25')->action('SendSms')->method('POST')->host('dysmsapi.aliyuncs.com')->options([
                'query' => [
                    'RegionId'      => "default",
                    'PhoneNumbers'  => $mobile,
                    'SignName'      => $sign_name,
                    'TemplateCode'  => $template,
                    'TemplateParam' => $data,
                ]
            ])->request();
            dd($result->toArray());
        } catch (ServerException $e) {
            $result = AlibabaCloud::rpc()->product('Dysmsapi')->version('2017-05-25')->action('SendSms')->method('POST')->host('dysmsapi.aliyuncs.com')->options([
                'query' => [
                    'RegionId'      => "default",
                    'PhoneNumbers'  => $mobile,
                    'SignName'      => $sign_name,
                    'TemplateCode'  => $template,
                    'TemplateParam' => $data,
                ]
            ])->request();
            dd($result->toArray());
        }
    }

    function diffBetweenTwoDays($day1, $day2)
    {
        $second1 = strtotime($day1);
        $second2 = strtotime($day2);

        if($second1 < $second2) {
            $tmp = $second2;
            $second2 = $second1;
            $second1 = $tmp;
        }
        return ($second1 - $second2) / 86400;
    }
}