<!DOCTYPE html>
<html>
<head> <!--nice style sheet-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"><!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css"><!-- Optional theme -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Add A Song! </title>
</head>
<body>
<h1>Add A Song to Our Database! </h1>

<form action="" method="POST">

<p><medium> What's its name?</medium></p>
<small>Only alphanumeric characters and spaces are allowed, up to 50</small>
<br>

<input type="text" name"songName"
placeholder="Song name here" required
pattern="[a-zA-Z0-9^\s]{1,50}"/> <!--between 1 and 50 alphanumeric characters-->

<br>
Pick its genre
<br>
  <select name="Genres" id="Genres" required>
    <option value="" disabled selected>Choose a genre</option>
    <option value="Rock">Rock</option>
    <option value="Soundtrack">Soundtrack</option>
    <option value="Ukelele">Ukelele</option>
    <option value="Theatre Nerd">Theatre Nerd</option>
    <option value="Alternative">Alternative</option>
    <option value="Pop?">Pop</option>
  </select>

<br>
Pick its mood:
<br>
  <select name="Moods" id="Moods" required>
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

<br>
<p>Add a Youtube link if possible</p>
<br>
<input type="text" name="youtubeLink"
placeholder="Link here"
pattern="[a-zA-Z0-9_-=&?/]{1,200}"/>

<br><br>
<input name="ADD" value="ADD" type="submit">
</form>

</body>
</html>
