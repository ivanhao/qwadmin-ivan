<?php
/**
*
* 这是取得天气数据的类
**/

namespace Qwadmin\Controller;

class WeatherController extends ComController{
    
    function index(){
        $header=array(
            'Content-Type:application/xml',
            // 'User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; zh-CN; rv:1.9) Gecko/2008052906 Firefox/3.0',
            'Accept-Language:zh-CN,en-US',
            );
        // 到指定页面获取数据
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://php.weather.sina.com.cn/xml.php?city=%B1%B1%BE%A9&password=DJOYnieT8234jlsK&day=0");
        // curl_setopt($ch, CURLOPT_REFERER, "http://www.95598.cn/");
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);        
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        // curl_setopt($ch, CURLOPT_COOKIEFILE, COOKIE);
        // curl_setopt($ch, CURLOPT_COOKIE, COOKIE);
        curl_setopt($ch, CURLOPT_TIMEOUT, 4);
        $html=curl_exec($ch);
        curl_close($ch);
        echo $this->xmlToJson($html);
    }
    
    function xmlToJson($xml){ 
 
         //禁止引用外部xml实体 
         
        libxml_disable_entity_loader(true); 
         
        $xmlstring = simplexml_load_string($xml, 'SimpleXMLElement', LIBXML_NOCDATA); 
         
        // $val = json_decode(json_encode($xmlstring),true); 
        $val = json_encode($xmlstring,true);
        return $val; 
         
    } 
}