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

try {
    //传入Rsa prikey 私钥
        //查询商户资产
        $data = array (
           'app_id'        => '123',
           'merc_order_id' => "200611184930170114",
        );
        $OtcService = (new OtcService("",prikey));
        $result = $OtcService->getOrderMsg($data);
    if(!$result || $result['code'] != 0){
        $this->fail($result['code'], $result['message']);
    }
} catch (BCloudException $e) {
    //异常处理
    $this->fail(ResponseService::ERROR_MISSING_PARAM, $e->getMessage());
}
//返回数据
$address_info  = [
    'code'    => 0,
    'message' => '成功',
    'data'    => [
        "address"=> "0x9787Bb1dfa0C9b74a0ECe2b116c2a61Efc46069b",
        "address_tag"=> ""
    ]
  ];
```

### 链接
* 




