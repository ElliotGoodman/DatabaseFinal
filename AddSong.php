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
<title>Add A Song!</title>
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
<h1>Add A Song to MoodBoard! </h1>

<form action="" method="POST">

<br><br>
<p>Title</p>

<input type="text" name="songName"
placeholder="Song title here" required
pattern="[a-zA-Z0-9^\s!?\x28\x29]{1,50}"
title="50 characters max. Alphanumeric characters, ', ?, !, (, ), and spaces are allowed."/> <!--between 1 and 50 alphanumeric characters, space and ! allowed-->

<br>
<small>Only alphanumeric characters and spaces are allowed, up to 50</small>

<br>
<br>
<p>Genre</p>

  <select name="Genres" id="Genres" required>
    <option value="" disabled selected>Choose a genre</option>
    <option value="African">African</option>
    <option value="Asian">Asian</option>
    <option value="Avant-garde">Avant-garde</option>
    <option value="Ballroom">Ballroom dance music</option>
    <option value="Blues">Blues</option>
    <option value="Caribbean and Caribbean-influenced">Caribbean and Caribbean-influenced</option>
    <option value="Comedy">Comedy</option>
    <option value="Country">Country</option>
    <option value="Easy Listening">Easy Listening</option>
    <option value="Difficult Listening">Difficult Listening</option>
    <option value="Electronic">Electronic</option>
    <option value="Filmi">Filmi</option>
    <option value="Folk">Folk</option>
    <option value="Hip hop">Hip hop</option>
    <option value="Jazz">Jazz</option>
    <option value="Incidental Music">Incidental</option>
    <option value="Latin">Latin</option>
    <option value="Musical">Musical</option>
    <option value="Occasional">Occasional music</option>
    <option value="Pop">Pop</option>
    <option value="R&B">Rhythm and Blues</option>
    <option value="Regional or national music">Regional or national music</option>
    <option value="Religious">Religious</option>
    <option value="Rock">Rock</option>
    <option value="Soca">Soca</option>
    <option value="Soul">Soul</option>
    <option value="Soundtrack">Soundtrack</option>
    <option value="Video Game">Video Game Music</option>
  </select>

<br><br>
<p>Mood</p>
  <select name="Moods" id="Moods" required>
    <option value="" disabled selected>Choose a mood</option>
    <option value="Ambient">Ambient</option>
    <option value="Bored">Bored</option>
    <option value="Defiant">Defiant</option>
    <option value="Encouraging">Encouraging</option>
    <option value="Epic">Epic</option>
    <option value="Furious">Furious</option>
    <option value="Grandiose">Grandiose</option>
    <option value="Hurt">Hurt</option>
    <option value="Indifferent">Indifferent</option>
    <option value="Joyful">Joyful</option>
    <option value="Lonely">Lonely</option>
    <option value="Longing">Longing</option>
    <option value="Melancholic">Melancholic</option>
    <option value="Romantic">Romantic</option>
    <option value="Righteous">Righteous</option>
    <option value="Tranquil">Tranquil</option>
    <option value="Tired">Tired</option>
    <option value="Weird">Weird</option>
    <option value="Villainous">Villainous</option>
    <option value="Other">Other</option>
    <option value="None">None</option>
    <option value="Naughty">( ͡° ͜ʖ ͡°)</option>
</select>

<br><br>
<p>Artist/Composer</p>
<input type="text" name="artist"
placeholder="Artist here"
pattern="[a-zA-Z0-9^\s\x3A\x26?!\x2F\x2E]{1,30}"
title="30 characters max. Only alphanumeric characters, spaces, and the following characters are allowed: &amp; / : ! ? ."/>
<!--space, colon, ampersand, forward slash,period allowed-->
<br>
<small>30 characters max. Only alphanumeric characters, spaces, and the following are allowed: / ! ? : .</small>

<br><br>
<p>YouTube Link (Optional)</p>
<br>

<input type="text" name="youtubeLink"
placeholder="Link here"
pattern="[a-zA-Z0-9\x3A\x26\x3D?\x2F\x2E\x5F\x2D]{1,200}"
title="200 characters max. Only alphanumeric characters, spaces and the following are allowed: &amp; / : = _ ! ? . -"/>
<!--colon, ampersand, equals sign, forward slash, period, underscore, hyphen -->
<br>
<small>Do not post a link to a playlist</small>

<br><br>
<input name="ADD" value="ADD" type="submit">
</form>
<!--

<br><br><br>
<form class="center" action = "http://naganadel.epizy.com/MoodBoard_index.php">
<input name="search" value="Back to the MoodBoard" type="submit">
</form>
-->
<?php
require "footer.php";
      ?>


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
//if(isset($_POST['songName']))
//  {
//  echo "Song name is set!";
//  }
//else {
//     "Song name is not set.";
//     }

$songName = $_POST['songName'];
$songName = $mysqli->real_escape_string($songName);

$genre = $_POST['Genres'];
$genre = $mysqli->real_escape_string($genre);

$artist = $_POST['artist'];
$artist = $mysqli->real_escape_string($artist);

$mood = $_POST['Moods'];
$mood = $mysqli->real_escape_string($mood);

$link = $_POST['youtubeLink'];
if($link != ""){
    $link = substr($link, 32);
    //$_SESSION['ytlink'] = $link;
    $embed = "<iframe width='187' height='105' src='https://www.youtube.com/embed/$link' frameborder='0' allow='encrypted-media' allowfullscreen></iframe>";
    $embed = $mysqli->real_escape_string($embed);
}else{
    $link = "";
}



$mainQuery = "INSERT INTO mainTable (songName, genre, artist, youtubeLink) VALUES ('$songName','$genre','$artist','$embed');";
$mainResult = $mysqli->query($mainQuery);

$moodQuery = "INSERT INTO moods (songName, mood) VALUES ('$songName','$mood');";
$moodResult = $mysqli->query($moodQuery);

//if(isset($_SESSION['ytlink'])) {
//  header("Location:ytpage.php");
//}
//else {
//  echo "YouTube link not set properly.";
//}

if($moodResult == "TRUE"){
    header("Location: MoodBoard_index.php");
    exit;
}else{
    echo "<script type='text/javascript'>alert('Insertion into the MoodBoard failed. Please try again.');</script>";
}
?>
  </div>
</body>
</html>
