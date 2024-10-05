<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" href = "style.css">
<header>
<div class="float-container">

<div class="float-header">
<div class="button-container">
<!-- Login Button -->
    <h4 class="loginbot">
        <a onclick="document.getElementById('id01').style.display='inline-block'" style="width:auto; display:inline-block; margin-right: 15px;" name="Login">Login</a>
    </h4>

    <!-- Services Button -->
    <h4 class="servicesbot">
        <a href="services.php" style="width:auto; display:inline-block;" name="Services">Services</a>
    </h4>
</div>

    <h5>
        <?php
        echo "<p>Currently Logged On:</p>";
        echo $uname;
        ?>
    </h5>

    <?php
    echo "<h2>About Us</h2>";
    echo "<p>Integrative Programming & Technologies | Group 9 | IT3M</p>";
    ?>
    
    <br>
</div>
</div>
</header>

</head>
</html>