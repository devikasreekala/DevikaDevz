<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Blood Bank Management System</title>
<link href="css/lightbox.css" rel="stylesheet" />
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.min.js"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>

<script>
$(function() {
    $('.flexslider').flexslider({
        animation: "slide",
        animationLoop: false,
        itemWidth: 210,
        itemMargin: 5,
        minItems: 2,
        maxItems: 4
    });
});

function setUserType(userType) {
    document.getElementById('userType').value = userType;
    document.getElementById('campusBtn').style.display = 'none';
    document.getElementById('bloodbankBtn').style.display = 'none';
    document.getElementById('loginForm').style.display = 'block';
    document.getElementById('backBtn').style.display = 'block';
}

function goBack() {
    document.getElementById('loginForm').reset(); // Clear form inputs
    document.getElementById('loginForm').style.display = 'none';
    document.getElementById('campusBtn').style.display = 'inline-block';
    document.getElementById('bloodbankBtn').style.display = 'inline-block';
    document.getElementById('backBtn').style.display = 'none';
}
</script>
</head>

<body>
<?php include('admin/function.php'); ?>

<div class="h_bg">
    <div class="wrap">
        <div class="header">
            <div class="logo">
                <h1><a href="index.php"><img src="Images/logo.png" alt=""></a></h1>
            </div>
        </div>
    </div>
</div>

<div class="nav_bg">
    <div class="wrap">
        <?php require('header.php'); ?>
    </div>
</div>

<div style="display:flex; justify-content:center; align-items:center; flex-direction:column;">
    <button id="campusBtn" onclick="setUserType('campus')" style="padding:15px 30px; font-size:18px; margin:20px; background-color: #4CAF50; color:white; border:none; cursor:pointer; border-radius:5px;">Campus Login</button>
    <button id="bloodbankBtn" onclick="setUserType('bloodbank')" style="padding:15px 30px; font-size:18px; margin:20px; background-color: #D50000; color:white; border:none; cursor:pointer; border-radius:5px;">Blood Bank Login</button>

    <form method="post" enctype="multipart/form-data" id="loginForm" style="display:none; width:100%; max-width:700px; margin-top:40px; background-color:#fff; border-radius:10px; box-shadow:0 4px 8px rgba(0,0,0,0.1); padding:20px;">
        <table cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <td colspan="2" align="center">
                    <img src="Images/login_btn2.jpg" width="50%" height="50%" style="margin-bottom:20px;">
                </td>
            </tr>
            <tr>
                <td class="lefttd" style="width:40%; font-size:16px;">E-Mail</td>
                <td><input type="email" name="email" required style="width:100%; padding:10px; margin-bottom:15px; font-size:16px; border-radius:5px; border:1px solid #ccc;" /></td>
            </tr>
            <tr>
                <td class="lefttd" style="width:40%; font-size:16px;">Password</td>
                <td><input type="password" name="password" required pattern="[a-zA-Z0-9]{2,10}" title="Please enter only characters or numbers between 2 to 10 for password" style="width:100%; padding:10px;margin-bottom:15px; font-size:16px; border-radius:5px; border:1px solid #ccc;" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Log In" name="sbmtLogin" style="border:0px; background:linear-gradient(#900,#D50000); width:100%; height:40px; border-radius:5px; color:white; font-weight:bold; font-size:16px; cursor:pointer;" />
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center" style="font-size:14px;">New user? <a href="registration.php" style="color:#C30; font-weight:bold;">Click here</a> to REGISTER.
                </td>
            </tr>
        </table>
        <input type="hidden" id="userType" name="userType" value="">
    </form>

    <button id="backBtn" onclick="goBack()" style="display:none; padding:15px 30px; font-size:18px; margin:20px; background-color: #555; color:white; border:none; cursor:pointer; border-radius:5px;">Back</button>
</div>

<?php
if (isset($_POST["sbmtLogin"])) {
    $userType = $_POST['userType']; // Retrieve the user type
    $email = $_POST["email"];
    $password = $_POST["password"];

    $cn = makeconnection();

    if ($userType == "campus") {
        $query = "SELECT * FROM campusresgistration WHERE email='$email' AND password='$password'";
    } elseif ($userType == "bloodbank") {
        $query = "SELECT * FROM bbankreg WHERE email='$email' AND password='$password'";
    } else {
        echo "<script>alert('Invalid login type!');</script>";
        mysqli_close($cn);
        exit();
    }

    $result = mysqli_query($cn, $query);
    $numRows = mysqli_num_rows($result);
    mysqli_close($cn);

    if ($numRows > 0) {
        $_SESSION["email"] = $email;
        if ($userType == "campus") {
            echo "<script>location.replace('campus/index.php');</script>"; 
        } elseif ($userType == "bloodbank") {
            echo "<script>location.replace('donor/index.php');</script>";
        }
    } else {
        echo "<script>alert('Invalid User Name Or Password');</script>";
    }
}
?>
</body>
</html>
