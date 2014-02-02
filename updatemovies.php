<?php 
$pageTitle = "Movies Update";
$section = "movieUpdate";
$bodyBG = "asgnBodyBg";
include('inc/header.php'); 
?>
<article>
  <div class="welcome processMovies shadow">
    <h1>Assignment 5</h1>
    <p>For assignment 5</p>
<!--     <figure class="<?php echo $section; ?>">
        <img src="img/asgn5webApp.png" alt="Assignment 5">  
        <figcaption>Assignment 5</figcaption>
    </figure> -->
 <?php 
include('management.php');
// var_dump($_POST);
if (isset($_POST["editbutton"])){
    print "<div class=\"welcome processMovies shadow\">\n";
    print "<form name=\"movieform\" id=\"movieForm\" class=\"movieform\" action=\"movies.php\" method=\"post\" onsubmit=\"return validateForm()\">";
    print "<fieldset>";
        print "<legend>Edit Movie</legend>";
        $result = $management->mDb->Query( "SELECT * FROM  `movies` WHERE  `id` =" . $_POST["movie_id"]);
        $row = mysqli_fetch_assoc($result);
        print "<label for=\"title\"><strong>Title: </strong><input type=\"text\" name=\"title\" value=\"" . $row["title"] . "\" size=\"\"></label><br />";
        print "<label for=\"year\"><strong>Year: </strong><input type=\"text\" name=\"year\" value=\"" . $row["year"] . "\" size=\"\" ></label><br />";
        print "<label for=\"studio\"><strong>Studio: </strong><input type=\"text\" name=\"studio\" value=\"" . $row["studio"] . "\" size=\"\" ></label><br />";
        print "<label for=\"price\"><strong>Price: </strong><input type=\"text\" name=\"price\" value=\"" . $row["price"] . "\" size=\"\" ></label><br />";
        print "<input type=\"text\" name=\"other\" size=\"0\" id=\"honeypot\">";
        print "<input type=\"submit\" value=\"SAVE\" name=\"save\">";
        print "<input type=\"submit\" value=\"CANCEL\" name=\"cancel\">";

      print "</fieldset>";
    print "</form>";
    print "</div>";
}
else if (isset($_POST["deletebutton"])){
    print "<div class=\"welcome processMovies shadow\">\n";
    print "<form name=\"movieform\" id=\"movieForm\" class=\"movieform\" action=\"movies.php\" method=\"post\" onsubmit=\"return validateForm()\">";
    print "<fieldset>";
        print "<legend>Delete Movie</legend>";
        $result = $management->mDb->Query( "SELECT * FROM  `movies` WHERE  `id` =" . $_POST["movie_id"]);
        $row = mysqli_fetch_assoc($result);
        print "<label for=\"title\"><strong>Title: </strong><input type=\"text\" name=\"title\" value=\"" . $row["title"] . "\"  size=\"\" ></label><br />";
        print "<label for=\"year\"><strong>Year: </strong><input type=\"text\" name=\"year\" value=\"" . $row["year"] . "\"  size=\"\" ></label><br />";
        print "<label for=\"studio\"><strong>Studio: </strong><input type=\"text\" name=\"studio\" value=\"" . $row["studio"] . "\"  size=\"\" ></label><br />";
        print "<label for=\"price\"><strong>Price: </strong><input type=\"text\" name=\"price\" value=\"" . $row["price"] . "\"  size=\"\" ></label><br />";
        print "<input type=\"text\" name=\"other\" size=\"0\" id=\"honeypot\">";
        print "<input type=\"submit\" value=\"DELETE\" name=\"delete\">";
        print "<input type=\"submit\" value=\"CANCEL\" name=\"cancel\">";
      print "</fieldset>";
    print "</form>";
    print "</div>";
}
else {
    print "<div class=\"welcome processMovies shadow\">\n";
    print "<form name=\"movieform\" id=\"movieForm\" class=\"movieform\" action=\"movies.php\" method=\"post\" onsubmit=\"return validateForm()\">";
    print "<fieldset>";
        print "<legend>Add Movie</legend>";
        print "<label for=\"title\"><strong>Title: </strong><input type=\"text\" name=\"title\" size=\"\" placeholder=\"\"></label><br />";
        print "<label for=\"year\"><strong>Year: </strong><input type=\"text\" name=\"year\" size=\"\" ></label><br />";
        print "<label for=\"studio\"><strong>Studio: </strong><input type=\"text\" name=\"studio\" size=\"\" ></label><br />";
        print "<label for=\"price\"><strong>Price: </strong><input type=\"text\" name=\"price\" size=\"\" ></label><br />";
        print "<input type=\"text\" name=\"other\" size=\"0\" id=\"honeypot\">";
        print "<input type=\"submit\" value=\"SAVE\" name=\"save\">";
        print "<input type=\"submit\" value=\"CANCEL\" name=\"cancel\">";
      print "</fieldset>";
    print "</form>";
    print "</div>";
}    
?>
</article>
<?php include('inc/footer.php') ?>