<?php

// create short variable names
$name       = (int) $_POST['name_ID'];  // Database unique ID for player's name
$time       = trim( preg_replace("/\t|\R/",' ',$_POST['time']) );
$points     = (int) $_POST['points'];
$assists    = (int) $_POST['assists'];
$rebounds   = (int) $_POST['rebounds'];

if( empty($name)     ) $name      = null;
// see below for $time processing
if( empty($points)   ) $points    = null;
if( empty($assists)  ) $assists   = null;
if( empty($rebounds) ) $rebounds  = null;

$time = explode(':', $time); // convert string to array of minutes and seconds
if( count($time) >= 2 ) 
{
  $minutes = (int)$time[0];
  $seconds = (int)$time[1];
}
else if( count($time) == 1 ) 
{
  $minutes = (int)$time[0];
  $seconds = null;
}
else
{
  $minutes = null;
  $seconds = null;
}


if( ! empty($name) )  // Verify required fields are present
{
  require_once( 'Adaptation.php' );
  $db = new mysqli(DATA_BASE_HOST, USER_NAME, USER_PASSWORD, DATA_BASE_NAME);
  if( mysqli_connect_error() == 0 )  // Connection succeeded
  {
    $query = "INSERT INTO Statistics SET
                Player          = ?,
                PlayingTimeMin  = ?,
                PlayingTimeSec  = ?,
                Points          = ?,
                Assists         = ?,
                Rebounds        = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('dddddd', $name, $minutes, $seconds, $points, $assists, $rebounds);
    $stmt->execute();
  }
}

require('home_page.php');
?>

