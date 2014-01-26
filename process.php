
<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST["ContactName"]) && isset($_POST["gender"]) && isset($_POST["position"]) && isset($_POST["contactNotes"])){
        $name = test_input($_POST["ContactName"]);
        $gender =  test_input($_POST["gender"]);
        $position =  test_input($_POST["position"]);
        $notes =  test_input($_POST["contactNotes"]);
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
?>
<?php 
$pageTitle = "Form Processor";
$section = "process";
$bodyBG = "asgnBodyBg";
include('inc/header.php'); ?>
<article>
<?php 
if (!is_null($name) && !is_null($gender) && !is_null($position) && !is_null($notes)) {
    print "<div class=\"welcome processContact\">";
    print "<h1><strong>Results </strong>"  . $name . "</h1>";
    print "<p><strong>Your gender is: </strong>" . $gender . "</p>";
    print "<p><strong>Your class status is: </strong>" . $position . "</p>";
    print "<p><strong>Your notes are: </strong>" . $notes . "</p>";
    print "</div>";
  } 
else if (!is_null($thenumber)) {
    print "<div class=\"welcome processNumber\">";
    print "<h1><strong>Results </strong></h1>";
    if (is_numeric($thenumber)){
      $val = "true";
      print "<p><strong>Your number is numeric: </strong>" . $val . "</p>";
      print "<p><strong>Your number is: </strong>" . $thenumber . "</p>";
    }
    else if(!is_numeric($thenumber)){
      print "<p><strong>Your number is not numeric! </strong>" . $thenumber . "</p>";
    }
    
    print "</div>";
  }
?>
</article>
<?php include('inc/footer.php') ?>