<?php 
$pageTitle = "Assignment 4";
$section = "assignments";
$bodyBG = "asgnBodyBg";
include('inc/header.php'); ?>
<article>
  <div class="welcome">
    <h1>Assignment 4</h1>
    <p>For assignment 4</p>
    <figure class="<?php echo $section .= "4"; ?>">
		<img src="img/asgn4webApp.png" alt="Assignment 4">	
		<figcaption>Assignment 4</figcaption>
	</figure>
	<form name="processnumber" id="asgn4Form" class="asgn4form" action="process.php" method="post" onsubmit="return validate()">
			<label for="number">Enter a Number</label><br />
			<input type="text" name="thenumber" id="thenumber" size="10px" placeholder="1234"><br />
			<input type="submit" value="Submit">
	</form>
  </div>
</article>
<script type="text/javascript">

	function validate()
	{
		var x=document.forms.processnumber.thenumber.value;
	    if (x===null || x==="")
	      {
	      alert("Number must have an entry.");
	      return false;
	      }
	    else {
	      alert ('Nicely done');
	    }
	}

</script>

<?php include('inc/footer.php') ?>