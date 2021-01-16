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

    if(isset($_GET['search'])){
        $sql .= " WHERE user_name LIKE '%".$_GET['search']."%' OR user_email  LIKE '%".$_GET['search']."%'";
    }

    $sql .= " ORDER BY created_at DESC";

    $result = $conn->query($sql);

    if(isset($_GET['delete'])){
        echo $sqlDel = "DELETE from user WHERE user_id='".$_GET['delete']."'";
        $conn->query($sqlDel);
    }

$title="Admin";
include('header.php');
?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Users</h1>
                    <form action="" method="GET">
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" placeholder="Search here">
                    </div>
                    <input type="submit" class="btn btn-primary btn-sm" value="Search">
                    </form>
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
                            <td><a href="user/edit.php?user=<?php echo $row['user_id']; ?>"><i class="fas fa-edit"></i></a> 
                            <a href="users.php?delete=<?php echo $row['user_id']; ?>" class="text-danger"><i class="fas fa-trash-alt"></i></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </table>
<?php
include('footer.php');
?>