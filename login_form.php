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
	<title>MoodBoard Login</title>
    <script>
        $(function(){
            $("input[type=submit]").button();
        });
    </script>
    <style>
          .page-footer{
          margin-right: 0;
          padding-right: 0;
      }</style>
</head>
<body>
    
    <div id="loginWidget" class="ui-widget">
        <h1 class="ui-widget-header">Login</h1>
        
        <?php
            if ($error) {
                print "<div class=\"ui-state-error\">$error</div>\n";
            }
        ?>
        
        <form action="login.php" method="POST">
            
            <input type="hidden" name="action" value="do_login">
            
            <div class="stack">
                <label for="username">User name:</label>
                <input type="text" id="username" name="username" class="ui-widget-content ui-corner-all" autofocus value="<?php print $username; ?>">
            </div>
            
            <div class="stack">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" class="ui-widget-content ui-corner-all">
            </div>
            
            <div class="stack">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
<br/><br/>
<!-- Original source code for footer: https://mdbootstrap.com/components/bootstrap-footer/      -->
<!--Footer-->
<footer class="page-footer font-small black">

    <!--Footer Links-->
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12">
                <h5 class="text-uppercase">Links</h5>
                <ul class="list-unstyled">
                    <li>
                        <a href="#!">Meet the creators!</a>
                    </li>
<!--
                    <li>
                        <a href="login.php">Login to Update and Delete</a>
                    </li>
-->
<!--
                    <li>
                        <a href="#!">Link 3</a>
                    </li>
                    <li>
                        <a href="#!">Link 4</a>
                    </li>
-->
                </ul>
            </div>
        </div>
    </div>
    <!--/.Footer Links-->

</footer>
<!--/.Footer-->
</body>
</html>
