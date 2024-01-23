<?php
$a=$_POST['Name'];
$c=$_POST['Email'];
$b=$_POST['Address'];
$d=$_POST['Contact'];
$e=$_POST['Date'];
$f=$_POST['Time'];
$g=$_POST['CakeFlavour'];
$h=$_POST['Kg'];

$con=mysqli_connect("localhost","root","","webconnection");
$sql="insert into ordertable values('$a','$b','$c','$d','$e','$f','$g','$h')";
if(mysqli_query($con,$sql))
{
    echo "Name:- $a<br>"."Email:- $b<br>"."Address:- $c<br>"."Contact:- $d<br>"
	."Date:- $e<br>" ."Time:- $f<br>"."CakeFlavour:- $g<br>"."Kg:- $h<br>";
}
else
{
    echo "Something went wrong";
}
?>