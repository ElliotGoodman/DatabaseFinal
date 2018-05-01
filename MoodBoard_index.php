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
<html>
<head> <!--nice style sheet-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Musical Mood Board </title>
  <style>
    table
      {
      border-collapse: collapse; /*So we don;t have duplicate borders for EVERY cell*/
      }

      table, th, td /*the actual borders*/
      {
      border: 1px solid black;
      padding: 1px 2px; /*top&bottom, right&left*/
      }
    .center
      {
      text-align:center;
      }
  </style>
</head>
<body>
  <div class="center">
<h1>Musical Mood Board </h1>
<h4>Search Music</h4>


<!--The two forms for people to choose what kind of music to search for-->
<form action="" method="GET">
<p>by Genre</p>
  <select name="Genres" id="Genres">
    <option value="" disabled selected>Choose a genre</option>
    <option value="Rock">Rock</option>
    <option value="Soundtrack">Soundtrack</option>
    <option value="Ukelele">Ukelele</option>
    <option value="Theatre Nerd">Theatre Nerd</option>
    <option value="Alternative">Alternative</option>
    <option value="Pop">Pop</option>
  </select>

<br><br>
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

<br><br>
<form class="center" action = "http://naganadel.epizy.com/AddSong.php">
<input name="search" value="Add a Song Here!" type="submit">
</form>

<?php
if(isset($_GET['GO']))
   {//connect to database
   $mysqli = new mysqli('sql209.epizy.com', 'epiz_21511524', 'xa8uCY2sZ9iF', 'epiz_21511524_MusicMoodBoard');
            if ($mysqli->connect_errno)   //error checker
                {
                // echo "Failed to connect to MySQLI"
                die("Failed to connect to MySQLI");
                }
            else
          //  echo "Ey bby it actually worked lel";
          //  echo "<br/>";
              echo "Genre set as: " . $_GET['Genres'];
              echo "<br/>";
              echo "Mood set as: " . $_GET['Moods'];

    //conditions
   if(isset($_GET['Genres']) && isset($_GET['Moods'])) //if both forms are filled, return only the records of the specified Genre and Mood
      {
        $genre = $_GET['Genres'];
        $mood = $_GET['Moods'];

        $query =  "SELECT mainTable.songName, artist, youtubeLink FROM mainTable
        INNER JOIN moods
        ON mainTable.songName = moods.songName
        WHERE moods.mood ='" .  $mood . "' AND mainTable.genre ='" .  $genre . "';";
        $result = $mysqli->query($query);

//tablestuff------------------------------------------
        echo "<table align = center>";//table form
        echo "<thead>";//table heads
        echo "<br> Number of Entries:" . $result->num_rows; //the number of entries
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
//end tablestuff-----------------------------------------
      }
   else if(isset($_GET['Genres'])) //if only Genre is filled, return all records of this genre
      {
        //echo "<br/>";
        //echo "Into Loop";
        $genre = $_GET['Genres'];
        $query =  "SELECT songName, artist, youtubeLink FROM mainTable WHERE genre ='" .  $genre . "';";
        $result = $mysqli->query($query);

//tablestuff------------------------------------------
        echo "<table align = center>";//table form
        echo "<thead>";//table heads
        echo "<br> Number of Entries:" . $result->num_rows; //the number of entries
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
//end tablestuff-----------------------------------------
      }
   else if(isset($_GET['Moods']))  //see above
      {
        $mood = $_GET['Moods'];
        $query =  "SELECT mainTable.songName, artist, youtubeLink FROM mainTable
        INNER JOIN moods
        ON mainTable.songName = moods.songName
        WHERE moods.mood ='" .  $mood . "';";
        $result = $mysqli->query($query);

//tablestuff------------------------------------------
        echo "<table align = center>";//table form
        echo "<thead>";//table heads
        echo "<br> Number of Entries:" . $result->num_rows; //the number of entries
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
//end tablestuff-----------------------------------------

      }
   else //if neither are filled, return everything
    {
      $query = "SELECT mainTable.songname, moods.mood, artist, youtubeLink FROM mainTable
      INNER JOIN moods
      ON mainTable.songName = moods.songName;";
      $result = $mysqli->query($query);
//tablestuff------------------------------------------
      echo "<table align = center>";//table form
      echo "<thead>";//table heads
      echo "<br> Number of Entries:" . $result->num_rows; //the number of entries
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
//end tablestuff-----------------------------------------
      }
  }
?>

</body>
</html>
