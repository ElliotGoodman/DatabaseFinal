<!DOCTYPE html>

<!-- This document was created on 04 May 2018 by Andrew Krall, 16190080-->
<!-- Purpose: CS2830/CS3380 Final Project-->

<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
?>

<html>
    
    <head>
        
        <!-- Bootstrap Links -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script><!-- Latest compiled and minified JavaScript -->
        
        <title>Delete A Song</title> 
        <meta charset="utf-8"> 
        
        <script
  src="https://code.jquery.com/jquery-3.1.1.js"
  integrity="sha256-16cdPddA6VdVInumRGo6IbivbERE8p7CQR3HzTBuELA="
  crossorigin="anonymous"></script>
        
        <style>

        </style>
        
    </head>
    
    <body>
        
        <div class="testStyle">
            <br>
            
            
            <div id="resultPane">
            </div>
            <form action="" method="POST">
            
                <label for="password">Enter the song you want to delete:</label>
                <input type="text" name="oldSong">
            
                <input type="submit" name="submit" value="Submit">
                
            </form>
            
            
            
            
        </div>
        
        <div>
            <?php
                 if(isset($_POST['submit']) && isset($_POST['oldSong'])){
                     $oldSong = $_POST['oldSong'];
                     //Change to whatever database credentials file we use.
                     include "db.conf";
                     //Change to whatever the global variables are named in the file.
                     $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                     if ($mysqli->connect_errno) { //Terminate script if there is a connection error
                         echo "Failed to connect to MySQLI on Line 5";
                         exit();
                     }
                     
                     //This is an interesting way to do it, but this is what I'm gonna do: First, I'm gonna get the number of rows from the main table and save the number of rows into a variable. Then, I'm gonna run the delete function. Lastly, I'm gonna get the number of rows from the main table again. If newRowNum == oldRowNum - 1, then success, else false.
                     
                     //First, get the number of rows from the mainTable.
                     $sql = "SELECT * FROM `mainTable`";
                     $result = $mysqli->query($sql) or die ($mysqli->error);
                     $oldNumRows = $result->num_rows;
                     
                     //Now, try to delete from the mainTable.
                     $sql = "DELETE FROM `mainTable` WHERE `songName`=?";                     
                     $stmt = $mysqli->stmt_init();
                     if(!$stmt->prepare($sql)) {
                         exit();
                     }
                     
                     $stmt->bind_param("s", $oldSong);
                     $stmt->execute();
                     $result = $stmt->get_result();
                     
                     //Now, get the number of rows from the mainTable again.
                     $sql2 = "SELECT * FROM `mainTable`";
                     $result2 = $mysqli->query($sql2) or die ($mysqli->error);
                     $newNumRows = $result2->num_rows;
                     
                     if($oldNumRows != $newNumRows) {
                         echo "<br>Record successfully deleted from mainTable.";
                     }
                     else {
                         echo "<br>Record unable to be deleted from mainTable. Perhaps it does not exist in the table?";
                     }
                     
                     
                     
                     //Now, we do the same thing with the moods table!
                     
                     //First, get the number of rows from the mainTable.
                     $sql = "SELECT * FROM `moods`;";
                     $result = $mysqli->query($sql);
                     if(!$mysqli->error) {
                         //Success
                     }
                     else {
                         echo "<br>Error";
                     }
                     $oldNumRows = $result->num_rows;
                     
                     //Handle the deletion in the moods table.
                     
                     $sql = "DELETE FROM `moods` WHERE `songName`=?";                     
                     $stmt = $mysqli->stmt_init();
                     if(!$stmt->prepare($sql)) {
                         exit();
                     }
                     
                     $stmt->bind_param("s", $oldSong);
                     $stmt->execute();
                     $result = $stmt->get_result();
                     
                     //Now, get the number of rows again from the moods table!
                      
                     $sql2 = "SELECT * FROM `moods`;";
                     $result2 = $mysqli->query($sql2) or die ($mysqli->error);
                     $newNumRows = $result2->num_rows;

                     if($oldNumRows != $newNumRows){
                         echo "<br>Record successfully deleted from the moods table!";
                     }
                     else {
                         echo "<br>Record unable to be deleted from the moods table. Perhaps it does not exist in the table?";
                     }
                    } 
                ?>
        </div>
        
    </body>

</html>

