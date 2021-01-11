<?php
session_start();
if(isset($_SESSION['user'])){
    header("Location: index.php");
}
$title="Register";
include('header.php');
//print_r($_POST);
if(isset($_POST['name'])){
    include('inc/connect.php');
    $sql = "INSERT INTO user (user_name, user_email, user_password)
    VALUES ('".$_POST['name']."', '".$_POST['email']."', '".$_POST['password']."')";

    if ($conn->query($sql) === TRUE) {
        echo "User successfully registered";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    //echo addslashes($_POST['name']);
    //strip_tags
}
?>
    <main>
        <div class="container py-5" id="contact-form">
            <h1><?php echo $title; ?></h1>
            <div class="form w-25">
                <form action="register.php" onsubmit="return validate()" method="POST">
                    <!-- csrf token -->
                    Name<br/>
                    <input class="form-control" type="text" name="name" id="name" required><br/>
                    Email<br/>
                    <input class="form-control" type="email" name="email" id="email" required><br/>
                    Password<br/>
                    <input class="form-control" type="password" name="password" id="password" required><br/>
                    <input class="btn" type="submit" value="Register">
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