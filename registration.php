<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Blood Bank Management System</title>
    <link href="css/lightbox.css" rel="stylesheet" />
    <link href="StyleSheet.css" rel="stylesheet" type="text/css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
    <script src="js/jquery-1.11.0.min.js"></script>
    <script src="js/lightbox.min.js"></script>
    <script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
    <script src="js/jquery.flexslider.js" type="text/javascript"></script>

    <!-- JavaScript for toggling forms within Registration -->
    <script type="text/javascript">
    $(document).ready(function() {
        // Initially hide all forms
        $("#bloodBankForm").hide();
        $("#campusForm").hide();

        // Show Blood Bank form when Blood Bank link is clicked
        $("#bloodBankLink").click(function(event) {
            event.preventDefault();
            $("#bloodBankForm").show();
            $("#campusForm").hide();
        });

        // Show Campus form when Campus link is clicked
        $("#campusLink").click(function(event) {
            event.preventDefault();
            $("#campusForm").show();
            $("#bloodBankForm").hide();
        });

        // Back button functionality for Blood Bank form
        $("#bloodBankForm input[value='Back']").click(function(event) {
            event.preventDefault();
            $("#bloodBankForm").hide(); // Hide Blood Bank form
        });

        // Back button functionality for Campus form
        $("#campusForm input[value='Back']").click(function(event) {
            event.preventDefault();
            $("#campusForm").hide(); // Hide Campus form
        });

    });
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
        <?php require('header.php');?>
    </div>
</div>

<!-- Main Content Area with Registration Submenu and Forms -->
<div style="margin:auto; width:700px; margin-top:10px; background-color:#f8f1e4; border:2px solid red; box-shadow:4px 1px 20px black;">
    <!-- <h2 align="center" style="color: #D50000;">
        <a href="#" id="donorRegistrationLink" style="text-decoration: none; color: #D50000;">Registration</a>
    </h2> -->
    <div id="submenu" align="center" style="padding: 10px;">
        <button id="bloodBankLink" style="margin: 10px;">Blood Bank Registration</button>
        <button id="campusLink" style="margin: 10px;">Campus Registration</button>
    </div>

    <!-- Blood Bank Registration Form -->
    <form id="bloodBankForm" method="post" enctype="multipart/form-data" style="padding: 20px;margin-bottom: 20px;">
        <h3 align="center" style="margin-bottom: 20px;">Blood Bank Registration</h3>
        <table cellpadding="0" cellspacing="0" style="margin:auto; width:100%; margin-bottom: 10px;">
            <tr><td class="lefttd">Bank Name:<span style="color: red;">*</span></td><td><input type="text" name="bname" required="required" pattern="[a-zA-Z _]{2,15}" title="please enter only characters between 4 to 15 for donor name" style="margin-bottom: 20px;" /></td></tr>
            <tr><td class="lefttd">Address:<span style="color: red;">*</span></td><td><input type="text" name="b_address" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter full address" style="margin-bottom: 20px;"/></td></tr>
            <tr><td class="lefttd">City:<span style="color: red;">*</span></td><td><input type="text" name="b_city" required="required" pattern="[a-zA-Z _]{2,100}" title="please enter City name" style="margin-bottom: 20px;" /></td></tr>
            <tr><td class="lefttd">State:</td><td><input type="text" name="state_b" pattern="[a-zA-Z _]{4,100}" title="please enter Stae name" style="margin-bottom: 20px;"/></td></tr>
            <tr><td class="lefttd">ZIP Code:<span style="color: red;">*</span></td><td><input type="text" name="zip1_b" required="required" pattern="[0-9 _]{4,20}" title="please enter ZIP Code" style="margin-bottom: 20px;"/></td></tr>
            <tr><td class="lefttd">Contact Number:<span style="color: red;">*</span></td><td><input type="text" name="num_b" required="required" pattern="[0-9 _]{10}" title="please enter valid 10 digit number" style="margin-bottom: 20px;"/></td></tr>
            <tr><td class="lefttd">Email:<span style="color: red;">*</span></td><td><input type="email" name="email_b" required="required" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" title="please enter valid Email" style="margin-bottom: 20px;" /></td></tr>
            <!-- password -->
            <tr><td class="lefttd">Password: <span style="color: red;">*</span></td><td><input type="password" name="pwd_b" required="required" pattern="[a-zA-Z0-9]{2,10}" title="please enter only character or numbers between 2 to 10 for password" /></td></tr>
        <tr><td class="lefttd">Confirm Password: <span style="color: red;">*</span></td><td><input type="password" name="t7" required="required" pattern="[a-zA-Z0-9 ]{2,10}" title="please enter only character or numbers between 2 to 10 for password" /></td></tr>

            <tr><td class="lefttd">Website:</td><td><input type="text" name="web_b" pattern="^[a-zA-Z0-9.-]*\.[a-zA-Z0-9.-]+$" title="please enter valid website link" style="margin-bottom: 20px;" /></td></tr>
            
            <!-- Add other fields for Blood Bank Registration -->
            <tr><td>&nbsp;</td><td><input type="submit" value="Register" name="sbmtBloodBank" style="border:0px; margin-bottom: 20px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;"></td></tr>
            <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="Back" name="sbmtBloodBank" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;" onclick="showSubmenu('bloodBank');" /></td>
