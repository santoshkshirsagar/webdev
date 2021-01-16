<?php
session_start();
include('../inc/constants.php');
if(!isset($_SESSION['user'])){
    header("Location: /dev/login.php");
}
if($_SESSION['user_role']!='Admin'){
    header("Location: dev/index.php");
}

include('../inc/connect.php');
$statement="SELECT COUNT(user_id) as count,user_role FROM `user` GROUP BY user_role";
$result2 = $conn->query($statement);



$title="Admin";
include('header.php');
?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    <?php
                    while($row = $result2->fetch_assoc()) {
                        echo $row['user_role']."-".$row['count']."<br/>";
                    }
                    ?>
<?php
include('footer.php');
?>