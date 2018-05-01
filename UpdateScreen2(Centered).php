<?php 
if ($_SERVER['HTTPS'] !== 'on') {
$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
header("Location: $redirectURL");
exit;
}
if(!session_start()) {
header("Location: error.php");
exit;
}
if (!$loggedIn) {
header("Location: login.php");
exit;?>
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

<!--Column setup courtesy of W3Schools, with tons of edits (obviously)-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Update a Song! </title>
<style>
.center
  {
  text-align:center;
  }

*
{
  box-sizing: border-box;
}

.column
	{
    float: left;
    width: 50%;
	}

.row:after
	{
    content: "";
    display: table;
    clear: both;
	}

@media screen and (max-width: 600px)
	{
    .column
    	{
        width: 100%;
    	}
	}
</style>
</head>
<body>
	<div class="center">
<h1>Update a Song</h1>
<br>
<form class = "center" action="" method="POST">

<!--The name of the song to change-->
<p><h4> Type the name of the song you want to update here </h4></p>
<input type="text" name="songName" placeholder="Song name here" required
pattern="[a-zA-Z0-9^\s!?]{1,50}" title="50 characters max. Alphanumeric characters, ?, !, and spaces are allowed."/>
<br>

<!--All the attributes the admin can change-->
<br>

<!--Column1-->
<div class="row">
  <div class="column">
<p><medium>Type its new name here</medium></p>
<input type="text" name="newSongName" placeholder="New name here"
pattern="[a-zA-Z0-9^\s!?]{1,50}" title="50 characters max. Alphanumeric characters, ?, !, and spaces are allowed."/>
<br>
<br>

<p><medium>Type its new artist here</medium></p>
<input type="text" name="artist"
placeholder="New artist here"
pattern="[a-zA-Z0-9^\s\x3A\x26?!\x2F\x2E]{1,30}"
title="30 characters max. Only alphanumeric characters, spaces, and the following characters are allowed: &amp; / : ! ? ."/>
<br>
<br>
</div>
<!--column1end-->
<!--Column2-->
  <div class="column">
<p><medium>Select its new genre here</medium></p>
<select name="Genres" id="Genres">
  <option value="" disabled selected>Choose a genre</option>
  <option value="Rock">Rock</option>
  <option value="Soundtrack">Soundtrack</option>
  <option value="Ukelele">Ukelele</option>
  <option value="Theatre Nerd">Theatre Nerd</option>
  <option value="Alternative">Alternative</option>
  <option value="Pop">Pop</option>
</select>
<br>
<br>

<p><medium>Select its new mood here</medium></p>
<select name="Moods" id="Moods">
  <option value="" selected>Choose a mood</option>
  <option value="Happy">Happy</option>
  <option value="Epic">Epic</option>
  <option value="Weird">Weird</option>
  <option value="Defiant">Defiant</option>
  <option value="Melancholic">Melancholic</option>
  <option value="French">French</option>
  <option value="Alternative">Alternative</option>
  <option value="Salty">Salty</option>
  <option value="Lonely">Lonely</option>
  <option value="Naughty">( ͡° ͜ʖ ͡°)</option>
</select>
<br>
<br>
 </div>
<!--EndColumn2-->
</div>
<!--EndColumns-->

<p><medium>Paste its new embedded youtube URL here </medium></p>
<input type="text" name="youtubeLink"
placeholder="New link here"
pattern="[a-zA-Z0-9\x3A\x26\x3D?\x2F\x2E\x5F\x2D]{1,200}"
title="200 characters max. Only alphanumeric characters, spaces and the following are allowed: &amp; / : = _ ! ? . -"/>
<br>
<br>
</form>


<!--the following is the php for adding to the table via the ADD button-->
<?php
if(isset($_POST['update']))
   {//connect to database
   $mysqli = new mysqli('sql209.epizy.com', 'epiz_21511524', 'xa8uCY2sZ9iF', 'epiz_21511524_MusicMoodBoard');
            if ($mysqli->connect_errno)   //error checker
                {
                // echo "Failed to connect to MySQLI"
                die("Failed to connect to MySQLI");
                }
    }
if(isset($_POST['songName']))
  {
  echo "Song name is valid!";
  }
else {
     "Song name is not valid.";
     }
?>


<!-- allow the admin to see the entire song list to choose what to update-->
<form>
<input class= "center" name="songList" value="See All Songs" type="submit">
</form>

<?php
if(isset($_POST['songList']))
   {//connect to database
   $mysqli = new mysqli('sql209.epizy.com', 'epiz_21511524', 'xa8uCY2sZ9iF', 'epiz_21511524_MusicMoodBoard');
            if ($mysqli->connect_errno)   //error checker
                {
                // echo "Failed to connect to MySQLI"
                die("Failed to connect to MySQLI");
                }
    }
?>

</body>
</html>
