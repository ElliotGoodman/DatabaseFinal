<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri
sleep(1);

$infoId = empty($_GET['infoId']) ? '0' : $_GET['infoId'];

switch($infoId) {
	case '1':
		$info = "<h3>Andrew Krall</h3>Andrew Krall<br/><br/>is gay<br/><br/><img class='img-circle' src='/images/andrew2.png' alt='Andrew'>";
		break;
	case '2':
		$info = "<h3>Elliot Goodman</h3>Elliot Goodman is an aspiring storyboarder, 3D animator, and writer. He was a group parter in the creation of this web page as a final project for his database management class, CS3380, at the University of Missouri - Columbia.<br/><br/>He only sort of enjoyed doing it.<br/><br/><img class='img-circle' src='/images/elliot.png' alt='Elliot looking grumpy'>";
		break;
	case '3':
		$info = "<h3>Aaryn Johns</h3>Aaryn Johns, 20, is an Information Technology major attending the University of Missouri - Columbia. They are also pursuing minors in Computer Science and Music. They were a group parter in the creation of this web page as a final project for both a web development course and a database management course, CS2830 and CS3380 respectively.<br/><br/>They enjoy memes, music, and sleep. They do not feel they often receive enough of these, unfortunately.<br/><br/><img class='img-circle' src='/images/IMG_5208.JPG' alt='Aaryn'>";
		break;
	default: 
		$info = ""; 
		break;
}

print $info;
?>