<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//加密ss链接
use app\index\model\UserModel;
use think\captcha\Captcha;
use think\Config;
use think\Request;

function makeSsLink($encryptionMethod, $password, $domain, $port)
{

    return base64_encode($encryptionMethod . ':' . $password . '@' . $domain . ':' . $port);

}


/**
 * 分元转换
 * @param $money
 * @param bool $flag false ： 元=>分
 * @return string
 */
function changeMoney($money, $flag = false)
{
    if ($flag) {
        return sprintf("%.2f", $money / 100);
    } else {
        return $money * 100;
    }
}

/**
 * 只获取年月日
 * @param $timeString
 * @return mixed
 */
function getShortTime($timeString)
{
    return explode(" ", $timeString)[0];
}

/**
 * 获取FlyCode中的UserId
 * @param $flyCode
 * @return null
 */
function getFlyCodeUser($flyCode)
{
    if ($flyCode == null || !is_string($flyCode))
        return null;
    //判断是否符合规范的flyCode
    $flyCodeArr = explode(Config::get("config.FLY_CODE_PREFIX"), $flyCode);
    if (count($flyCodeArr) != 2 || !is_numeric($flyCodeArr[1]))
        return null;
    //查询用户是否存在
    $userModel = new UserModel();
    $userInfo = $userModel->findUserById($flyCodeArr[1]);
    return $userInfo;
}

/**
 * 隐藏用户名
 * @param $username
 * @return string
 */
function hiddenUserNmae($username)
{
    $string = mb_substr($username, 0, 1);
    return $string . "***";
}

/**
 * 构造JSON数组
 * @param $code
 * @param $message
 * @param $data
 * @return array
 */
function makeJsonArr($code, $message, $data = null)
{
    return $jsonArr = [
        'code' => $code,
        'message' => $message,
        'data' => $data
    ];
}

/**
 *
 * @param int $len
 * @return string
 */
function makeSsPassword($len = 6)
{
// 密码字符集，可任意添加你需要的字符
    $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < $len; $i++) {
        // 这里提供两种字符获取方式
        // 第一种是使用 substr 截取$chars中的任意一位字符；
        // 第二种是取字符数组 $chars 的任意元素
        // $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        $password .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $password;
}

/**
 * 把ip去掉点,带上前缀
 * @param $ip
 * @return mixed
 */
function makeSsIp2TableName($ip)
{
    return 'fly_' . str_replace(".", "", $ip);
}

/**
 * 生成订单号
 * @return string
 */
function makeOrderNo()
{
//    $order_date = date('Y-m-d');
    //订单号码主体（YYYYMMDDHHIISSNNNNNNNN）
    $order_id_main = date('YmdHis') . rand(10000000, 99999999);
    //订单号码主体长度
    $order_id_len = strlen($order_id_main);
    $order_id_sum = 0;
    for ($i = 0; $i < $order_id_len; $i++) {
        $order_id_sum += (int)(substr($order_id_main, $i, 1));
    }
    //唯一订单号码（YYYYMMDDHHIISSNNNNNNNNCC）
    return $order_id = $order_id_main . str_pad((100 - $order_id_sum % 100) % 100, 2, '0', STR_PAD_LEFT);
}

/**
 * 获取当天开始时间
 * @return false|string
 */
function getTodayStartDate(){
    return date('Y-m-d H:i:s',strtotime(date('Y-m-d',time())));
}

/**
 * 获取当月开始时间
 * @return false|string
 */
function getNowMonthStartDate(){
    return date('Y-m-d H:i:s',strtotime(date("Y-m",time())));
}

