<?php
    include "../config/session.php";
    include "../config/config.php";
    $string = file_get_contents('../config.json');
	$json = json_decode($string, true);
	if ($json['new'] == 1) {
		header("Location: ../init.php");
    }
    if (isset($_GET['logout'])) {
        if ($_GET['logout']) {
            header("Location: ../index.php");
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Toko Baju 1 - Admin</title>
	<meta name="google-signin-scope" content="profile email"> 
    <meta name="google-signin-client_id" content="571963356124-9nhkogpvo06cmqjnav3qh8cv3848n6na.apps.googleusercontent.com"> 
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../style/w3.css">
    <link rel="stylesheet" type="text/css" href="../style/css.css">
</head>
<body>
<?php
    include 'menu.php';
?>

<div class="isi">
<canvas id="myChart" width="400" height="400"></canvas>
<script>
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Topi Bonet Bayi", "Topi Pilot", "Bajut Setelan Army", "Jumper Nanas"],
        datasets: [{
            label: 'Penjualan Item',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        layout:{
            padding:{
                left:10,
                right: 0,
                top: 0,
                bottom: 0,
            }
        },
        responsive: true,
        maintainAspectRatio: false
    }
});
</script>
</div>
</body>
</html>