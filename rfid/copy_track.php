<?php

/*
 * Sample Request: http://localhost/track.php?tracker_id=12646382728222312&card_id=83_18_239_197&type=1&battery=3.13
 *
 */

const OK = "1";
const ERROR = "0";
const QUOTE = "'";
const QCQ = "','";
const CRLF = "<BR>";


/* For debug purposes only
# Disable browser cache
header('Expires: Sun, 01 Jan 2014 00:00:00 GMT');
header('Cache-Control: no-store, no-cache, must-revalidate');
header('Cache-Control: post-check=0, pre-check=0', false);
header('Pragma: no-cache');

echo 'tracker_id=' . $_GET['tracker_id'];
echo ', card_id=' . $_GET['card_id'];
echo ', type=' . $_GET['type'];
echo ', battery=' . $_GET['battery'];
echo CRLF;
*/

date_default_timezone_set('Europe/Riga'); # No longer used

if (isset($_GET['tracker_id']) && isset($_GET['card_id']) && isset($_GET['type']) && isset($_GET['battery'])) {

  # ToDo: Need to convert to PHP7-compatible DB calls   
  #$conn = mysqli_connect('localhost', 'root', 'root', 'craft', 3306);
  $conn = mysqli_connect('141.136.35.155', 'sono_dbu', 'xM2COc0Ma1x$', 'sono_db', 3306);
  if (mysqli_connect_errno()) {
    echo ERROR;     
  } 
  else {
    $query = "INSERT INTO `Registry` (`Tracker_Code`, `Key_Name`, `Action`, `Battery_State`) VALUES (" . QUOTE . $_GET['tracker_id'] . QCQ . $_GET['card_id'] . QCQ . $_GET['type'] . QCQ . $_GET['battery'] . QUOTE . ");";
    #echo $query . CRLF;
    $result = mysqli_query($conn, $query) ;
    # Throw an error if INSERT fails
    if (!$result) {
        echo 'MySql Error: ' . mysqli_error($conn) . CRLF;
        echo ERROR;
    }
    else {
        echo OK;
    }
    # Close connection
    if (isset($conn)) {
        mysqli_close($conn);
    }
  }
} 
else {
  echo ERROR;
}  


?>
