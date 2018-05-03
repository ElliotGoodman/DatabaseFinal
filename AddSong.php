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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    	<link href="app.css" rel="stylesheet" type="text/css">
    <link href="../jQuery/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="../jQuery/external/jquery/jquery.js"></script>
    <script src="../jQuery/jquery-ui.min.js"></script>
    <!--nice style sheet-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Add A Song! </title>
<style>
.center
  {
  text-align:center;
  }
  h1{
      background-color: darkorange;
      color: white;
      font-family: Arial;
    }
    h4{
      color: black;
      font-family: Arial;
    }
    p{
      font-family: Arial;
      font-size: 1.5em;
    }
</style>
</head>
<body>
  <div class="center">
<h1>Add A Song to Our Database! </h1>

<form action="" method="POST">

<br><br>
<p><medium><font size="+1"> What's its name?</font></medium></p>

<input type="text" name="songName"
placeholder="Song name here" required
pattern="[a-zA-Z0-9^\s!?]{1,50}"
title="50 characters max. Alphanumeric characters, ?, !, and spaces are allowed."/> <!--between 1 and 50 alphanumeric characters, space and ! allowed-->

<br>
<small>Only alphanumeric characters and spaces are allowed, up to 50</small>

<br>
<br>
<p>Pick its genre</p>

  <select name="Genres" id="Genres" required>
    <option value="" disabled selected>Choose a genre</option>
    <option value="Rock">Rock</option>
    <option value="Soundtrack">Soundtrack</option>
    <option value="Ukelele">Ukelele</option>
    <option value="Theatre Nerd">Theatre Nerd</option>
    <option value="Alternative">Alternative</option>
    <option value="Pop">Pop</option>
  </select>

<br><br>
<p>Pick its mood:</p>
  <select name="Moods" id="Moods" required>
    <option value="" disabled selected>Choose a mood</option>
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

<br><br>
<p>Who's the artist?</p>
<input type="text" name="artist"
placeholder="Artist here"
pattern="[a-zA-Z0-9^\s\x3A\x26?!\x2F\x2E]{1,30}"
title="30 characters max. Only alphanumeric characters, spaces, and the following characters are allowed: &amp; / : ! ? ."/>
<!--space, colon, ampersand, forward slash,period allowed-->
<br>
<small>30 characters max. Only alphanumeric characters, spaces, and the following are allowed: / ! ? : .</small>

<br><br>
<p>Add a embedded Youtube link if possible</p>
<small> To get a Youtube video's embedded link, click the "share" button <br>
under the Youtube video, then click "embed", and copy the url that's listed in quotes.</small>
<br>

<input type="text" name="youtubeLink"
placeholder="Link here"
pattern="[a-zA-Z0-9\x3A\x26\x3D?\x2F\x2E\x5F\x2D]{1,200}"
title="200 characters max. Only alphanumeric characters, spaces and the following are allowed: &amp; / : = _ ! ? . -"/>
<!--colon, ampersand, equals sign, forward slash, period, underscore, hyphen -->

<br><br>
<input name="ADD" value="ADD" type="submit">
</form>

<br><br><br>
<form class="center" action = "http://naganadel.epizy.com/MoodBoard_index.php">
<input name="search" value="Back to the MoodBoard" type="submit">
</form>


<!--the following is the php for adding to the table via the ADD button-->
<?php
if(isset($_POST['ADD']))
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
  echo "Song name is set!";
  }
else {
     "Song name is not set.";
     }

$genre = $_POST['Genres'];
$artist = $_POST['artist'];
$mood = $_POST['Moods'];
$link = $_POST['youtubeLink'];
$_SESSION['ytlink'] = $link;

$mainQuery = "INSERT INTO mainTable (songName, genre, artist, youtubeLink) VALUES ('" . $_POST['songName'] . "','$genre','$artist','$link');";
$mainResult = $mysqli->query($mainQuery);

$moodQuery = "INSERT INTO moods (songName, mood) VALUES ('" . $_POST['songName'] . "','$mood');";
$moodResult = $mysqli->query($moodQuery);

if(isset($_SESSION['ytlink'])) {
  header("Location:ytpage.php");
}
else {
  echo "YouTube link not set properly.";
}

require "footer.php";
?>
  </div> 
</body>
</html>
