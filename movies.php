<?php 
$pageTitle = "Movies";
$section = "movieMaintenance";
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
$id = $title = $year = $studio = $price = NULL;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //$id = test_input($_POST["id"]);
		$title = test_input($_POST["title"]);
		$year =  test_input($_POST["year"]);
		$studio =  test_input($_POST["studio"]);
		$price =  test_input($_POST["price"]);
		$created_at= '';
		$updated_at= '';
		if ($_POST['title'] !== "" ) {
			$management->addMovie( $title, $year, $studio, $price);
		}
        else if (isset($_POST["editbutton"])){
            $management->editMovie( $id, $title, $year, $studio, $price);
        }
        else if (isset($_POST["deletebutton"])){
            $management->deleteMovie( $id, $title, $year, $studio, $price);
        }
					
}
function test_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// var_dump($_POST);
$moviePosted = $management->mDb->Query( "SELECT * FROM  " . DB_NAME . " . movies"  . " ORDER BY id DESC");


if($moviePosted) {
    print "<div class=\"movies\">\n";
    print "<table name=\"movietable\">";
    print "<tr>";
    // print "<th>ID</th>";   				
    print "<th>Title</th>";
	print "<th>Year</th>";
	print "<th>Studio</th>";
	print "<th>Price</th>";
	print "<th>Actions</th>";
	print "</tr>";

	while ( $row = mysqli_fetch_assoc($moviePosted)){

		print "<tr>";
        // print "<td>"  . $row['id'] . "</td>"; 
        print "<td>"  . $row['title'] . "</td>";
        print "<td>" . $row['year'] . "</td>";
        print "<td>" . $row['studio'] . "</td>";
        print "<td>" . $row['price'] . "</td>";
        print "<td>";
        print "<form action=\"updatemovies.php\" method=\"post\">";
        print "<input type=\"submit\" value=\"EDIT\" name=\"editbutton\">";
        print "<input type=\"submit\" value=\"DELETE\" name=\"deletebutton\">";
        print "<input type=\"hidden\" value=\"" . $row['id'] . "\" name=\"movie_id\">";
        print "</form>";
        print "</td>";
        print "</tr>";
	}
	print "</table>";
    print "<form action=\"updatemovies.php\" method=\"post\">";
    print "<input type=\"submit\" value=\"Add Movie\" name=\"addbutton\">";
    print "</form>";
	print "</div>"; 
}

?> 
</article>
<?php include('inc/footer.php') ?>
