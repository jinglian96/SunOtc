# SunOtc OTC SDK
>基于PHP的OTC商户api接口SDK

-------
### 安装方法

```
$ composer require sunotc/sdk-php 
```

### 使用方法

```
use SunOtc\OtcService

    $data       = '{"app_id":"123","merc_order_id":"200611184930170114"}';
    $OtcService = (new OtcService(Dictionary::PUBLIC_KEY, Dictionary::PRI_KEY));
    $OtcService->getOrderMsg($data);
    //                //查询交易限制
    $data       = '{"app_id":"123"}';
    $OtcService = (new OtcService(Dictionary::PUBLIC_KEY, Dictionary::PRI_KEY));
    $OtcService->getTradeLimit($data);*/
    
    //查询商户资产
     $data = '{"app_id":"123","merc_order_id":"200611184930170114"}';
     $OtcService = (new OtcService(Dictionary::PUBLIC_KEY,Dictionary::PRI_KEY));
     $OtcService->getMercAsset($data);
    
    //        //查询价格
    $data       = '{"app_id":"123","coin":"USDT"}';
    $OtcService = (new OtcService(Dictionary::PUBLIC_KEY, Dictionary::PRI_KEY));
    $OtcService->getTradePrice($data);
        
        
//返回数据,例如
{
      "code":0,
      "message":"success",
      "data":[
          {
              "pay_type":"BANK",
              "amount_min":1000,
              "amount_max":5000
          },
          {
              "pay_type":"WECHAT",
              "amount_min":1000,
              "amount_max":5000
          },
          {
              "pay_type":"ALIPAY  ",
              "amount_min":1000,
              "amount_max":5000
          }
      ],
      "time":1592729822
}；
```

### 链接
* 




