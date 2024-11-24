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

        // Registration button functionality for Blood Bank form
        // $("#bloodBankForm input[type='submit']").click(function(event) {
        //     event.preventDefault();

        //     // Collect Blood Bank form data
        //     const bloodBankData = {
        //         name: $("#bloodBankForm input[name='bname']").val(),
        //         address: $("#bloodBankForm input[name='b_address']").val(),
        //         city: $("#bloodBankForm input[name='b_city']").val(),
        //         state: $("#bloodBankForm input[name='state_b']").val(),
        //         zip: $("#bloodBankForm input[name='zip1_b']").val(),
        //         contact: $("#bloodBankForm input[name='num_b']").val(),
        //         email: $("#bloodBankForm input[name='email_b']").val(),
        //         website: $("#bloodBankForm input[name='web_b']").val(),     
        //     };

        //     // AJAX request for Blood Bank registration
        //     // $.ajax({
        //     //     url: '/path/to/your/server-script', // Replace with your server-side script path
        //     //     type: 'POST',
        //     //     data: bloodBankData,
        //     //     success: function(response) {
        //     //         alert('Blood Bank registration successful!');
        //     //         $("#bloodBankForm").hide(); // Hide Blood Bank form after submission
        //     //     },
        //     //     error: function() {
        //     //         alert('Error occurred while submitting the Blood Bank form. Please try again.');
        //     //     }
        //     // });
        // });

        // // Registration button functionality for Campus form
        // $("#campusForm input[type='submit']").click(function(event) {
        //     event.preventDefault();

        //     // Collect Campus form data
        //     const campusData = {
        //         code: $("#campusForm input[name='code']").val(),
        //         name: $("#campusForm input[name='cname']").val(),
        //         address: $("#campusForm input[name='caddress']").val(),
        //         zip: $("#campusForm input[name='czip']").val(),
        //         contact: $("#campusForm input[name='c_num']").val(),
        //         email: $("#campusForm input[name='c_email']").val(),
        //         website: $("#campusForm input[name='c_web']").val(),
        //     };

        //     // // AJAX request for Campus registration
        //     // $.ajax({
        //     //     url: '/path/to/your/server-script', // Replace with your server-side script path
        //     //     type: 'POST',
        //     //     data: campusData,
        //     //     success: function(response) {
        //     //         alert('Campus registration successful!');
        //     //         $("#campusForm").hide(); // Hide Campus form after submission
        //     //     },
        //     //     error: function() {
        //     //         alert('Error occurred while submitting the Campus form. Please try again.');
        //     //     }
        //     // });
        // });
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
    <h2 align="center" style="color: #D50000;">
        <a href="#" id="donorRegistrationLink" style="text-decoration: none; color: #D50000;">Registration</a>
    </h2>
    <div id="submenu" align="center" style="padding: 10px;">
        <button id="bloodBankLink" style="margin: 10px;">Blood Bank Registration</button>
        <button id="campusLink" style="margin: 10px;">Campus Registration</button>
    </div>

    <!-- Blood Bank Registration Form -->
    <form id="bloodBankForm" method="post" enctype="multipart/form-data" style="padding: 20px;">
        <h3 align="center">Blood Bank Registration</h3>
        <table cellpadding="0" cellspacing="0" style="margin:auto; width:100%;">
            <tr><td class="lefttd">Bank Name:</td><td><input type="text" name="bname" required="required" pattern="[a-zA-Z _]{4,15}" title="please enter only characters between 4 to 15 for donor name" /></td></tr>
            <tr><td class="lefttd">Address:</td><td><input type="text" name="b_address" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter full address" /></td></tr>
            <tr><td class="lefttd">City:</td><td><input type="text" name="b_city" required="required" pattern="[a-zA-Z _]{4,100}" title="please enter City name" /></td></tr>
            <tr><td class="lefttd">State:</td><td><input type="text" name="state_b" required="required" pattern="[a-zA-Z _]{4,100}" title="please enter Stae name" /></td></tr>
            <tr><td class="lefttd">ZIP Code:</td><td><input type="text" name="zip1_b" required="required" pattern="[0-9 _]{4,20}" title="please enter ZIP Code" /></td></tr>
            <tr><td class="lefttd">Contact Number:</td><td><input type="text" name="num_b" required="required" pattern="[0-9 _]{10}" title="please enter valid 10 digit number" /></td></tr>
            <tr><td class="lefttd">Email:</td><td><input type="text" name="email_b" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter valid Email" /></td></tr>
            <tr><td class="lefttd">Website:</td><td><input type="text" name="web_b" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter valid website link" /></td></tr>
            <!-- Add other fields for Blood Bank Registration -->
            <tr><td>&nbsp;</td><td><input type="submit" value="Register" name="sbmtBloodBank" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;"></td></tr>
            <tr><td>&nbsp;</td><td><input type="button" value="Back" name="sbmtBloodBank" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;"></td></tr>   
        </table>
    </form>

    <!-- Campus Registration Form -->
    <form id="campusForm" action="./registration.php"  method="post" enctype="multipart/form-data" style="padding: 20px;">
        <h3 align="center">Campus Registration</h3>
        <table cellpadding="0" cellspacing="0" style="margin:auto; width:100%;">
            <tr><td class="lefttd">College Code:</td><td><input type="text" name="code" required="required" pattern="[a-zA-Z0-9 _]{4,15}" title="please enter valid college code" /></td></tr>
            <tr><td class="lefttd">Name:</td><td><input type="text" name="cname" required="required" pattern="[a-zA-Z0-9]{6,10}" title="please enter a valid Username" /></td></tr>
            <tr><td class="lefttd">Address:</td><td><input type="text" name="caddress" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter full address" /></td></tr>
            <tr><td class="lefttd">ZIP Code:</td><td><input type="text" name="czip" required="required" pattern="[0-9 _]{4,20}" title="please enter ZIP Code" /></td></tr>
            <tr><td class="lefttd">Contact Number:</td><td><input type="text" name="c_num" required="required" pattern="[0-9 _]{10}" title="please enter valid 10 digit number" /></td></tr>
            <tr><td class="lefttd">Email:</td><td><input type="text" name="c_email" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter valid Email" /></td></tr>
            <tr><td class="lefttd">Website:</td><td><input type="text" name="c_web" required="required" pattern="[a-zA-Z0-9 _]{4,100}" title="please enter valid website link" /></td></tr>
            <tr><td>&nbsp;</td><td><input type="submit" value="Register" name="sbmtCampus" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;"></td></tr>
            <tr><td>&nbsp;</td><td><input type="button" value="Back" name="sbmtBloodBank" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; box-shadow:1px 1px 5px black; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;"></td></tr>   

        </table>
    </form>
