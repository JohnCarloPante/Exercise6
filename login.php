<?php
$hostname = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "dbg9"; 

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    // Directly using a query (not recommended for production!)
    $query = "SELECT ID FROM accounts WHERE Username= ? AND Password= ?";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stored_password = $row['Password'];

        // Compare plaintext passwords
        if ($input_password === $stored_password) {
            $_SESSION['loggedin'] = true;
            $_SESSION['Username'] = $input_username;
            header("Location: index.php");
            exit();
        } else {
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Invalid username or password.";
    }
}


$conn->close();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Login</title>
    </head>
<body>
<div>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
    <form method="POST" action="">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
</div>

<style>
* {
  box-sizing: border-box;
}

body{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  background-color: rgb(68, 68, 68);
  position: relative;
  align-self: center;
}


input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
  font-size: 16px;
}

/* Extra styles for the cancel button */


.lgnbtn {
  background-color: rgb(54, 54, 54);
}

.cancelbtn , .lgnbtn , .signupbtn {
  box-shadow: 0 6px 8px 0 rgba(0, 0, 0, 0.4);
  color: white;
  padding: 14px 20px;
  margin-top: -20px;
  border: none;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
  margin: 10px;
}

.cancelbtn:hover {
  background-color: #e07871;
}

  .lgnbtn:hover {
  opacity: 0.8;
}

.modal {
    background-color: #ffff;
    padding: 10px;
    margin: 10px;
}
    </style>

</body>
</html>
