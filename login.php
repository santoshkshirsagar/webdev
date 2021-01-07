<?php
$title="Login";
include('header.php');
?>
    <main>
        <div class="container py-5" id="contact-form">
            <h1><?php echo $title; ?></h1>
            <div class="form w-25">
                <form action="contact.html" onsubmit="return validate()" method="POST">
                    <!-- csrf token -->
                    Email<br/>
                    <input class="form-control" type="email" name="email" id="email" required><br/>
                    Password<br/>
                    <input class="form-control" type="password" name="password" id="password" required><br/>
                    <input class="btn" type="submit" value="Login">
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