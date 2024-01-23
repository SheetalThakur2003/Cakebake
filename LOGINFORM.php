<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="omg.css"/>
</head>
<body>
<?php
$host = "localhost";
$user = "id20965447_admin";
$pass = "Varshakharolia@1234";
$dbname = "id20965447_login_db";

$conn = mysqli_connect($host, $user, $pass, $dbname);
if (!$conn) {
    die("Connection not found: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Username = isset($_POST["username"]) ? $_POST["username"] : '';

    $Email = $_POST["email"];
    $Password = $_POST["password"];

    $sql = "INSERT IGNORE INTO `admin`(`Username`, `Email`, `Password`) VALUES ('$Username', '$Email', '$Password')";

    if (mysqli_query($conn, $sql)) {
        // Data inserted successfully
    } else {
        echo "Error inserting data: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>



<div class="main">
    <input type="checkbox" id="chk" aria-hidden="true"/>
    <div class="signup">
        <form method="POST" action="">
            <label for="chk" aria-hidden="true" class="sajan">Sign Up</label>
            <input type="text" name="username" placeholder="Username"/>
            <input type="email" name="email" placeholder="Email"/>
            <input type="password" name="password" placeholder="Password"/>
            <button type="submit">Submit</button>
        </form>
    </div>
    
    <div class="login">
        <form method="POST" action="">
            <label for="chk" aria-hidden="true">Login</label>
            <input type="email" name="email" placeholder="Email"/>
            <input type="password" name="password" placeholder="Password"/>
            <button type="submit">Login</button>
        </form>
    </div>
    <?php
$con = mysqli_connect("localhost", "root", "", "login_db");
if ($con === false) {
    die("Connection error: " . mysqli_connect_error());
}

// Check if the email and password fields are set before accessing them
if (isset($_POST['email']) && isset($_POST['password'])) {
    $Email = mysqli_real_escape_string($con, $_POST['email']);
    $Password = mysqli_real_escape_string($con, $_POST['password']);

    $sql = "SELECT * FROM admin WHERE email='$Email' AND password='$Password'";
    $result = mysqli_query($con, $sql);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $Email = $row['email'];
            $Password = $row['password'];
            echo "<b>Your Email is: <u>$Email</u><br>Your Password is: <u>$Password</u></b><br><h4>You are logged in successfully.</h4>";
    
            // Redirect the user to index.html
            header("Location: index.html");
            exit();
        } else {
            echo "<h3>RECORD NOT FOUND</h3>";
        }
    } else {
        echo "Query error: " . mysqli_error($con);
    }
} else {
    // Handle the case when the email or password field is not present
    // Display an error message or redirect the user back to the login page
    exit("Email or password field is missing.");
}

mysqli_close($con);
?>


</div>
</body>
</html>