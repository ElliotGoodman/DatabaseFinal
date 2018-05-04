<?php 
/*Written by Aaryn Johns and references code for Bootstrap footer at: https://mdbootstrap.com/components/bootstrap-footer/ */
?>
<!DOCTYPE html>
    <html lang="en">
<head>
    <meta charset="utf-8">
    <title>Footer for MoodBoard</title>
    
    <link href="app.css" rel="stylesheet" type="text/css">
    <link href="../jQuery/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="../jQuery/external/jquery/jquery.js"></script>
    <script src="../jQuery/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
    </head>
<body>
    <br/><br/>
    <!--Footer-->
<footer class="page-footer font-small black">

    <!--Footer Links-->
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled">
                    <li>
                        <?php
                        $getWholeUrl = "https://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."";
                        
                        if($getWholeUrl != "https://naganadel.epizy.com/MTC.php"){
                            echo "<a href='MTC.php'>Meet the Creators!</a>";
                        }
                        ?>
                    </li>
                    <li>
                        <?php 

                        $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
                            if ($loggedIn) {
                                //getWholeUrl found at https://stackoverflow.com/questions/39598867/php-check-if-the-url-contains-slash-at-the-end
                                $getWholeUrl = "https://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."";
                                
                                if ($getWholeUrl == "https://naganadel.epizy.com/MoodBoard_index.php"){
                                   echo "<a href='UpdateScreen2(Centered).php'>Update MoodBoard</a>"; 
                                }else{
                                    echo "<a href='MoodBoard_index.php'>Back to Home</a>";
                                }
                                if ($getWholeUrl == "https://naganadel.epizy.com/UpdateScreen2(Centered).php"){
                                   echo "<br><a href='deleteSong.php'>Delete from MoodBoard</a>"; 
                                }
                            }else{
                                $getWholeUrl = "https://".$_SERVER['HTTP_HOST']."".$_SERVER['REQUEST_URI']."";
                                
                                if ($getWholeUrl == "https://naganadel.epizy.com/login.php" || $getWholeUrl == "https://naganadel.epizy.com/MTC.php"){
                                   echo "<a href='MoodBoard_index.php'>Back to Home</a>"; 
                                }
                            }
                        ?>
                    </li>
                    <li>
                        <?php 

                        $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
                            if (!$loggedIn) {
                                echo "<a href='login.php'>Login</a>";
                            }else{
                                echo "<a href='logout.php'>Logout</a>";
                            }                                
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/.Footer Links-->

</footer>
<!--/.Footer-->
    </body>
    </html>
