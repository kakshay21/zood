<?php

$conn=mysqli_connect("localhost","root","","zoodify");
if(!$conn){
	die("Connection failed: ".mysqli_connect_error());
}
?>