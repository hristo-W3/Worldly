<?php
$connection = mysql_connect("ramen.cs.man.ac.uk", "13_COMP10120_W3", "lVgWsvqulkQS875r")
    or die('Could not connect: ' . mysql_error());
mysql_select_db("13_COMP10120_W3", $connection)
    or die('Could not select database');

$questionID = $_POST['questionID'];
$dataType = $_POST['dataType'];

if($dataType == 'map')
{
	for($locIndex = 1; $locIndex <= 8; $locIndex++)
	{  
		for($answerIndex = 1; $answerIndex <= 6; $answerIndex++)
		{
			switch($locIndex) {
			  case 1:
				$locName = "wales";
				break;
			  case 2:
				$locName = "isleOfMan";
				break;
			  case 3:
				$locName = "southernEngland";
				break;
			  case 4:
				$locName = "midlands";
				break;
			  case 5:
				$locName = "northernEngland";
				break;
			  case 6:
				$locName = "scotland";
				break;
			  case 7:
				$locName = "northernIreland";
				break;
			  case 8:
				$locName = "republicOfIreland";
				break;
			}
			
			$sql = "SELECT AnswerID" 
					  . " FROM Answer"
				. " INNER JOIN User"
				. " ON Answer.UserID=User.UserID"
				. " and User.Location='$locName'"
				. " and Answer.Value='$answerIndex'"
				. " and Answer.QuestionID='$questionID'";

			  $query = mysql_query($sql);
								  
			if($query == false)
			{
			  $results[$locName][$answerIndex] = null;
			}
			else
			{
			  $results[$locName][$answerIndex] = mysql_num_rows($query);
			}
		}
	}
	echo json_encode($results);
}
if($dataType == 'answers')
{	
  $i = 1;
  for($answerNo = 1; $answerNo <= 6; $answerNo++)
  {
	$sql = "SELECT Answer" . $answerNo
           . " FROM Question" 
		   . " WHERE Question.QuestionID = '$questionID'";

    $query = mysql_query($sql);
	
	if(mysql_result($query, 0) != null)
	{
	  $results[$answerNo] = mysql_result($query, 0);
	}
	else
	{
	  $results[$answerNo] = null;
	}
  }
  echo json_encode($results);
}

?>