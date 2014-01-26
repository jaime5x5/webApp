
<?php 
$pageTitle = "Contact Me";
$section = "contact";
$bodyBG = "contactBodyBg";
include('inc/header.php'); 
?>
<form name="contactInfo" id="contactInfo" class="contactinfo" action="process.php" method="post" onsubmit="return validateForm()">
  <fieldset>
    <legend>Contact Information</legend>
    <label for="name"><strong>Please enter your full name: </strong><input type="text" name="ContactName" size="" ></label><br />
    <label for="gender"><strong>Please enter your gender: </strong></label><br />
    <input type="radio" name="gender" id="male" value="male" /><label for="male">Male</label><br />
    <input type="radio" name="gender" id="female" value="female" /><label for="female">Female</label><br />
    <label for="position"><strong>Please select your class status: </strong></label><br />
    <input type="radio" name="position" id="freshman" value="freshman"/><label for="freshman">Freshman</label><br />
    <input type="radio" name="position" id="sophmore" value="sophmore" /><label for="sophmore">Sophmore</label><br />
    <input type="radio" name="position" id="junior" value="junior"/><label for="junior">Junior</label><br />
    <input type="radio" name="position" id="senior" value="senior"/><label for="senior">Senior</label><br /><br />
    <label for="contactNotes"><strong>Notes: </strong></label><br />
    <textarea name="contactNotes" rows="5" cols="25"></textarea><br />
    <button type="submit" value="submit">Submit</button>
  </fieldset>
</form>
  <script>
  function validateForm()
  {
    var x=document.forms.contactInfo.ContactName.value;
    if (x===null || x==="")
      {
      alert("Name must be filled out");
      return false;
      }
    if ( ( contactInfo.gender[0].checked === false ) && ( contactInfo.gender[1].checked === false )) 
    {
      alert 
       ( "Please select you gender." ); 
        return false;
    }
    if ( ( contactInfo.position[0].checked === false ) && ( contactInfo.position[1].checked === false )  && ( contactInfo.position[2].checked === false ) && ( contactInfo.position[3].checked === false )) 
    {
      alert 
       ( "Please select your class status." ); 
        return false;
    }
    var y=document.forms.contactInfo.contactNotes.value;
    if (y===null || y==="")
      {
      alert("You must enter a comment.");
      return false;
      }else {
      alert ('Nicely done');
    }
  }
  </script>

<?php include('inc/footer.php') ?>
