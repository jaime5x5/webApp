<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html lang="en" >

<head>

  <title><?php echo $pageTitle; ?></title>
  <meta charset="utf-8">
  <meta name="description" content="This is a website for my webApp class." />
  <meta name="robots" content="all,index,follow" />
  <meta name="googlebot" content="all,index,follow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="favicon.ico" rel="icon" type="image/x-icon" />
  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/style.css">
  <script type="text/javascript" src="//use.typekit.net/apu4wot.js"></script>
  <script type="text/javascript">try{Typekit.load();}catch(e){}</script>

</head>
<body class="<?php echo $bodyBG; ?>">
	<div class="container">		
		<header>
			<div class="logo">
				<a href="index.php" ><img src="img/jaime_logo.jpg"></a>
			</div>
			<nav>
				<ul>
				  <li class="about <?php if ($section == "about") {echo "on"; } ?>"><a href="about.php">About</a></li>
				  <li class="contact <?php if ($section == "contact") {echo "on"; } ?>"><a href="contact.php">Contact</a></li>
				  <li class="assignments <?php if ($section == "assignments") {echo "on"; } ?>"><a href="assignments.php">Assignments</a></li>
				</ul>
			</nav>
			<h1><?php echo $pageTitle; ?></h1>		
		</header>