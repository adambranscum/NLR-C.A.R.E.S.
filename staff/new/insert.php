<?php
include_once 'db.php';
if(isset($_POST['submit']))
{    
     $name = $_POST['Name'];
     $URL = $_POST['URL'];
     $City = $_POST['City'];
	 $Keyword = $_POST['Keyword'];
     $Address = $_POST['Address'];
     $State = $_POST['State'];
	 $Phone = $_POST['Phone'];
     $Description = $_POST['Description'];
	 $Category = $_POST['Category'];
     $sql = "INSERT INTO TeenDirectory (Name,URL,City,Keyword,Address,State,Phone,Description,Category)
     VALUES ('$name','$URL','$City','$Keyword','$Address','$State','$Phone','".addslashes($Description)."','$Category')";	
     if (mysqli_query($connection, $sql)) {
        echo "New record has been added successfully !";
     } else {
        echo "Error: " . $sql . ":-" . mysqli_error($connection);
     }
     mysqli_close($connection);
}
?>