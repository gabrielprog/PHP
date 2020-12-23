<?php
error_reporting(0);
function getStr($string, $start, $end) {
    $str = explode($start, $string);
    $str = explode($end, $str[1]);
    return $str[0];
}

$list = $_GET['list'];
$split = explode("|", $list);
$login = $split[0];
$password = $split[1];



$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://www.netshoes.com.br/login');
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/html; charset=UTF-8'));
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, 1);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . 'login.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . 'login.txt');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_REFERER, "https://www.netshoes.com.br/login");
$access1 = curl_exec($ch) or die(curl_error($ch));

$clipping = getStr($access1,'name="clipping" id="clipping" type="hidden" value="','"');


curl_setopt($ch, CURLOPT_URL, 'https://www.netshoes.com.br/login');
curl_setopt($ch, CURLOPT_POSTFIELDS,'username='.$login.'&password='.$password.'&recaptchaResponse=&clipping='.$clipping);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/x-www-form-urlencoded'));
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_COOKIESESSION, true);
curl_setopt($ch, CURLOPT_COOKIEJAR, getcwd() . 'login.txt');
curl_setopt($ch, CURLOPT_COOKIEFILE, getcwd() . 'login.txt');
curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER["HTTP_USER_AGENT"]);
curl_setopt($ch, CURLOPT_REFERER, "https://www.netshoes.com.br/login");
$access2 = curl_exec($ch) or die(curl_error($ch));
