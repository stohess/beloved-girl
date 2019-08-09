<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/8/8
 * Time: 20:16
 */

namespace App\Http\Controllers\Api;




use App\Services\Sms;

class SmsController
{
    public function SendMessage()
    {
        (new Sms())->SendMessage(17665161196,"记得带饭哟","SMS_172221433");
    }
}