<?php
defined('_JEXEC') OR defined('_VALID_MOS') OR die( "Direct Access Is Not Allowed" );

$email_recipient = "rob@pelotas.co.uk";
$log_file = '/kunden/homepages/8/d422344499/htdocs/sites/pelotas.co.uk/logs/web_error.log';
//$checkuser = JFactory::getUser();
//$giddy = $checkuser->get('gid');
$ip = getenv('REMOTE_ADDR');
$hr = getenv('HTTP_REFERER');
$qs = getenv('QUERY_STRING');
$sn = getenv('SCRIPT_NAME');
$rh = getenv('REMOTE_HOST');
$ra = getenv('REMOTE_ADDR');
$rp = getenv('REMOTE_PORT');
$ru = getenv('REMOTE_USER');
$ss = getenv('SSL_SERVER_S_DN_CN');
$ck = getenv('HTTP_COOKIE');
$rq = getenv('REQUEST_URI');
$ua = getenv('HTTP_USER_AGENT');
$datestamp = (int)gmdate('U');
// log the error
$filename = $log_file;
$somecontent = $datestamp . ":" .  $ip. ":" .  $ra. ":" . $rp. ":" . $ru. ":" . $ss. ":" . $ck . ":" . $rq . ":" . $hr . ":" . $qs. ":" . $sn . ":" . $rh . ":" . $ua . "n";

if (is_writable($filename)) {
    if (!$handle = fopen($filename, 'a')) {
         $additional_error = "Cannot open error log!";
    }
    if (fwrite($handle, $somecontent) === FALSE) {
        $additional_error = "Cannot write to error log!";
    }
    // Success, wrote to error.log
    fclose($handle);
} else {
    $additional_error = "The error log is not writable!";
}
// alert admin
$mailcontent = "A script error occured on: " . $rq . "here's the info:nn" . $somecontent;
mail($email_recipient,"ERROR!",$mailcontent);

if ($additional_error != "") {
  echo "<h2><b>WARNING</b> ", $additional_error, "</h2>";
} else {
  echo "<h3>An error has been logged.</h3>";
}
?>
