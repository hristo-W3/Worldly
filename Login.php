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
$username = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

function setID($username)
{
  //search for the username in the database
  $sql1 = "SELECT UserID FROM User WHERE UserName='$username'";
  $foundRecordQuery = mysql_query($sql1);
  $foundRecordID = mysql_result($foundRecordQuery, 0);
  $_SESSION['userID'] = $foundRecordID;
}//setID

function isFound($username)
{
  //search for the username in the database
  $sql1 = "SELECT UserID FROM User WHERE UserName='$username'";
  $foundRecordQuery = mysql_query($sql1);
  $foundRecordID = mysql_result($foundRecordQuery, 0);
  
  //check to see that the user exists
  if(!empty($foundRecordID))
    return true;
  else
    return false;
}//isFound

//automatically called
if(isFound($username))
{
  $sql = "SELECT Password FROM User WHERE UserName='$username'";
  $foundPasswordQuery = mysql_query($sql);
  $foundPassword = mysql_result($foundPasswordQuery, 0);
  if($foundPassword == $password)
    setID($username);
  else
    $_SESSION['userID'] = '-1';
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
        echo 'Sorry, your username or password was incorrect<br><br><form method="post" action="Account.html"><p><input type="submit" name="commit" value="Continue" id="nextButton"></p></form><br><br>';
      else
        echo 'Congratulations, you have logged in successfully!<br><br><form method="post" action="AccountDetail.html"><p><input type="submit" name="commit" value="Continue" id="nextButton"></p></form><br><br>';
    ?>
   
  </div>
</body>

</html>
