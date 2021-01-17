<?php
session_start();
$title="Home Page";
include('header.php');
?>
<main>
        <div id="title">
            <h1 style="display:block;" id="textTitle" class="text-center py-5">My Account<br/></h1>
            <?php
            include('inc/connect.php');
            $sql = "SELECT * from user WHERE user_id='".$_SESSION['user']."' LIMIT 1";
            $result = $conn->query($sql);
                // output data of each row
                while($row = $result->fetch_object()) {
                    $user = $row;
                }

            $conn->close();

            ?>
            <div class="container">

            <a class="btn btn-sm btn-primary float-end ms-2" href="editprofile.php">Edit Profile</a>
            <a class="btn btn-sm btn-info float-end" href="print.php">Print Resume</a>
                <table class="table table-striped">
                    <tr>
                        <th colspan="2">Personal Details</th>     
                    </tr>
                    <tr>
                        <td>Name </td>   
                        <td><?php  echo $user->user_name; ?></td>   
                    </tr>
                    <tr>
                        <td>Email </td>   
                        <td><?php  echo $user->user_email; ?></td>   
                    </tr>
                    <tr>
                        <th colspan="2">Educational Qualification</th>     
                    </tr>
                    <tr>
                        <td> </td>   
                        <td></td>   
                    </tr>
                    <tr>
                        <th colspan="2">Work Experience</th>     
                    </tr>
                    <tr>
                        <td> </td>   
                        <td></td>   
                    </tr>
                    <tr>
                        <th colspan="2">Other Details</th>     
                    </tr>
                    <tr>
                        <td> </td>   
                        <td></td>   
                    </tr>
                </table>
            </div>
        </div>
    </main>
<?php
include('footer.php');
?>