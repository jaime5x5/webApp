<?php 
$pageTitle = "Contact Me";
$section = "contact";
include('inc/header.php'); ?>
<form name="contactInfo" id="contactInfo" action="success.html" method="post" onsubmit="return validateForm()">
  <fieldset>
    <legend>Contact Information</legend>
    <label class="name" for="name">Name: <input type="text" name="ContactName" size="" ></label><br />
    <label class="address">Mailing Address: </label><br />
    <textarea name="contactAddress" rows="5" cols="20"></textarea><br />
    <label class="status" for="status">Status</label><br />
    <input type="radio" name="status" id="freshRadio" /><label class="freshman" for="freshman">Freshman</label><br />
    <input type="radio" name="status" id="sophRadio" /><label class="sophmore" for="sophmore">Sophmore</label><br />
    <input type="radio" name="status" id="junRadio" /><label class="junior" for="junior">Junior</label><br />
    <input type="radio" name="status" id="senRadio" /><label class="senior" for="senior">Senior</label><br /><br />
    <input type="checkbox" name="majorDeclared" id="majorDec" /><label class="major" for="majorDeclared">Major Declared?</label><br /><br />
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
    var y=document.forms.contactInfo.contactAddress.value;
    if (y===null || y==="")
      {
      alert("Mailing Address must be filled out");
      return false;
      }
    if ( ( contactInfo.status[0].checked === false ) && ( contactInfo.status[1].checked === false )  && ( contactInfo.status[2].checked === false ) && ( contactInfo.status[3].checked === false )) 
    {
      alert 
       ( "Please select you Status" ); 
        return false;
    }
    if ( ( contactInfo.majorDeclared.checked === false )) 
    {
      alert 
       ( "Please select you Major" ); 
        return false;
    }else {
      alert ('Nicely done');
    }
  }
  </script>

<?php include('inc/footer.php') ?>
