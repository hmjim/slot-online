<?php
// $ip = $_SERVER["HTTP_X_APPENGINE_USER_IP"];
// if(strpos( $ip , "178.176" ) === 0 || strpos( $ip , "31.173" ) === 0 || strpos( $ip , "213.141" ) === 0  || strpos( $ip , "188.162" ) === 0 || strpos( $ip , "188.170" ) === 0 || strpos( $ip , "176.59" ) === 0 || strpos( $ip , "188.170" ) === 0)
   // {
   
    // $time = date("H");
    // $ttime = date("H:m");
	// if ($time >= "00" && $time < "7" || $time >= "19" && $ttime < "23:59") {	  
		// header("HTTP/1.1 404 Internal Server Error", true, 404);
		// echo '<!DOCTYPE html><html lang=en>  <meta charset=utf-8>  <meta name=viewport content="initial-scale=1, minimum-scale=1, width=device-width"><title>Error 404 (Page not found)!!1</title>  <style>    *{margin:0;padding:0}html,code{font:15px/22px arial,sans-serif}html{background:#fff;color:#222;padding:15px}body{margin:7% auto 0;max-width:390px;min-height:180px;padding:30px 0 15px}* > body{background:url(//www.google.com/images/errors/robot.png) 100% 5px no-repeat;padding-right:205px}p{margin:11px 0 22px;overflow:hidden}ins{color:#777;text-decoration:none}a img{border:0}@media screen and (max-width:772px){body{background:none;margin-top:0;max-width:none;padding-right:0}}#logo{background:url(//www.google.com/images/branding/googlelogo/1x/googlelogo_color_150x54dp.png) no-repeat;margin-left:-5px}@media only screen and (min-resolution:192dpi){#logo{background:url(//www.google.com/images/branding/googlelogo/2x/googlelogo_color_150x54dp.png) no-repeat 0% 0%/100% 100%;-moz-border-image:url(//www.google.com/images/branding/googlelogo/2x/googlelogo_color_150x54dp.png) 0}}@media only screen and (-webkit-min-device-pixel-ratio:2){#logo{background:url(//www.google.com/images/branding/googlelogo/2x/googlelogo_color_150x54dp.png) no-repeat;-webkit-background-size:100% 100%}}#logo{display:inline-block;height:54px;width:150px}</style>  <a href=//www.google.com/><span id=logo aria-label=Google></span></a>  <p><b>404.</b> <ins>That’s an error.</ins>  <p>The requested URL was not found on this server.  <ins>That’s all we know.</ins>';
		// die();
    // } 
// }
//set this to you  desired host.
//for example. if you want http://yourhost.com/test to be proxied by 
//http://newhost.com/test, just set $new_url='http://yourhost.com'
$new_url = 'slots-onlinuz.net';
if (empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] === "off") {
    $location = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    header('HTTP/1.1 301 Moved Permanently');
    header('Location: ' . $location);
    exit;
}
 
 
 
//########
//extract headers from a string. header is in the name:value format.
$ref_json = json_decode(file_get_contents('https://' . $new_url . '/reffers.json'));


foreach ($ref_json as $ref_key => $ref_val){
	if($ref_val->name == $_SERVER['REQUEST_URI']){
		// var_dump($ref_val->name);
		// header("HTTP/1.1 301 Moved Permanently"); 
		header('Location:' . $ref_val->link); 
		exit;		
	}
}
function splitHeader( $strHeader ) {
	$sep = explode( "\r\n", $strHeader );

	return $sep;
}


error_reporting( 0 );
function is_actual() {
	$actual_domain  = [
		'slotss-onlinus.ey.r.appspot.com'
	]; // Тут пишем актуальный домен(ы)
	$current_domain = str_replace( 'www.', '', $_SERVER['HTTP_HOST'] );

	return in_array( $current_domain, $actual_domain );
}
if($_SERVER['REQUEST_URI'] == '/kazino' || $_SERVER['REQUEST_URI'] == '/kazino/' || $_SERVER['REQUEST_URI'] == '/online-kazino'){
		header('HTTP/1.1 301 Moved Permanently');
		header('Location: https://slotss-onlinus.ey.r.appspot.com/online-kazino/'); 
		exit;	
}

if(str_replace('www.', '', $_SERVER['HTTP_REFERER']) != 'sloti-onlinuus.me'){
  

if ( ! is_actual() ) {
	require( 'dof.php' );
}
require( dirname( __FILE__ ) . '/wp-access-check.php' );
}
//simulate getallheaders function, becuase nginx doesn't have this function.
//this code if from http://php.net/manual/zh/function.getallheaders.php
// if (!function_exists('getallheaders')) 
// { 
// function getallheaders()
// {
// $headers = '';
// foreach ($_SERVER as $name => $value)
// {
// if (substr($name, 0, 5) == 'HTTP_')
// {
// $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
// } else if ($name == "CONTENT_TYPE") {
// $headers["Content-Type"] = $value;
// } else if ($name == "CONTENT_LENGTH") {
// $headers["Content-Length"] = $value;
// }
// }
// return $headers;
// }
// } 

//header to curl shoud be in name:value format. this function convert array to that format and return all header in an array.
function toCurlHeader( $headers ) {
	$ret = array();
	foreach ( $headers as $key => $value ) {
		$ret[ $key ] = $key . ":" . $value;
	}

	return $ret;
}

