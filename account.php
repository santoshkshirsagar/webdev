<?php
session_start();
$title="Home Page";
include('header.php');
?>
<main>
        <div id="title" >
            <h1 style="display:block;" id="textTitle" class="text-center">My Account<br/></h1>
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
                <table>
                    <tr>
                        <td>Name </td>   
                        <td><?php  echo $user->user_name; ?></td>   
                    </tr>
                    <tr>
                        <td>Email </td>   
                        <td><?php  echo $user->user_email; ?></td>   
                    </tr>
                </table>
            </div>
        </div>
    </main>
<?php
include('footer.php');
?>