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
    public function SendMessage($mobile, $content, $template)
    {
        $region_id = env("region_id");
        $sign_name = env("sign_name");
        $access_Id = env("access_Id");
        $access_secret = env("access_secret");
        AlibabaCloud::accessKeyClient($access_Id, $access_secret)->regionId($region_id)->asDefaultClient();
        try {
            $data = [
                "name"    => "小可爱",
                'content' => $content,
                "time"    => date('Y-m-d H:i:s'),
            ];
            $data = json_encode($data);
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
            dd($e->getErrorMessage());
        } catch (ServerException $e) {
            dd($e->getErrorMessage());
        }
    }
}