</tr>
  
        </table>
    </form>

    <!-- Campus Registration Form -->
    <form id="campusForm" action="./registration.php" method="post" enctype="multipart/form-data" style="padding: 20px;">
    <h3 align="center" style="margin-bottom: 20px;">Campus Registration</h3>
    <table cellpadding="0" cellspacing="0" style="margin:auto; width:100%; ">
        <tr><td class="lefttd">College Code:</td><td><input type="text" name="code"  pattern="[a-zA-Z0-9 _]{4,15}" title="please enter valid college code" style="margin-bottom: 20px;"/></td></tr>
        <tr><td class="lefttd">Name:<span style="color: red;">*</span></td><td><input type="text" name="cname" required="required" pattern="[a-zA-Z_]{2,10}" title="please enter a valid Username" style="margin-bottom: 20px;"/></td></tr>
        <tr><td class="lefttd">Address:<span style="color: red;">*</span></td><td><input type="text" name="caddress" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter full address" style="margin-bottom: 20px;"/></td></tr>
        <tr><td class="lefttd">ZIP Code:<span style="color: red;">*</span></td><td><input type="text" name="czip" required="required" pattern="[0-9]{6}" title="please enter ZIP Code" style="margin-bottom: 20px;"/></td></tr>
        <tr><td class="lefttd">Contact Number:<span style="color: red;">*</span></td><td><input type="text" name="c_num" required="required" pattern="[0-9]{10}" title="please enter valid 10 digit number" style="margin-bottom: 20px;" /></td></tr>
        <tr><td class="lefttd">Email:<span style="color: red;">*</span></td><td><input type="email" name="c_email" required="required" pattern="^[^\s@]+@[^\s@]+\.[^\s@]+$" title="Please enter a valid email address (e.g., user@example.com)" style="margin-bottom: 20px;" /></td></tr>
        <tr><td class="lefttd">Website:</td><td><input type="text" name="c_web"  pattern="^[a-zA-Z0-9.-]*\.[a-zA-Z0-9.-]+$" title="Please enter a valid website link (e.g., example.com or www.example.org)" style="margin-bottom: 20px;"/></td></tr>
        <!-- password -->
        <tr><td class="lefttd">Password: <span style="color: red;">*</span></td><td><input type="password" name="pwd" required="required" pattern="[a-zA-Z0-9]{2,10}" title="please enter only character or numbers between 2 to 10 for password" /></td></tr>
        <tr><td class="lefttd">Confirm Password: <span style="color: red;">*</span></td><td><input type="password" name="t7" required="required" pattern="[a-zA-Z0-9 ]{2,10}" title="please enter only character or numbers between 2 to 10 for password" /></td></tr>

        <tr>
            <td>&nbsp;</td><td><input type="submit" value="Register" name="sbmtCampus" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black; margin-bottom: 20px;"></td>
        </tr>
        <tr>
    <td>&nbsp;</td>
    <td><input type="button" value="Back" name="sbmtBloodBank" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;" onclick="showSubmenu('campus');" /></td>
