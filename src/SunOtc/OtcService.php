<?php
/**
 * OtcService.php
 *
 * Author    : zhangwenli
 * CreateDate: 2020-06-17 16:39
 * UpdateDate:
 */
namespace SunOtc;

class OtcService
{

    private $pubKey = null;

    private $priKey = null;

    const HOST = "otc-open-api.testapi.pw";

    /**
     * OtcService constructor.
     * @param string $pubKey
     * @param string $priKey
     */
    function __construct($pubKey="", $priKey="")
    {
        $this->pubKey = $pubKey;
        $this->priKey = $priKey;
    }


    /**
     * Author: zhangwenli
     * date: 2020-06-17 20:06
     * Features：
     * @param $url
     * @param $order
     * @return bool|string
     * @throws \Exception
     */
    public function subOrderMsg($param)
    {
        $result = $this->getResut("/api/v1/order",  $param);
        return $result;
    }

    /**
     * Author: zhangwenli
     * date: 2020-06-19 14:38
     * Features：get order msg
     * @param $param
     * @return bool|string
     */
    public function getOrderMsg($param)
    {
        $result = $this->getResut("/api/v1/order/message",  $param);
        return $result;
    }

    /**
     * Author: zhangwenli
     * date: 2020-06-19 14:38
     * Features：get trade limit
     * @param $param
     * @return bool|string
     */
    public function getTradeLimit($param)
    {
        $result = $this->getResut("/api/v1/trade/limit",  $param);
        return $result;
    }

    /**
     * Author: zhangwenli
     * date: 2020-06-19 14:39
     * Features：get trade price
     * @param $param
     * @return bool|string
     */
    public function getTradePrice($param)
    {
        $result = $this->getResut("/api/v1/trade/price",  $param);
        return $result;
    }

    /**
     * Author: zhangwenli
     * date: 2020-06-19 14:39
     * Features：get merc asset
     * @param $param
     * @return bool|string
     */
    public function getMercAsset($param)
    {
        $result = $this->getResut("/api/v1/merc/assets",  $param);
        return $result;
    }


    /**
     * Author: zhangwenli
     * date: 2020-06-17 21:02
     * Features：curl request
     * @param $url
     * @param $param
     * @return bool|string
     */
    public function getResut($url, $param)
    {
        $param = json_decode($param, true);
        $param["timestamp"] = time();
        $param = json_encode($param, JSON_UNESCAPED_UNICODE);
        $signer = $this->getSign($param);
        $header = array(
            "Content-Type: application/json; charset=utf-8",
            'Content-Length: ' . strlen($param),
            "sign:$signer"
        );
        $result =  SendRequest::curl(self::HOST.$url, "POST", $param, $header);
        return $result;
    }


    /**
     * Author: zhangwenli
     * date: 2020-06-21 01:25
     * Features：get sign
     * @param $param
     * @return bool|string
     */
    public function getSign($param)
    {
        $rsaObject = (new Rsa("", $this->priKey));
        return $rsaObject->sign(md5($param));

    }

}