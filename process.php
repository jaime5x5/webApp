<?php 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["ContactName"]);
    $gender =  test_input($_POST["gender"]);
    $position =  test_input($_POST["position"]);
    $notes =  test_input($_POST["contactNotes"]);
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
include('inc/header.php'); ?>
<article>
  <div class="welcome">
    <h1>Welcome <?php echo $name;?></h1>
    <p>Your gender is: <?php echo $gender;?></p>
    <p>Your class status is: <?php echo $position;?></p>
    <p>Your notes are: <?php echo $notes;?></p>
  </div>

</article>
<?php include('inc/footer.php') ?>