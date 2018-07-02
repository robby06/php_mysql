<?php

// create short variable names
$firstName     = trim( preg_replace("/\t|\R/",' ',$_POST['firstName']) );
$lastName      = trim( preg_replace("/\t|\R/",' ',$_POST['lastName'])  );
$street        = trim( preg_replace("/\t|\R/",' ',$_POST['street'])    );
$city          = trim( preg_replace("/\t|\R/",' ',$_POST['city'])      );
$state         = trim( preg_replace("/\t|\R/",' ',$_POST['state'])     );
$country       = trim( preg_replace("/\t|\R/",' ',$_POST['country'])   );
$zipCode       = trim( preg_replace("/\t|\R/",' ',$_POST['zipCode'])   );

if( empty($firstName) ) $firstName = null;
if( empty($lastName)  ) $lastName  = null;
if( empty($street)    ) $street    = null;
if( empty($city)      ) $city      = null;
if( empty($state)     ) $state     = null;
if( empty($country)   ) $country   = null;
if( empty($zipCode)   ) $zipCode   = null;


if( ! empty($lastName) ) // Verify required fields are present
{
  require_once( 'Adaptation.php' );
  $db = new mysqli(DATA_BASE_HOST, USER_NAME, USER_PASSWORD, DATA_BASE_NAME);
  if( mysqli_connect_error() == 0 )  // Connection succeeded
  {
    $query = "INSERT INTO TeamRoster SET
                Name_First = ?,
                Name_Last  = ?,
                Street     = ?,
                City       = ?,
                State      = ?,
                Country    = ?,
                ZipCode    = ?";
    $stmt = $db->prepare($query);
    $stmt->bind_param('sssssss', $firstName, $lastName, $street, $city, $state, $country, $zipCode);
    $stmt->execute();
  }
}

require('home_page.php');
?>
