<?php

/*
 * Sample Request: http://localhost/track.php?tracker_id=12646382728222312&card_id=83_18_239_197&type=1&battery=3.13
 *
 */

const OK = "1";
const ERROR = "0";
const QUOTE = "'";
const QCQ = "','";
const COMMA = ',';
const CRLF = "<BR>";

const DEBUG = false;

#Handle URL arguments
$tracker_id = $_GET['tracker_id'];
$card_id = $_GET['card_id'];
$entry_type = $_GET['type'];
$battery = $_GET['battery'];
$signal = (isset($_GET['signal']) ? $_GET['signal'] : 'NULL');

# Disable browser cache and dump variables if debug is true
if (DEBUG) {
  header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
  header('Cache-Control: no-store, no-cache, must-revalidate');
  header('Cache-Control: post-check=0, pre-check=0', false);
  header('Pragma: no-cache');

  echo 'tracker_id=' . $tracker_id;
  echo ', card_id=' . $card_id;
  echo ', type=' . $entry_type;
  echo ', battery=' . $battery;
  echo ', signal=' . $signal;
  echo CRLF;
}

date_default_timezone_set('Europe/Riga'); # No longer used

# 4 URL arguments are mandatory
if (isset($tracker_id) && isset($card_id) && isset($entry_type) && isset($battery)) {

    $file = 'people.txt';

    // Open the file to get existing content
    
    $current = file_get_contents($file);
    
    // Append a new person to the file
    
    $current .= date('d.m.Y. H:i:s') . " from " . $_SERVER['REMOTE_ADDR'] . " \n" . print_r($_GET, true) . "\n\n";
    
    // Write the contents back to the file
    
    file_put_contents($file, $current);

  
    echo OK;
  
} 
else {
  echo ERROR;
}  


?>
