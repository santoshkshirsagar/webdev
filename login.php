<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: index.php");
}
if(isset($_POST['email'])){
    include('inc/connect.php');
    $sql = "SELECT * from user WHERE user_email='".$_POST['email']."' LIMIT 1";
    $result = $conn->query($sql);
    if (is_object($result) && ($result->num_rows > 0)) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            if($row["user_password"]===$_POST['password']){
                $_SESSION['user']=$row["user_id"];
                $_SESSION['user_name']=$row["user_name"];
                $_SESSION['user_role']=$row["user_role"];
                header("Location: index.php");
            }else{
                echo "Password is invalid.";
            }
        }
    } else {
        echo "User does not exist";
    }

    $conn->close();

    //echo addslashes($_POST['name']);
    //strip_tags
}

$title="Login";
include('header.php');

?>
    <main>
        <div class="container py-5" id="contact-form">
            <h1><?php echo $title; ?></h1>
            <div class="form w-25">
                <form action="login.php" onsubmit="return validate()" method="POST">
                    <!-- csrf token -->
                    Email<br/>
                    <input class="form-control" type="email" name="email" id="email" required><br/>
                    Password<br/>
                    <input class="form-control" type="password" name="password" id="password" required><br/>
                    <input class="btn btn-primary" type="submit" value="Login">
                </form>
            </div>
        </div>

    </main>
    <script>
        function validate(){
            /* var nameVal = document.getElementById('name').value;
            if(nameVal==''){
                alert('Name must not be blank');
                return false;
            } */
            var mobileVal = document.getElementById('mobile').value;
            if(mobileVal=='' || isNaN(mobileVal)){
                alert('mobile number must be digits only');
                return false;
            }
        }
    </script>

<?php
include('footer.php');
?>