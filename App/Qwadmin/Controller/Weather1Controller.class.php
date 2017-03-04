<?php
namespace Qwadmin\Controller;

class Weather1Controller extends ComController{
    public function index(){
        Vendor('phpQuery.phpQuery');
        $filePath = 'http://weather1.sina.cn/?vt=4';
        $fileContent = file_get_contents($filePath);
        $doc = \phpQuery::newDocumentHTML($fileContent);
        \phpQuery::selectDocument($doc);
        // $data = array();
        //     'name' => array(),
        //     'href' => array(),
        //     'img' => array()
        // );
        // foreach (pq('a') as $t) {
        //     $href = $t -> getAttribute('href');
        //     $data['href'][] = $href;
        // }
        // foreach (pq('img') as $img) {
        //     $data['img'][] = $domain . $img -> getAttribute('src');
        // }
        // foreach (pq('.inx_w_cont') as $name) {
        //     $data[] = $name -> nodeValue;
        // }
        // echo "<pre>";
        // var_dump($doc[0]);
        echo pq('.inx_w_cont')->html();
        // echo "</pre>";
        
    }
}