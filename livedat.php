<?
//DON'T CHANGE BELOW CODES START
$var1="http://www.mackolik.org/feed_plugin.php";
$var4="user_agent";
$var5="Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.0.3705; .NET CLR 1.1.4322)";
$var8="<table>,<tr>,<th>,<td>,<span>,<img>,<a>";
$var9="/images/playing.gif";
$var10="/live-score/images/playing.gif";
$var11="league-table";

function get_web_page_w( $url, $referer )
{
    $options = array(
        CURLOPT_RETURNTRANSFER => true,     // return web page
        CURLOPT_HEADER         => false,    // don't return headers
        CURLOPT_FOLLOWLOCATION => true,     // follow redirects
        CURLOPT_ENCODING       => "",       // handle all encodings
        CURLOPT_USERAGENT      => "LiveScore", // who am i
        CURLOPT_AUTOREFERER    => true,     // set referer on redirect
        CURLOPT_CONNECTTIMEOUT => 30,      // timeout on connect
        CURLOPT_TIMEOUT        => 30,      // timeout on response
        CURLOPT_MAXREDIRS      => 10,       // stop after 10 redirects
        CURLOPT_REFERER      => $referer,       // stop after 10 redirects
    );

    $ch      = curl_init( $url );
    curl_setopt_array( $ch, $options );
    $content = curl_exec( $ch );
    $err     = curl_errno( $ch );
    $errmsg  = curl_error( $ch );
    $header  = curl_getinfo( $ch );
    curl_close( $ch );

    $header['errno']   = $err;
    $header['errmsg']  = $errmsg;
    $header['content'] = $content;
    return $header;
}

echo "Last update time : ".date("H:i");


$plugin_url=$_REQUEST['url'];
$referer=explode("/wp-content/",$plugin_url);
$referer=$referer[0];
$opts = array(
           'http'=>array(
               'header'=>array("Referer: $referer\r\n")
           )
       );
$context = stream_context_create($opts);
ini_set($var4, $var5);
//$html=file_get_contents($var1, false, $context);
$html=get_web_page_w($var1,$referer);
$html=$html['content'];
$html=strip_tags($html,$var8);
$html=str_replace($var9,$plugin_url.$var10,$html);
echo $html;
//DON'T CHANGE BELOW CODES END 
?>