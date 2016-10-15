<?php
/**
 * Created by IntelliJ IDEA.
 * User: root
 * Date: 16-10-15
 * Time: 下午2:12
 */

return [

    "gatewayUrl" => "https://zmopenapi.zmxy.com.cn/openapi.do",
    //芝麻分配给商户的 appId
    "appId" => "1000997",
    //数据编码格式
    "charset" => "UTF-8",
    //商户私钥文件
    "privateKeyFile" => storage_path("zhima/rsa_private_key.pem"),
    //芝麻公钥文件
    "zmPublicKeyFile" => storage_path("zhima/zhima_public_key.pem"),
];