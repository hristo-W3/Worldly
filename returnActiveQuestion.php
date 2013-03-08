<?php
$connection = mysql_connect("ramen.cs.man.ac.uk", "13_COMP10120_W3", "lVgWsvqulkQS875r")
    or die('Could not connect: ' . mysql_error());
mysql_select_db("13_COMP10120_W3", $connection)
    or die('Could not select database');
    
//$questionToAccess = $_POST['mapNo'];
$questionToAccess = 1;

$sql = "SELECT Question" 
       . " FROM Question"
       . " WHERE Question.Status = 'active'";
       
$query = mysql_query($sql);

  if($query == false)
	{
	  $result = "test";
	}
	else
	{
	  $result = mysql_result($query, 0);
	} 

echo $result;

?>
