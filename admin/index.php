<?php
session_start();
include('../inc/constants.php');
if(!isset($_SESSION['user'])){
    header("Location: /dev/login.php");
}
if($_SESSION['user_role']!='Admin'){
    header("Location: dev/index.php");
}

$title="Admin";
include('header.php');
?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
                    <?php echo BASEURL; ?>
<?php
include('footer.php');
?>