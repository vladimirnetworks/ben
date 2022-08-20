<?php


use App\Models\domain;

function urlize($i)
{

    $allow[] = 'a-z';
    $allow[] = 'A-Z';
    $allow[] = 'آابپتثجچ‌حخدذرز‌ژس‌شصضطظعغفقکگلمنوهی';

    $i = arabic_to_farsi($i);
    $i = preg_replace("![^" . implode("", $allow) . "]+!", "-", $i);
    $i = preg_replace("!\-$|^\-!", "", $i);
    $i = urlencode($i);

    return $i;
}



function fixencode($inp)
{
    return  preg_replace_callback("![^[:ascii:]]!", function ($i) {
        return urlencode($i[0]);
    }, $inp);
}


function gett($u, $headers = null, $ua = null)
{
    $u = fixencode($u);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $u);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 7);
    //$userAgent =  UserAgent::random(['os_type' => "Windows", 'device_type' => "Desktop"]);
    $userAgent = "firefosk";
    curl_setopt($ch, CURLOPT_USERAGENT, $userAgent);
    return curl_exec($ch);
}

function hname()
{

    //return strtolower(preg_replace("!^(www\.)!i", "", $_SERVER['HTTP_HOST']));

    preg_match('!^(.*?)(?=$|\:)!', request()->getHttpHost(), $m);
    #preg_match('!^(.*?)(?=$|\:)!',"x",$m);

    return $m[1];
}

$domainx = "sdf";
function domainx() {
    
    return \Config::get('domain.zza')[0];
}

function domain_id()
{
    if (defined("DOMAIN_ID")) {
        
 
        return DOMAIN_ID;

    } else {
      
        define("DOMAIN_ID", getDomainIdByName(hname()));
        return DOMAIN_ID;
    }
}





function getDomainIdByName($name)
{

    $domain = domain::whereDomain($name)->first();
    if (isset($domain) && isset($domain->id)) {
        return $domain->id;
    } else {
        return -1;
    }
}



function domain_param()
{
    $domain = domain::whereDomain(hname())->first();

    return $domain;
}


function fiximgurl($imgurl, $base)
{
    $imgurl_parsed = parse_url($imgurl);
    $base_parsed = parse_url($base);

    $scheme = null;
    if (isset($imgurl_parsed['scheme'])) {
        $scheme = strtolower($imgurl_parsed['scheme']);
    }


    if ($scheme == 'https' || $scheme == 'http') {
        $finalimgurl = $imgurl;
    } else {

        $imgurl = trim($imgurl);

        if (preg_match('!^\/!', $imgurl)) {
            $finalimgurl = $base_parsed['scheme'] . "://" . $base_parsed['host'] . '/' . ltrim(trim($imgurl), "/");
        } else {
            $finalimgurl = $base_parsed['scheme'] . "://" . $base_parsed['host'] . '/' . ltrim(preg_replace('!(?<=\/)[^\/]+$!', "", $base_parsed['path']), "/") . $imgurl;
        }
    }
    return $finalimgurl;
}


function oneSpace($input)
{
    return trim(preg_replace('!\s+!', ' ', $input));
}


function onlyFarsi($input)
{
    return oneSpace(preg_replace('/[^آابپتثجچ‌حخدذرز‌ژس‌شصضطظعغفقکگلمنوهی]/', ' ', arabic_to_farsi($input)));
}

function spaceToDash($input)
{
    return str_replace(" ", "-", oneSpace($input));
}


function arabic_to_farsi($inp)
{

    $f[] = 'ي';
    $r[] = 'ی';

    $f[] = 'ك';
    $r[] = 'ک';


    return str_replace($f, $r, $inp);
}

function persiannumber($i)
{

    $f = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
    $r = ["۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "۰"];
    return str_replace($f, $r, $i);
}

function bendate($i) {
 $x = explode(" ",$i);
 return  farsidate($x[0]);
}

function englishnumber($i)
{


    $f = ["۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹", "۰"];
    $r = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];
    return str_replace($f, $r, $i);
}

function just_text($inp)
{
    $x = trim(html_entity_decode(strip_tags($inp)));
    $x = trim(str_replace(urldecode("%C2%A0"), "", $x));
    if ($x != '') {
        return  $x;
    } else {
        return null;
    }
}

function just_number($inp)
{
    return trim(preg_replace('/[^\d]/', '', $inp));
}


function fuck($text)
{
    $regex = <<<'END'
/
  (
    (?: [\x00-\x7F]                 # single-byte sequences   0xxxxxxx
    |   [\xC0-\xDF][\x80-\xBF]      # double-byte sequences   110xxxxx 10xxxxxx
    |   [\xE0-\xEF][\x80-\xBF]{2}   # triple-byte sequences   1110xxxx 10xxxxxx * 2
    |   [\xF0-\xF7][\x80-\xBF]{3}   # quadruple-byte sequence 11110xxx 10xxxxxx * 3 
    ){1,100}                        # ...one or more times
  )
| .                                 # anything else
/x
END;
    return  preg_replace($regex, '$1', $text);
}


function dupli($fname)
{

    return  preg_replace_callback('!(?:-([0-9]+)(\.jpg|\.png|\.gif)$|(?=\.(?:jpg|png|gif)$))!', function ($m) {

        if (isset($m[1]) && isset($m[2])) {
            return '-' . ($m[1] + 1) . $m[2];
        } else {
            return "-2";
        }
    }, $fname);
}



function gregorian_to_jalali($gy,$gm,$gd,$mod=''){
    $g_d_m=array(0,31,59,90,120,151,181,212,243,273,304,334);
    if($gy>1600){
     $jy=979;
     $gy-=1600;
    }else{
     $jy=0;
     $gy-=621;
    }
    $gy2=($gm>2)?($gy+1):$gy;
    $days=(365*$gy) +((int)(($gy2+3)/4)) -((int)(($gy2+99)/100)) +((int)(($gy2+399)/400)) -80 +$gd +$g_d_m[$gm-1];
    $jy+=33*((int)($days/12053)); 
    $days%=12053;
    $jy+=4*((int)($days/1461));
    $days%=1461;
    if($days > 365){
     $jy+=(int)(($days-1)/365);
     $days=($days-1)%365;
    }
    $jm=($days < 186)?1+(int)($days/31):7+(int)(($days-186)/30);
    $jd=1+(($days < 186)?($days%31):(($days-186)%30));
    return($mod=='')?array($jy,$jm,$jd):$jy.$mod.$jm.$mod.$jd;
   }
   
   function farsidate($dd) {
       $parsd =date_parse($dd);
       
       return persiannumber(gregorian_to_jalali($parsd['year'],$parsd['month'],$parsd['day'],"/"));
       
   }

   function dayofweek() {
       $x[1] = 'دوشنبه';
       $x[2] = 'سه‌شنبه';
       $x[3] = 'چهارشنبه';
       $x[4] = 'پنج‌شنبه';
       $x[5] = 'جمعه';
       $x[6] = 'شنبه';
       $x[7] = 'یک‌شنبه';
     return $x[date('w')];
   }

   function onlineusers() {
    $xvis = json_decode(file_get_contents("onlinex.json"),true);
    if (isset($xvis[date("y-m-dXh:i")])) {
        return $xvis[date("y-m-dXh:i")];
    } else {
        $vis = rand(30,50);
        file_put_contents("onlinex.json", json_encode([date("y-m-dXh:i")=>rand(30,50)]));
      return $vis;
    }
   }