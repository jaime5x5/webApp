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
  <div class="process">
    <h1><strong>Welcome </strong> <?php echo $name;?></h1>
    <p><strong>Your gender is: </strong><?php echo $gender;?></p>
    <p><strong>Your class status is: </strong><?php echo $position;?></p>
    <p><strong>Your notes are: </strong><?php echo $notes;?></p>
  </div>

</article>
<?php include('inc/footer.php') ?>