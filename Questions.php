<!DOCTYPE html>

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title alt="WorldlyTitle">Worldly: You Ask It, We Map It</title>
<link rel="stylesheet" type="text/css" href="WorldlyCSS.css">
<link rel="stylesheet" type="text/css" href="VoteOnQuestionPageCSS.css">
<meta charset="utf-8" />

<!--<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.1/themes/base/jquery-ui.css" />
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.1/jquery-ui.js"></script>
<link rel="stylesheet" href="/resources/demos/style.css" />
<script>
$(function() {
$( "#accordion" ).accordion({
collapsible: true
});
});
</script>
<style>
*[id^='preview']{
    width:600px;
}
*[id^='number']{
    width:630px;
}
#holdVoteTabs{
   width:700px;
   margin-left:auto;
   margin-right:auto;
   margin-top:10px;
   padding-bottom:40px;
}
#holdVoteTabs{
  
}
</style>
-->
<script>
   var count = 2;
   function addRow(tableID) {
       if(count < 6){
            var table = document.getElementById(tableID);
 
            var rowCount = table.rows.length;

            var row = table.insertRow(rowCount);
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("label");
            element1.type = "label";
            element1.innerHTML="Answer";
            cell1.appendChild(element1);
 
            var cell2 = row.insertCell(1);
            cell2.innerHTML = rowCount + 1;
 
	    count++;
            var cell3 = row.insertCell(2);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.id = "answer" + count;
            cell3.appendChild(element2);
           
            alert(element2.id);
       } 
       else
            window.alert ("Your question must not have more than 6 answers!");
   }

   function deleteRow(tableID) {
            
             try {
		if (count > 2){
                  var table = document.getElementById(tableID);
		  var rowCount = table.rows.length;
                	  
		  document.getElementById(tableID).deleteRow(rowCount - 1);
		  count--;
            	}
		else
		  alert("Your question must have at least 2 answers!");
	      }
            catch(e) {
                alert(e);
            }
   }
           </script>

<script><!--
var Clicks = 0 ;
function AddClick(){
Clicks = Clicks + 1;
document.getElementById('CountedClicks').innerHTML = Clicks ;
}
// --></script>
</head>

<body>

  <ul id="menu" alt="basicMenuBar">  
  <div id="contents1" alt="menuContents">
    <li><a href="#" class="logo" alt="logo"><span></span></a></li>  
    <li><a href="Home.html" class="home" alt=""><span></span></a></li>    	
    <li><a href="#" class="questionsActive" alt="questionsMenu"><span></span></a></li>	   	
    <li><a href="History.html" class="history" alt="hostoryMenu"><span></span></a></li>	
    <li><a href="" class="restOfBar" alt="freeBarSpace"></a></li>
    <li><a href="Account.html" class="account" alt="accountMenu"><span></span></a></li>
  
    <div class="loginLink" alt="linkToLoginOrRegister"><a href="">Logout</a></div>

  </div>   
  </ul>

  <div id="whiteSpace" alt="workingArea">

    <div id="addNewQuestion" alt="titleOfAddQuestionPage"><p id="textTitleForAddNew">Ask Your Question</p></div>

    <div id="divAddQuestion" alt="formToAddNewQuestion">
    	<div id="divUserQuestion">Question:<input id="userQuestion" type="text" /></div>    	

	<table id="addAnswerTable" width="auto">
        <tr>
            <td>Answer</td>
            <td> 1 </td>
            <td><input id="answer1" type="text" /></td>
        </tr>
        <tr>
            <td>Answer</td>
            <td> 2 </td>
            <td><input id="answer2" type="text" /></td>
        </tr>
    	</table>

  	<input id="addAnswerButton" type="button" value="Add Answer" onclick="addRow('addAnswerTable')" />
	<input id="deleteAnswerButton" type="button" value="Remove Answer" onclick="deleteRow('addAnswerTable')" /><br>
        <input id="userSubmitNewQuestion" type="button" value="Submit" onclick="" />
    </div>
</div>

<div id=whiteSpace1>
<div id="DivVoteForQuestion"><p id="textTitleForAddNew">Vote for question</p></div>
<div id="voteAndMoreQuestions">
<div id="tableQuestionsVote">
   
       <table BORDER=1 CELLPADDING=3 CELLSPACING=1 
    RULES=ROWS id="questionsTable" width="auto" >
        <tr>
            <td id="voteResult1"><span id="CountedClicks">0 </span></td>
            <td id="voteButtonCell1"><button id="voteButton" style="background-color: Light blue" onclick="AddClick()">Vote</button></td>
            <td id="questionCell1"><label id="question1" type="label" />Some question here</td>
	    <td id="seeMoreCell1"><input id="buttonSeeMore" type=button onClick="location.href='Home.html'" value='>'></td>
        </tr>
	<tr>
            <td id="voteResult2"><span id="CountedClicks">0 </span></td>
            <td id="voteButtonCell2"><button id="voteButton" style="background-color: Light blue" onclick="AddClick()">Vote</button></td>
            <td id="questionCell2"><label id="question1" type="label" />Somenhgfdsdfghjkjhgfdsdfghjkjhgfdsfghjkjhgfdsdfghjkjhgfd question here</td>
	    <td id="seeMoreCell2"><input id="buttonSeeMore" type=button onClick="location.href='Home.html'" value='>'></td>
        </tr>
    	</table>
</div>
  <input id="moreQuestions" type="button" value="More Questions"/>
  </div>
   

  </div>
 
   <div id="footer" alt="footer">
   <a href="aboutUs.html">AboutUs</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="fag.html">FAQ</a>
   </div>

</body>

</html>
