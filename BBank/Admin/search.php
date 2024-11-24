<?php
if (!isset($_SESSION)) { 
    session_start(); 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Blood Bank Management System</title>
<link href="css/lightbox.css" rel="stylesheet" />
<link href="StyleSheet.css" rel="stylesheet" type="text/css" />
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro' rel='stylesheet' type='text/css'>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/flexslider.css" rel="stylesheet" type="text/css" media="all" />
<script src="js/jquery-1.11.0.min.js"></script>
<script src="js/lightbox.min.js"></script>
<script src="js/jquery-1.7.1.min.js" type="text/javascript"></script>
<script src="js/jquery.flexslider.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script type="text/javascript">
    $(function () {
        SyntaxHighlighter.all();
    });
    $(window).load(function () {
        $('.flexslider').flexslider({
            animation: "slide",
            animationLoop: false,
            itemWidth: 210,
            itemMargin: 5,
            minItems: 2,
            maxItems: 4,
            start: function (slider) {
                $('body').removeClass('loading');
            }
        });
    });
</script>
</head>

<body>
<?php
if ($_SESSION['loginstatus'] == "") {
    header("location:adminlogin.php");
}
?>
<?php include('topbar.php'); ?>
<center>
<div style="width:1000px; height:700px;">
    <div style="width:200px; float:left;">
        <?php include('left.php'); ?>
    </div>
    <div style="width:800px; float:left">
        <br /><br />
        <?php include('function.php'); ?>

        <div style="height:350px;">
            <form method="get" action="./result.php" enctype="multipart/form-data">
                <table cellpadding="0" cellspacing="0" width="500px" height="250px" class="tableborder" style="margin:auto; margin-top:100px;">
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr><td colspan="2" align="center"><img src="Images/search.png" height="80px" /></td></tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr><td class="lefttd" style="padding-left:40px">Select Blood Group</td>
                    <td><select name="bg" required><option value="">Select</option>
                    <?php
                    $cn = makeconnection();
                    $s = "select * from bloodgroup";
                    $result = mysqli_query($cn, $s);
                    $r = mysqli_num_rows($result);
                    while ($data = mysqli_fetch_array($result)) {
                        if (isset($_POST["show"]) && $data[0] == $_POST["s2"]) {
                            echo "<option value=$data[0] selected>$data[1]</option>";
                        } else {
                            echo "<option value=$data[0]>$data[1]</option>";
                        }
                    }
                    mysqli_close($cn);
                    ?>
                    </select>
                    <?php
                    if (isset($_POST["show"])) {
                        $cn = makeconnection();
                        $s = "select * from bloodgroup where bg_id='" . $_POST["s2"] . "'";
                        $result = mysqli_query($cn, $s);
                        $r = mysqli_num_rows($result);
                        $data = mysqli_fetch_array($result);
                        $bg_id = $data[0];
                        $bg_name = $data[1];
                        mysqli_close($cn);
                    }
                    ?>
                    </td></tr>
                    <tr><td colspan="2">&nbsp;</td></tr>
                    <tr><td>&nbsp;</td><td>
                    <tr><td>&nbsp;</td><td><input type="submit" value="Search" name="sbmt" style="border:0px; background:linear-gradient(#900,#D50000); width:100px; height:30px; border-radius:10px 1px 10px 1px; color:white; font-weight:bold; font-size:14px; text-shadow:1px 1px 6px black;"></td></tr>
                    <tr><td>&nbsp;</td><td>&nbsp;</td></tr>
                </table>
            </form>
        </div>
        <canvas id="myChart" width="400" height="200"></canvas>

        <?php
             $cn = makeconnection();
             $s = "SELECT bg.bg_name, COUNT(d.donar_id) as donor_count 
                   FROM bloodgroup bg 
                   LEFT JOIN donarregistration d ON bg.bg_id = d.b_id 
                   GROUP BY bg.bg_id";
             $result = mysqli_query($cn, $s);
             $donor_data = [];
             echo"<div id='BData' style='display=none'>";
             while ($data = mysqli_fetch_array($result)) {
                 echo "<div bg_name='" . $data['bg_name'] . "' count='". $data['donor_count'] ."'></div>";
                 $donor_data[] = ['bg_name' => $data['bg_name'], 'donor_count' => $data['donor_count']];
             }
             echo"</div>";
             mysqli_close($cn);
        if (isset($_POST["sbmt"])) {
            // Fetch blood group statistics from donor registration table
       
            
            // Create a bar chart using GD
            // $width = 500;
            // $height = 300;
            // $image = imagecreate($width, $height);
            // $bg_color = imagecolorallocate($image, 255, 255, 255);
            // $bar_color = imagecolorallocate($image, 255, 0, 0);
            // $text_color = imagecolorallocate($image, 0, 0, 0);

            // // Calculate bar width and space
            // $bar_width = 40;
            // $gap = 20;
            // $max_donors = max(array_column($donor_data, 'donor_count'));
            // $scale = ($height - 50) / $max_donors;

            // Draw bars and labels
            // $x = 50;
            // foreach ($donor_data as $data) {
            //     $bar_height = $data['donor_count'] * $scale;
            //     imagefilledrectangle($image, $x, $height - 30 - $bar_height, $x + $bar_width, $height - 30, $bar_color);
            //     imagestring($image, 3, $x + 5, $height - 25, $data['bg_name'], $text_color);
            //     $x += $bar_width + $gap;
            // }

            // // Output the chart image
            // header('Content-Type: image/png');
            // imagepng($image);
            // imagedestroy($image);
        }
        ?>

        <div class="clear"></div>
        <div class="ftr-bg">
            <div class="wrap">
                <div class="footer">
                    <div class="f_nav">
                        <ul>
                            <li class="active"><a href="index.php">Home</a></li>
                            <li><a href="donar.php">Donor</a></li>
                            <li><a href="login.php">log In</a></li>
                            <li><a href="aboutus.php">About</a></li>
                            <li><a href="contact.php">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="copy">
                        <p class="title">© All Rights Reserved </p>
                    </div>
                <div class="clear"></div>
                </div>
            </div>
        </div>
        <script>
        // Function to get data from the HTML elements
        function getChartData() {
            const chartData = [];
            const labels = [];

            // Select all div elements within #BData
            document.querySelectorAll('#BData div').forEach(div => {
                // Get bg_name and count attributes
                const bgName = div.getAttribute('bg_name');
                const count = parseInt(div.getAttribute('count'));

                // Push the data into respective arrays
                labels.push(bgName);
                chartData.push(count);
            });

            return { labels, chartData };
        }

        // Create the chart after the page loads
        window.onload = function() {
            const { labels, chartData } = getChartData();

            // Get the canvas element
            const ctx = document.getElementById('myChart').getContext('2d');

            // Create a bar chart using Chart.js
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Blood Group Count',
                        data: chartData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',  // Bar color
                        borderColor: 'rgba(75, 192, 192, 1)',      // Border color
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        };
    </script>

    </div>
</div>
</body>
</html>
