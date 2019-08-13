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

    public $phone = "17665161196";

    public function SendMessage()
    {
        dd((new Sms())->SendMessage($this->phone, "SMS_172208160"));
    }

}