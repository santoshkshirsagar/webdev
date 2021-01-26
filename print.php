<?php
session_start();
$title="Print";

include('inc/constants.php');
include('inc/common.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
    <?php if(isset($title))
    { 
        echo $title;
    }else{ 
        echo "web dev"; 
    } 
    ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet"> 
    <style>
    body{font-family: 'Lato', sans-serif;}
    @page { size: auto;  margin: 0mm; }
    @media print {
        .pagebreak { page-break-before: always; } /* page-break-after works, as well */
    }
    </style>

</head>
<body onload="window.print()">
<main>
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

            


        <div class="container-fluid p-5">

        <table class="table table-borderless">
            <tr>
                <td>
                <?php  if($user->user_image==null){ ?>
                        <img style="width:100px" class="rounded-circle" src="<?php echo BASEURL; ?>images/default-avatar.png" alt="profile">
                    <?php }else{ ?>
                        <img style="width:100px" class="rounded-circle" src="<?php echo BASEURL.$user->user_image; ?>" alt="profile">
                    <?php } ?>
                </td>
                <td>
                <h1 style="display:block;line-height:100px;" id="textTitle" class="text-center"><?php echo $user->fullname; ?></h1>
                </td>
            </tr>
        </table>

        <div class="border-top border-bottom my-3 py-3">
            <div class="row">
                <div class="col">Email : <?php echo $user->user_email; ?><br/>Contact: <?php //echo $user->mobile; ?></div>
                <div class="col text-end">Address</div>
            </div> 
        </div> 
        
        <h5 class="mt-5">Objective</h5>
        <ul>
            <li>Objectiive line assfdfasfasf assfasf af asf</li>
        </ul>
        <h5 class="mt-5">Educational Qualification</h5>
        <ul>
            <?php
                    $edArr = json_decode($user->education);
                    if(isset($edArr->qualification)){
                        foreach($edArr->qualification as $key=>$val){
                            ?>
                            <li><b><?php echo $edArr->qualification[$key]; ?></b>, <?php echo $edArr->year[$key]; ?>, <?php echo $edArr->percent[$key]; ?></li>
                            <?php
                        }
                    }
                ?>
            </ul>
        
            <h5 class="mt-5">Work Experience</h5>
            <ul>
            <?php
                    $expArr = json_decode($user->experience);
                    if(isset($expArr->company)){
                        foreach($expArr->company as $key=>$val){
                            ?>
                            <li><b><?php echo $expArr->company[$key]; ?></b>, <?php echo $expArr->designation[$key]; ?>, <?php echo $expArr->yearFrom[$key]; ?>-<?php echo $expArr->yearTo[$key]; ?>
                            </li>
                            <?php
                        }
                    }
                    ?>
            </ul>

            <h5 class="mt-5">General Skills</h5>
            <ul>
                <li>Skill 1</li>
                <li>Skill 2</li>
            </ul>
        </div>
            <div class="pagebreak"></div>
        <div class="container-fluid p-5">
            <h5 class="mt-5">Technical Skills</h5>
            <ul>
                <li>Programming Languages : PHP, C, C++</li>
                <li>Database</li>
                <li>Framework</li>
            </ul>

            <h5 class="mt-5">Other Activities</h5>
            <ul>
                <li>activity 1</li>
                <li>activity 2</li>
            </ul>

  
                <h5 class="mt-5">Personal Details</h5>
                <table class="table table-borderless">
                    <tr>
                        <td>Name </td>   
                        <td><?php  echo $user->fullname; ?></td>   
                    </tr>
                    <tr>
                        <td>Date of Birth</td>   
                        <td><?php  echo $user->dob; ?></td>   
                    </tr>
                    <tr>
                        <td>Gender</td>   
                        <td><?php  echo $user->gender; ?></td>   
                    </tr>
                    <tr>
                        <td>Email </td>   
                        <td><?php  echo $user->user_email; ?></td>   
                    </tr>
                    <tr>
                        <td>State </td>   
                        <td><?php  echo $user->state_id; ?></td>   
                    </tr>
                    <tr>
                        <td>Country </td>   
                        <td><?php  echo $user->country_id; ?></td>   
                    </tr>
                    <tr>
                        <td>Languages Known </td>   
                        <td><?php  echo $user->language; ?></td>   
                    </tr>
                </table>


            
        </div>
    </main>

    </body>
    </html>
