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
            <form action="login.php" method="POST">
            
                <label for="password">Password:</label>
                <input type="text" name="oldSong">
            
                <input type="submit" name="submit" value="Submit">
                
            </form>
            
            
            
            
        </div>
        
        <div>
            <?php
                 if(isset($_POST['delete']) && isset($_POST['oldSong'])){
                     $oldSong = $_POST['oldSong'];
                     //Change to whatever database credentials file we use.
                     include "db.conf";
                     //Change to whatever the global variables are named in the file.
                     $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
                     if ($mysqli->connect_errno) { //Terminate script if there is a connection error
                         echo "Failed to connect to MySQLI on Line 5";
                         exit();
                     }
                     //First, delete from the mainTable.
                     $sql = "DELETE FROM `mainTable` WHERE `songName`=?";                     
                     $stmt = $mysqli->stmt_init();
                     if(!$stmt->prepare($sql)) {
                         exit();
                     }
                     
                     $stmt->bind_param("s", $oldSong);
                     $stmt->execute();
                     $result = $stmt->get_result();
                     

                     if(!(false == $result)){
                         echo "Record successfully deleted from the mainTable!";
                     }
                     else {
                         echo "There was an error when trying to delete the record from the mainTable.";
                     }
                     //Then, delete from the moods table.
                     $sql = "DELETE FROM `moods` WHERE `songName`=?";                     
                     $stmt = $mysqli->stmt_init();
                     if(!$stmt->prepare($sql)) {
                         exit();
                     }
                     
                     $stmt->bind_param("s", $oldSong);
                     $stmt->execute();
                     $result = $stmt->get_result();
                      

                     if(!(false == $result)){
                         echo "Record successfully deleted from the moods table!";
                     }
                     else {
                         echo "There was an error when trying to delete the record from the moods table.";
                     }
                    } 
                ?>
        </div>
        
    </body>

</html>

