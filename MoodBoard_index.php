<!DOCTYPE html>
<html>
<head>
<title>Musical Mood Board </title>
</head>
<body>
<h1>Musical Mood Board </h1>
<p>Search Music</p>


<!--The two forms for people to choose what kind of music to search for-->
<form action="" method="POST">
<p>by Genre</p>
  <select name="Genres" id="Genres">
    <option value="" disabled selected>Choose a genre</option>
    <option value="Rock">Rock</option>
    <option value="Soundtrack">Soundtrack</option>
    <option value="Ukelele">Ukelele</option>
    <option value="Theatre Nerd">Theatre Nerd</option>
    <option value="Alternative">Alternative</option>
    <option value="Pop?">Pop</option>
  </select>


<p>and/or by Mood</p>
  <select name="Moods" id="Moods">
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
<input name="GO" value="GO" type="submit">
</form>

<br>
<p>Enter nothing to see the whole table!</p>
<p>Song adding coming soon!</p>

<?php
if(isset($_POST['GO']))
   {//connect to database
   $mysqli = new mysqli('sql209.epizy.com', 'epiz_21511524', 'xa8uCY2sZ9iF', 'epiz_21511524_MusicMoodBoard');
            if ($mysqli->connect_errno)   //error checker
                {
                // echo "Failed to connect to MySQLI"
                die("Failed to connect to MySQLI");
                }
            else
              echo "Ey bby it actually worked lel";
              echo "<br/>";
              echo "Genre set as: " . $_POST['Genres'];
              echo "<br/>";
              echo "Mood set as: " . $_POST['Moods'];

    //conditions
   if(isset($_POST['Genres']) && isset($_POST['Moods'])) //if both forms are filled, return only the records of the specified Genre and Mood
      {
        $genre = $_POST['Genres'];
        $mood = $_POST['Moods'];
        $genreQuery =  "SELECT songName, artist, youtubeLink FROM mainTable WHERE genre ='" .  $genre . "';";
        $moodQuery =  "SELECT mood FROM moods WHERE mood ='" .  $mood . "';";
        $genreResult = $mysqli->query($genreQuery);
        $moodResult = $mysqli->query($moodQuery);

        while($row = $genreResult->fetch_assoc()) //Returns name, artist, and link
        {
          foreach($row as $r)
            {
            print("\n<br/>I have " . $r . " in my pocket\n<br/>");
            }
        }

        while($row = $moodResult->fetch_assoc()) //Returns mood, though this may be unnecessary
        {
          foreach($row as $r)
            {
            print("\n<br/>I have " . $r . " in my pocket\n<br/>");
            }
        }
      }
   else if(isset($_POST['Genres'])) //if only Genre is filled, return all records of this genre
      {
        //echo "<br/>";
        //echo "Into Loop";
        $genre = $_POST['Genres'];
        $query =  "SELECT songName, artist, youtubeLink FROM mainTable WHERE genre ='" .  $genre . "';";
        $result = $mysqli->query($query);

        while($row = $result->fetch_assoc())
        {
          foreach($row as $r)
          {
          print("\n<br/>I have only this genre " . $r . " in my pocket\n<br/>");
          }
        }

      }
   else if(isset($_POST['Moods']))  //see above
      {
        $mood = $_POST['Moods'];
        $query =  "SELECT mainTable.songName, artist, youtubeLink FROM mainTable
        INNER JOIN moods
        ON mainTable.songName = moods.songName
        WHERE moods.mood ='" .  $mood . "';";
        $result = $mysqli->query($query);

        while($row = $result->fetch_assoc())
        {
          foreach($row as $r)
          {
          print("\n<br/>I have only this mood " . $r . " in my pocket\n<br/>");
          }
        }

      }
   else //if neither are filled, return everything
    {
      $query = "SELECT * FROM mainTable
      INNER JOIN moods
      ON mainTable.songName = moods.songName;";

      while($row = $result->fetch_assoc())
      {
        foreach($row as $r)
        {
        print("\n<br/>I have only this mood " . $r . " in my pocket\n<br/>");
        }
      }
    }

  }
?>

</body>
</html>