</div>


<!-- // PHP to handle form submissions
// if (isset($_POST["sbmtBloodBank"])) {
//     $cn = makeconnection();
//     // $s = "insert into campusregistration(collegecode,name,address,zipcode,contact,email,website) values('" . $_POST["code"] . "','" . $_POST["cname"] . "','" . $_POST["caddress"] . "','" . $_POST["czip"] . "','" . $_POST["c_num"] . "','" . $_POST["c_email"] . "','" . $_POST["c_web"] . "')";
//     mysqli_query($cn, $s);
//     mysqli_close($cn);
//     echo "<script>alert('Blood Bank Registration successful');</script>";
// } -->
<!-- if(isset($_POST["sbmt"])) 
{
if (isset($_POST["sbmtCampus"])) {
    // Campus Registration submission code here
    echo "<script>alert('Campus Registration successful');</script>";
    $cn = makeconnection();
    $s = "insert into campusresgistration(collegecode,name,address,zipcode,contact,email,website) values('" . $_POST["code"] . "','" . $_POST["cname"] . "','" . $_POST["caddress"] . "','" . $_POST["czip"] . "','" . $_POST["c_num"] . "','" . $_POST["c_email"] . "','" . $_POST["c_web"] . "')";
    mysqli_query($cn, $s);
    mysqli_close($cn);
    echo "<script>alert('Campus Registration successful');</script>";
}
} -->


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
        $website = mysqli_real_escape_string($cn, $_POST["c_web"]);

        // Insert data into the database
        $query = "INSERT INTO campusresgistration (collegeCode, name, address, zipcode, contact, email, website) 
                  VALUES ('$code', '$name', '$address', '$zip', '$contact', '$email', '$website')";

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
        $website = mysqli_real_escape_string($cn, $_POST["web_b"]);

        // Insert data into the database
        $query = "INSERT INTO bbankreg (name, address,city, state, zipcode, contact, email, website) 
                  VALUES ('$name', '$address','$city' '$state', '$zip', '$contact', '$email', '$website')";

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
