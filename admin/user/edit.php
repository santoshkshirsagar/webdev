<?php
session_start();
include('../../inc/constants.php');
if(!isset($_SESSION['user'])){
    header("Location: /dev/login.php");
}
if($_SESSION['user_role']!='Admin'){
    header("Location: dev/index.php");
}

include('../../inc/connect.php');
    

    if(isset($_POST['name'])){
        $sqlUpdate = "UPDATE user SET user_name = '".$_POST['name']."', user_email = '".$_POST['email']."'  WHERE user_id='".$_POST['user']."' LIMIT 1";
        $conn->query($sqlUpdate);
    }
    
    $sql = "SELECT user_id, user_name, user_email from user WHERE user_id='".$_GET['user']."'";
    
    if ($result = $conn->query($sql)) {
        while ($obj = $result -> fetch_object()) {
          $user = $obj;
        }
        $result -> free_result();
      }
$title="Admin";
include('../header.php');
?>
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Edit User - <?php echo $user->user_name; ?></h1>
                    <form action="edit.php?user=<?php echo $user->user_id; ?>" method="POST">
                        <input type="hidden" name="user" value="<?php echo $user->user_id; ?>">
                        <div class="form-group">
                            <label>Name</label>
                            <input name='name' type="text" class="form-control" value="<?php echo $user->user_name; ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Email</label>
                            <input name='email' type="email" class="form-control" value="<?php echo $user->user_email; ?>">
                        </div>
                        <input type="submit" value="Update" class="btn btn-primary">
                    </form>
<?php
include('../footer.php');
?>