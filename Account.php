<?php
session_start();
$_SESSION['userID'] = "";

//Connect to the database
$connection = mysql_connect("ramen.cs.man.ac.uk","13_COMP10120_W3",
                            "lVgWsvqulkQS875r")
    or die('Could not connect: ' . mysql_error());
mysql_select_db("13_COMP10120_W3", $connection)
    or die('Could not select database');
    
//get the values from the form before
$username = filter_input(INPUT_POST, 'userReg', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'passReg', FILTER_SANITIZE_STRING);
$location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING);
$ages = filter_input(INPUT_POST, 'ages', FILTER_SANITIZE_STRING);
$gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);

function IDExists($username)
{
  //search for the username in the database
  $sql1 = "SELECT UserID FROM User WHERE UserName='$username'";
  $foundRecordQuery = mysql_query($sql1);
  $foundRecordID = mysql_result($foundRecordQuery, 0);
  
  if (!empty($foundRecordID))
    //if it exists then the username is already taken
    return true;
  else
    //if it doesn't exist then the username is free to use
    return false;
}//IDExists

function setID($username)
{
  //search for the username in the database
  $sql1 = "SELECT UserID FROM User WHERE UserName='$username'";
  $foundRecordQuery = mysql_query($sql1);
  $foundRecordID = mysql_result($foundRecordQuery, 0);
  $_SESSION['userID'] = $foundRecordID;
}//setID

//automatically called
if(!IDExists($username))
{
  $sql = "INSERT INTO User (UserName, Password, Location, AgeGroup, Gender) 
        VALUES ('$username', '$password', '$location', '$ages', '$gender')";
  mysql_query($sql);
  setID($username);
}
else
  $_SESSION['userID'] = '-1';
  
?>

<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>

<title>Worldly: You Ask It, We Map It</title>

<link rel="stylesheet" type="text/css" href="WorldlyCSS.css">

</head>

<body>

<ul id="menu">
  <div id="contents1">
    <li><a href="#" class="logo"><span></span></a></li>
    <li><a href="Home.html" class="home"><span></span></a></li>
    <li><a href="#" class="questions"><span></span></a></li>
    <li><a href="History.html" class="history"><span></span></a></li>
    <li><a href="" class="restOfBar"></a></li>
    <li><a href="Account.html" class="accountActive"><span></span></a></li>
  </div>
  </ul>

  <div id="whiteSpace">
    <?php 
      if($_SESSION['userID'] == '-1')
        echo 'Sorry, that username is already taken! Please try again.<br><br><form method="post" action="Account.html"><p><input type="submit" name="commit" value="Continue" id="nextButton"></p></form><br><br>';
      else
        echo 'Congratulations, your account has been created. You may now log in!<br><br><form method="post" action="AccountDetail.html"><p><input type="submit" name="commit" value="Continue" id="nextButton"></p></form><br><br>';
    ?>
   
  </div>
</body>

</html>
