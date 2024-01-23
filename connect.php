</head>
<body>
<?php
$host="localhost:3306";
$user="id20965447_user";
$pass="";
$dbname="id20965447_user2023";

$conn=mysqli_connect($host,$user,$pass,$dbname);
if(!$conn){
die("connection not found".mysqli_connect_error());
}
//echo("connection is ok");
if($_SERVER["REQUEST_METHOD"]=="POST"){
$Username=$_POST["username"];
$Email=$_POST["email"];
$Password=$_POST["password"];


$sql="INSERT INTO `admin`( `Username`,`Email`,`Passwors`,) VALUES ('$Username','$Email','$Password')";
if(mysqli_query($conn,$sql))
{
   
}
else{
echo("not inserted");
}
mysqli_close($conn);
}

?>