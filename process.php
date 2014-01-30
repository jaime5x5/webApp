
<?php
require('management.php');
$thenumber = $name = $email = $gender = $position = $notes = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
      if (isset($_POST["contactname"]) && isset($_POST["email"]) && isset($_POST["gender"]) && isset($_POST["position"]) && isset($_POST["contactNotes"])){
        $name = test_input($_POST["contactname"]);
        $email =  test_input($_POST["email"]);
        $gender =  test_input($_POST["gender"]);
        $position =  test_input($_POST["position"]);
        $notes =  test_input($_POST["contactNotes"]);
        $created_at= '';
        $updated_at= '';
        $management->SaveNewContact( $name, $email, $gender, $position, $notes, $created_at, $updated_at);
    }
    else if (isset($_POST["thenumber"])){
      $thenumber =  test_input($_POST["thenumber"]);
    }
}
function test_input($data)
  {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

$pageTitle = "Form Processor";
$section = "process";
$bodyBG = "asgnBodyBg";

include('inc/header.php'); 
?>
<article>
<?php 
if (!is_null($name) && !is_null($email) && !is_null($gender) && !is_null($position) && !is_null($notes)) {
    $showLast = '';
    $commentsPosted = $management->mDb->Query( "SELECT * FROM  " . DB_NAME . " . contacts"  . " ORDER BY id DESC LIMIT 0,1");
    if($commentsPosted) {
      while ( $row = mysqli_fetch_assoc($commentsPosted)){
            print " <div class=\"comment-response\">\n";
            print "<div class=\"welcome processContact shadow\">";
            print "<h1><strong>Results </strong>"  . $row['name'] . "</h1>";
            print "<p><strong>Your email is: </strong>" . $row['email'] . "</p>";
            print "<p><strong>Your gender is: </strong>" . $row['gender'] . "</p>";
            print "<p><strong>Your class status is: </strong>" . $row['position'] . "</p>";
            print "<p><strong>Your notes are: </strong>" . $row['notes'] . "</p>";
            print "<p><strong>Code is available at: </strong><a href=\"https://github.com/jaime5x5/webApp\">GitHub</a></p>";
            print "</div>";
      }
    }
  } 
else if (!is_null($thenumber)) {
    print "<div class=\"welcome processNumber shadow\">";
    print "<h1><strong>Results </strong></h1>";
    if (is_numeric($thenumber)){
      $val = "true";
      print "<p><strong>Your number is numeric: </strong>" . $val . "</p>";
      print "<p><strong>Your number is: </strong>" . $thenumber . "</p>";
      print "<p><strong>Code is available at: </strong><a href=\"https://github.com/jaime5x5/webApp\">GitHub</a></p>";
    }
    else if(!is_numeric($thenumber)){
      print "<p><strong>Your number is not numeric! </strong>" . $thenumber . "</p>";
      print "<p><strong>Code is available at: </strong><a href=\"https://github.com/jaime5x5/webApp\">GitHub</a></p>";
    }
    
    print "</div>";
  }
?>
</article>
<?php include('inc/footer.php') ?>