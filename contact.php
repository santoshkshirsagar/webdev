<?php
$title="Contact";
include('header.php');
?>
    <main>
        <div class="container py-5" id="contact-form">
            <h1>Contact Us</h1>
            <div class="form w-25">
                <form action="contact.html" onsubmit="return validate()" method="POST">
                    <!-- csrf token -->
                    Name<br/>
                    <input class="form-control" type="text" name="name" id="name" required><br/>
                    Mobile<br/>
                    <input class="form-control" type="text" name="mobile" id="mobile"><br/>
                    Email<br/>
                    <input class="form-control" type="email" name="email" id="email" required><br/>
                    Message<br/>
                    <textarea class="form-control" name="message"></textarea>
                    <br/>
                    <input class="btn" type="submit" value="Submit">
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