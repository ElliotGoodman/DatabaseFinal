<?php 
/**/

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
    <title>MoodBoard Creators!</title>
    
    	<link href="app.css" rel="stylesheet" type="text/css">
    <link href="../jQuery/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="../jQuery/external/jquery/jquery.js"></script>
    <script src="../jQuery/jquery-ui.min.js"></script>
    <!--nice style sheet-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    
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
    body {
			font-family: arial, helvetica, sans-serif;
			font-size: 12pt;
		}
		#infoBox {
			border: 1px solid white;
			padding: 10px;
			width: 375px;
			min-height: 1px;
   margin: auto;
   display: block;
		}
img {
    height: 300px;
    width: auto;
        }
input[type=button]{
    background-color: darkorange;
    border: 1px solid black;
    color: white;
    padding: 2px;
    margin: 3px;
    cursor: pointer;
    height: 75px;
    width: 113px;
    font-size: 2em;
    font-family: sans-serif, Arial, Helvetica;
    border-radius: 20px 67px 40px;
        }
</style>
    
<script>

     function updateInfo(ID){
         var xmlHttp = new XMLHttpRequest();
         
         xmlHttp.onload = function(){
             if (xmlHttp.status == 200){
                document.getElementById("infoBox").innerHTML = xmlHttp.responseText;
             }
         }
         
         var reqURL = "updateInfo.php?infoId=" + ID;
         
         xmlHttp.open("GET", reqURL, true);
         xmlHttp.send();
     }
	
	</script>
    
    </head>
<body>
    <div class="center"><h1>Meet the Creators!</h1>
    
    <input type="button" value="Andrew" onclick="updateInfo('1')">
    <input type="button" value="Elliot" onclick="updateInfo('2')">
    <input type="button" value="Aaryn" onclick="updateInfo('3')">
    
    <div id="infoBox"></div>
    </div>
    
    <?php 
    require "footer.php";
    ?>
    </body>
</html>