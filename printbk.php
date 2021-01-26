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
    </style>

</head>
<body>
<main>
        <div id="title">
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

            
<h1 style="display:block;" id="textTitle" class="text-center py-5"><?php echo $user->fullname; ?><br/></h1>
            <div class="container">
            
            <div class="row">
                <div class="col-md-3">
                    <?php  if($user->user_image==null){ ?>
                        <img class="w-100 rounded" src="<?php echo BASEURL; ?>images/default-avatar.png" alt="profile">
                    <?php }else{ ?>
                        <img class="w-100 rounded" src="<?php echo BASEURL.$user->user_image; ?>" alt="profile">
                    <?php } ?>
                    

                </div>
                <div class="col-md-9">

                <table class="table table-striped">
                    <tr>
                        <th colspan="2">Personal Details</th>     
                    </tr>
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
                    <h5>Educational Qualification</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Qualification</th>   
                                <th>Year</th>    
                                <th>Percent</th>   
                            </tr>
                    <?php
                    $edArr = json_decode($user->education);
                    if(isset($edArr->qualification)){
                        foreach($edArr->qualification as $key=>$val){
                            ?>
                            <tr>
                                <td><?php echo $edArr->qualification[$key]; ?></td>   
                                <td><?php echo $edArr->year[$key]; ?></td>    
                                <td><?php echo $edArr->percent[$key]; ?></td>   
                            </tr>
                            <?php
                        }
                    }
                    ?>
                    </table>

                    <h5>Work Experience</h5>
                        <table class="table table-bordered">
                            <tr>
                                <th>Company</th>   
                                <th>Year From</th>   
                                <th>Year To</th>   
                                <th>Designation</th>   
                            </tr>
                    <?php
                    $expArr = json_decode($user->experience);
                    if(isset($expArr->company)){
                        foreach($expArr->company as $key=>$val){
                            ?>
                            <tr>
                                <td><?php echo $expArr->company[$key]; ?></td>   
                                <td><?php echo $expArr->yearFrom[$key]; ?></td>   
                                <td><?php echo $expArr->yearTo[$key]; ?></td>   
                                <td><?php echo $expArr->designation[$key]; ?></td>   
                            </tr>
                            <?php
                        }
                    }
                    ?>
                        </table>
                    <table class="table table-striped">
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

            
            </div>
        </div>
    </main>
