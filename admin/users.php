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
    $sql = "SELECT * from user";
    $result = $conn->query($sql);

$title="Admin";
include('header.php');
?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Users</h1>
                    <table class="table table-bordered">
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Join Time</th>
                            <th>Action</th>
                        </tr>
                    <?php
                    while($row = $result->fetch_assoc()) {
                        
                        ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['user_name']; ?></td>
                            <td><?php echo $row['user_email']; ?></td>
                            <td><?php echo $row['created_at']; ?></td>
                            <td><a href="#"><i class="fas fa-edit"></i></a> 
                            <a href="#" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </table>
<?php
include('footer.php');
?>