<?php
/**
 * Created by PhpStorm.
 * User: JeffreyBool
 * Date: 2019/8/8
 * Time: 19:57
 */

namespace App\Message;

use Overtrue\EasySms\Contracts\GatewayInterface;

class MorningReminderMessage
{
    public function __construct()
    {
    }

    // 定义直接使用内容发送平台的内容
    public function getContent(GatewayInterface $gateway = null)
    {
        return sprintf('您的订单:%s, 已经完成付款', 1234);
    }

    // 定义使用模板发送方式平台所需要的模板 ID
    public function getTemplate(GatewayInterface $gateway = null)
    {
        return 'SMS_166370025';
    }

    // 模板参数
    public function getData(GatewayInterface $gateway = null)
    {
        return [
            'name' => "小可爱",
            'data' => "这是我自定义的内容呀",
        ];
    }
}