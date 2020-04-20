<?php

function measure_speed($url)
{
  $ch = curl_init($url);

  // Set options:
    curl_setopt($ch, CURLOPT_HEADER, 1)
    // HTTP HEAD request...
    curl_setopt($ch, CURLOPT_NOBODY, 1);
    // Useragent...
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; .NET CLR 1.1.4322)");
    // Write the response to a variable...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // Max execution time...
    curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,60);
    // Stop on error
    curl_setopt($ch, CURLOPT_FAILONERROR, 1);

    return curl_exec($ch);
}

function microtime_diff ($start, $end = time())
{
  list($start_usec, $start_sec) = explode(" ", $start);
  list($end_usec, $end_sec) = explode(" ", $end);

  $diff_sec= intval($end_sec) - intval($start_sec);
  $diff_usec= floatval($end_usec) - floatval($start_usec);

  return floatval($diff_sec) + $diff_usec;
}

$time_start = microtime(true);
$execute = measure_speed("http://download.bethere.co.uk/images/61859740_3c0c5dbc30_o.jpg");
$time_end = microtime(true);

// Calculate time taken to receive file
$time_taken = microtime_diff ($time_start, $time_end);

// File size in bytes
$filesize = 6576848;

// If no error:
if (!curl_errno ($ch)) {
  // Calculate speed
  $bytes_per_sec = $filesize / $time_taken;
  $KB_per_sec = $bytes_per_sec / 1024;
  $MB_per_sec = $KB_per_sec / 1024;

  // Print result
  echo 'MB/s: ', $MB_per_sec;

  clearstatcache();
} else {
  echo 'We had a CURL error!';
}

curl_close($ch);
?>