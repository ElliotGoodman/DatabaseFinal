<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="This page will show the YouTube videos that are sent to this page via GET.">
        <meta name="author" content="Andrew Krall">

        <title>YouTube Page</title>

        <script
            src="https://code.jquery.com/jquery-3.2.1.min.js"
            integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="
            crossorigin="anonymous"></script>

        <!-- Bootstrap core CSS -->
        <link href="startbootstrap-simple-sidebar-gh-pages/startbootstrap-simple-sidebar-gh-pages/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Bootstrap core JavaScript -->
        <script src="startbootstrap-simple-sidebar-gh-pages/startbootstrap-simple-sidebar-gh-pages/vendor/jquery/jquery.min.js"></script>
        <script src="startbootstrap-simple-sidebar-gh-pages/startbootstrap-simple-sidebar-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <link rel="stylesheet" type="text/css" href="Main.css">
    </head>
    <body>

        <?php
            if(isset($_SESSION['ytlink'])) {
                //The YouTube link is set. Echo out an embedded video.
                echo "<iframe src='" . $_SESSION['ytlink'] . "'></iframe>";
            }
            else {
                echo "The YouTube video link is invalid.";
            }
        ?>

    </body>
</html>