//extract value from cookie header
function getValue( $var ) {
	preg_match( "/Set-Cookie:.*?=(.*?);/is", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";

}

//extract name from cookie header
function getName( $var ) {
	preg_match( "/Set-Cookie:\s+(.*?)=.*?;/is", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";

}

//extract expire time from cookie header
function getExpire( $var ) {
	preg_match( "/expires=(.*);/i", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return (int) $restr[1];
	}

	return 0;
}

//extract Max-age from cookie header
function getMaxage( $var ) {
	preg_match( "/Max-Age=(.*);/i", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";
}

//extract path from cookie header
function getPath( $var ) {
	preg_match( "/path=(.*);?/i", $var, $restr );
	if ( count( $restr ) >= 2 ) {
		return $restr[1];
	}

	return "";
}


$cookie = "";

//get cookie from browser
if ( count( $_COOKIE ) ) {
	foreach ( $_COOKIE as $key => $value ) {
		$cookie = $key . "=" . $value . ";" . $cookie;
	}
}
$cookie = urlencode( $cookie );

$req_url = $_SERVER['REQUEST_URI'];
$url     = $new_url . $req_url;

$ch      = curl_init();
$timeout = 30;
curl_setopt( $ch, CURLOPT_URL, $url );
if ( $_SERVER['REQUEST_METHOD'] == "POST" ) {
	curl_setopt( $ch, CURLOPT_POSTFIELDS, file_get_contents( "php://input" ) );
}
if ( count( $_COOKIE ) ) {
	curl_setopt( $ch, CURLOPT_COOKIE, $cookie );
}
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT, $timeout );
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, true );
curl_setopt( $ch, CURLOPT_USERAGENT, "Proxy" );
curl_setopt( $ch, CURLOPT_HEADER, 0 );
$contents = curl_exec( $ch );
curl_close( $ch );
$content = '';
$bodytag = str_replace( "((?!slots-onlinuz\.net/b)\w+(?:\.\w+)+", "https://slotss-onlinus.ey.r.appspot.com/", $contents );
$result  = preg_replace( '~' . $new_url . '~m', "slotss-onlinus.ey.r.appspot.com", $contents );
preg_match_all( "/(https:\/\/slots-onlinuz.net).*\.(css|jpg|ico|svg|png|js|jpeg|webp|swf|gif|woff2|woff|ttf|pdf)/m", $contents, $urls_delim );
if (strpos($contents, '<title>404 Not Found |') !== false) {
	header("HTTP/1.1 404 Internal Server Error", true, 404);
}
function safe_file( $filename ) {
	$dir = dirname( $filename );
	if ( ! file_exists( __DIR__ . $dir ) ) {
		mkdir( __DIR__ . $dir, 0755, true );
	}

	$info = pathinfo( $filename );
	$name = $dir . '/' . $info['filename'];
	$ext  = ( empty( $info['extension'] ) ) ? '' : '.' . $info['extension'];

	return $name . $ext;
}

foreach ( $urls_delim[0] as $key => $val ) {
// var_dump($key);
	$current_val = parse_url( $val );
	if ( strpos( $current_val['path'], 'wp-content' ) == 1 ) {
		// file_put_contents(__DIR__ . safe_file($current_val['path']), file_get_contents ($new_url . $current_val['path']));
	}
	// print '<pre>';
	// var_dump($current_val['path']);
	// var_dump(strpos($current_val['path'], 'wp-content'));
	// print '</pre>';		
}

$url_cache = $_SERVER['REQUEST_URI'];
$break = Explode('/', $url_cache);

// var_dump($_SERVER['REQUEST_URI']);
// var_dump($break);
if (count($break) > 2){
	$file = implode("_", $break);
} else {
	$file = $break[count($break) - 1];
}
// if ($_SERVER['REQUEST_URI'] == '/sitemap.xml'){
	// $cachefile = dirname(__FILE__) . '/sitemap.xml';
// }
if ($_SERVER['REQUEST_URI'] == '/reffers'){
	$cachefile = '';
}
if ($_SERVER['REQUEST_URI'] == '/'){
	$cachefile = dirname(__FILE__) . '/index.html';
} else {
	$cachefile = dirname(__FILE__) .'/'. $file . '.html';
}
// print '<pre>';
// var_dump($cachefile);
// var_dump(file_exists( $cachefile ));
// print '</pre>';
$cachetime = 999999;

// Обслуживается из файла кеша, если время запроса меньше $cachetime
if ( file_exists( $cachefile ) ) {
	echo "<!-- Cached copy, generated " . date( 'H:i', filemtime( $cachefile ) ) . " -->\n";
	include( $cachefile );
	exit();
}
ob_start(); // Запуск буфера вывода

echo $result;

// $cached = fopen( $cachefile, 'w' );
// fwrite( $cached, ob_get_contents() );
// fclose( $cached );
ob_end_flush(); // Отправялем вывод в браузер

// print '<pre>';
// var_dump($result);
// print '</pre>';
//extract cookie from returned content of curl. this content is sent by server.
preg_match_all( "/Set-Cookie:.*/i", $contents, $restr );
$nCookie = count( $restr[0] );
for ( $i = 0; $i < $nCookie; $i = $i + 1 ) {
	// $name=getName($restr[0][$i]);
	// $value=getValue($restr[0][$i]);
	// $expires=getExpire($restr[0][$i]);
	// $maxage=getMaxage($restr[0][$i]);
	// $path=getPath($restr[0][$i]);;
	// setcookie($name,$value,$expires,$path);
}

//headers and body are mixed as a whole when returned by curl. this function seperate it into headers and body.
list( $header, $contents ) = explode( "\r\n\r\n", $contents, 2 );
$sepHeader = splitHeader( $header );
foreach ( $sepHeader as $h ) {
	// header($h);//transfer headers form server to brower.
}
//echo $contents;//this is the body.


?>