</tr>

    </table>
</form>
</div>
<script>
    // Hide the submenu buttons when a form is shown
    document.getElementById("bloodBankLink").addEventListener("click", function() {
        document.getElementById("submenu").style.display = "none";
        document.getElementById("bloodBankForm").style.display = "block";
        document.getElementById("campusForm").style.display = "none";
    });

    document.getElementById("campusLink").addEventListener("click", function() {
        document.getElementById("submenu").style.display = "none";
        document.getElementById("campusForm").style.display = "block";
        document.getElementById("bloodBankForm").style.display = "none";
    });
    function showSubmenu(formType) {
    // Display the submenu buttons and hide both forms
    document.getElementById("submenu").style.display = "block";
    document.getElementById("bloodBankForm").style.display = "none";
    document.getElementById("campusForm").style.display = "none";

    // If a specific form was open, you can perform additional actions (if needed)
    if (formType === 'bloodBank') {
        // You could add any additional logic for the blood bank if needed.
    } else if (formType === 'campus') {
        // You could add any additional logic for the campus if needed.
    }
}

</script>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["sbmtCampus"])) {
        // Connect to the database
        $cn = makeconnection();

        // Sanitize and retrieve form inputs
        $code = mysqli_real_escape_string($cn, $_POST["code"]);
        $name = mysqli_real_escape_string($cn, $_POST["cname"]);
        $address = mysqli_real_escape_string($cn, $_POST["caddress"]);
        $zip = mysqli_real_escape_string($cn, $_POST["czip"]);
        $contact = mysqli_real_escape_string($cn, $_POST["c_num"]);
        $email = mysqli_real_escape_string($cn, $_POST["c_email"]);
        $password = mysqli_real_escape_string($cn, $_POST["pwd"]);
        $website = mysqli_real_escape_string($cn, $_POST["c_web"]);

        // Insert data into the database
        $query = "INSERT INTO campusresgistration (collegeCode, name, address, zipcode, contact, email, password, website) 
                  VALUES ('$code', '$name', '$address', '$zip', '$contact', '$email', '$password', '$website')";

        if (mysqli_query($cn, $query)) {
            echo "<script>alert('Campus Registration successful');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($cn) . "');</script>";
        }

        // Close the database connection
        mysqli_close($cn);
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST["sbmtBloodBank"])) {
        // Connect to the database
        $cn = makeconnection();

        // Sanitize and retrieve form inputs
        $name = mysqli_real_escape_string($cn, $_POST["bname"]);
        $address = mysqli_real_escape_string($cn, $_POST["b_address"]);
        $city = mysqli_real_escape_string($cn, $_POST["b_city"]);
        $state = mysqli_real_escape_string($cn, $_POST["state_b"]);
        $zip = mysqli_real_escape_string($cn, $_POST["zip1_b"]);
        $contact = mysqli_real_escape_string($cn, $_POST["num_b"]);
        $email = mysqli_real_escape_string($cn, $_POST["email_b"]);
        $password = mysqli_real_escape_string($cn, $_POST["pwd_b"]);
        $website = mysqli_real_escape_string($cn, $_POST["web_b"]);

        // Insert data into the database
        $query = "INSERT INTO bbankreg (name, address,city, state, zipcode, contact, email,password, website) 
                  VALUES ('$name', '$address','$city' ,'$state', '$zip', '$contact', '$email','$password', '$website')";

        if (mysqli_query($cn, $query)) {
            echo "<script>alert('Blood Bank Registration successful');</script>";
        } else {
            echo "<script>alert('Error: " . mysqli_error($cn) . "');</script>";
        }

        // Close the database connection
        mysqli_close($cn);
    }
}
?>

</body>
</html>
