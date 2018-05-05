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
$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
if (!$loggedIn) {
header("Location: login.php");
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
.tablecenter
	{
	margin-left: auto;
	margin-right: auto;
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
table
	{
	border-collapse: collapse; /*So we don;t have duplicate borders for EVERY cell*/
	}
	table, th, td /*the actual borders*/
	{
	border: 1px solid black;
	padding: 1px 2px; /*top&bottom, right&left*/
	}
@media screen and (max-width: 600px)
	{
    .column
    	{
        width: 100%;
    	}
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
      .page-footer{
          margin-right: 0;
          padding-right: 0;
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
<input type="text" name="oldSongName" placeholder="Song name here" required
pattern="[a-zA-Z0-9^\s!?\x28\x29]{1,50}" title="50 characters max. Alphanumeric characters, ?, !, and spaces are allowed."/>
<br>

<!--All the attributes the admin can change-->
<br>

<!--Column1-->
<div class="row">
  <div class="column">
<p><medium>Type its new name here</medium></p>
<input type="text" name="newSongName" placeholder="New name here"
pattern="[a-zA-Z0-9^\s!?\x28\x29]{1,50}" title="50 characters max. Alphanumeric characters, ?, !, (, ), and spaces are allowed."/>
<br>
<br>

<p><medium>Type its new artist here</medium></p>
<input type="text" name="newArtist"
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
<select name="newGenre" id="Genre">
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
<br>
<br>

<p><medium>Select its new mood here</medium></p>
<select name="newMood" id="Mood">
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
<br>
<br>
 </div>
<!--EndColumn2-->
</div>
<!--EndColumns-->

<p><medium>Paste its new embedded youtube URL here </medium></p>
<input type="text" name="newYoutubeLink"
placeholder="New link here"
pattern="[a-zA-Z0-9\x3A\x26\x3D?\x2F\x2E\x5F\x2D]{1,200}"
title="200 characters max. Only alphanumeric characters, spaces and the following are allowed: &amp; / : = _ ! ? . -"/>
<br>
<br>

<!--update bootun-->
<input class= "center" name="update" value="Update Song" type="submit">
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
//echo "am connect";
		if($_POST['oldSongName'] != "")
		{
		$oldName = $_POST['oldSongName'];
		echo "<br>Old name is" . $oldName ;
			if($_POST['newSongName'] != "")
  			{
  			echo "<br> Song name set to change";
				echo $_POST['newSongName'] . "is the new song name.";
				$name = $_POST['newSongName'];
				$mainQuery = "UPDATE mainTable SET songName = '$name' WHERE songName = '$oldName' ;";
				$mainResult = $mysqli->query($mainQuery);
				$moodQuery = "UPDATE moods SET songName = '$name' WHERE songName = '$oldName' ;";
				$moodResult = $mysqli->query($moodQuery);
  			}
			if($_POST['newArtist'] != "")
				{
				echo "<br>Song artist set to change";
				$artist = $_POST['newArtist'];
				$query = "UPDATE mainTable SET artist = '$artist' WHERE songName = '$oldName' ;";
				$result = $mysqli->query($query);
				echo $_POST['newArtist'];
				}
			if($_POST['newGenre'] != "")
				{
     		echo "<br>newGenre set to change";
				$genre = $_POST['newGenre'];
				$query = "UPDATE mainTable SET genre = '$genre' WHERE songName = '$oldName' ;";
				$result = $mysqli->query($query);
     		}
			if($_POST['newMood'] != "")
				{
				echo "<br>Mood set to change";
				$mood = $_POST['newMood'];
				$query = "UPDATE moods SET mood = '$mood' WHERE songName = '$oldName' ;";//grade A+ 11/10 clarity of code right here
				$result = $mysqli->query($query);
				}
			if($_POST['newYoutubeLink'] != "")
				{
				echo "<br>Link set to change";
				$link = $_POST['newYoutubeLink'];
				$query = "UPDATE mainTable SET newYoutubeLink = '$link' WHERE songName = '$oldName' ;";
				$result = $mysqli->query($query);
				}
		}
else
	{
	echo "Bro you didn't set the original song's name";
	}
}
?>


<!-- allow the admin to see the entire song list to choose what to update-->
<form action="" method="POST">
<input class= "center" name="songList" value="See All Songs" type="submit">
</form>

<?php
//show whoel tabel
if(isset($_POST['songList']))
{
   $mysqli = new mysqli('sql209.epizy.com', 'epiz_21511524', 'xa8uCY2sZ9iF', 'epiz_21511524_MusicMoodBoard');
  	if ($mysqli->connect_errno)   //error checking
        {
        echo "Failed to connect to MySQLI";
        die("Failed to connect to MySQLI");
        }

		else
		{
		$query = "SELECT mainTable.songname, moods.mood, artist, youtubeLink FROM mainTable
		INNER JOIN moods
		ON mainTable.songName = moods.songName;";
		$result = $mysqli->query($query);
//tablestuff------------------------------------------
		echo "<table class = 'tablecenter'>";//table form
    echo "<thead>";//table heads
      while($fieldInfo = mysqli_fetch_field($result))
        {
        echo "<th>". $fieldInfo->name. "</th>";
        }
      echo "</thead>";
      while($row = $result->fetch_assoc())
        {
        echo "<tr>"; //tr is the start of the row
        foreach($row as $r)
          {
          echo "<td>" . $r . "</td>"; //td is a new cell
          }
        echo "</tr>";
        }
      echo "</table>";
		}
}
?>

<?php
    require "footer.php";
    ?>
</body>
</html>
