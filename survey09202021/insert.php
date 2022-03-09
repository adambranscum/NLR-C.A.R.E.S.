<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $age = $_POST['age'];
     $school = $_POST['school'];
     $question1 = $_POST['question1'];
	 $question2 = $_POST['question2'];
     $question3 = $_POST['question3'];
     $question4 = $_POST['question4'];
	 $question5 = $_POST['question5'];
	 $question6 = $_POST['question6'];
	 $question7 = $_POST['question7'];
     $question8 = $_POST['question8'];
     $question9 = $_POST['question9'];
	 $question10 = $_POST['question10'];
	 $bullying = $_POST['bullying'];
	 $gang = $_POST['gang'];
     $cyberbuyllying = $_POST['cyberbullying'];
     $racial = $_POST['racial'];
	 $gender = $_POST['gender'];
     $question11 = $_POST['question11'];
	 $question12 = $_POST['question12'];
     $question13 = $_POST['question13'];
     $question14 = $_POST['question14'];
	 $question15 = $_POST['question15'];
     $sql = "INSERT INTO Survey(age,school,question1,question2,question3,question4,question5,question6,question7,question8,question9,question10,bullying,gang,cyberbullying,racial,gender,question11,question12,question13,question14,question15,date)
     VALUES ('$age','$school','$question1','$question2','$question3','$question4','$question5','$question6','$question7','$question8','$question9','$question10','$bullying','$gang','$cyberbuyllying','$racial','$gender','$question11','$question12','$question13','$question14','$question15',(NOW()))";
	 
     if (mysqli_query($connection, $sql)) {
        echo "Thank you for your input";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
echo '<p>Click <a href="index.html">here</a> to go back</p>'
?>