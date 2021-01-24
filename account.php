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

            $message=array();
            if(isset($_POST['submit'])){
                $error = false;
                if($_FILES['image']['size']>500000){
                    $error=true;
                    $message[] = "File size is greater than 5Mb";
                }
                $check =  getimagesize($_FILES["image"]["tmp_name"]);
                if($check==false){
                    $error=true;
                    $message[] = "Please upload image only";
                }
                $imageFileType = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
                if(!$error){
                    $filepath='uploads/'.$_SESSION['user'].time().".".$imageFileType;
                    if(move_uploaded_file($_FILES["image"]["tmp_name"], $filepath)){
                        $sqlUpdate = "UPDATE user SET user_image='".$filepath."' WHERE user_id='".$_SESSION['user']."' LIMIT 1";
                        $conn->query($sqlUpdate);
                    }else{
                        $message[] = "Image not uploaded";
                    }
                }
            }

            $sql = "SELECT * from user WHERE user_id='".$_SESSION['user']."' LIMIT 1";
            $result = $conn->query($sql);
                // output data of each row
                while($row = $result->fetch_object()) {
                    $user = $row;
                }


            $sqlP="SELECT user_name as Name,role_name as Role,title as permission_name FROM `user`,role,permission,permission_role WHERE user.role_id=role.id and permission_role.permission_id=permission.id and permission_role.role_id=role.id and user_id='".$_SESSION['user']."'";
            $resultP = $conn->query($sqlP);
                // output data of each row
                $permissions=array();
                while($row = $resultP->fetch_object()) {
                    $permissions[]=$row->permission_name;
                }

            $conn->close();

            ?>
            <div class="container">
            
            <?php
            if(sizeof($message)>0){
                foreach($message as $val){
                    echo "<p class='text-danger'>".$val."</p>";
                }
            }
            ?>
            <div class="row">
                <div class="col-md-3">
                    <?php  if($user->user_image==null){ ?>
                        <img class="w-100 rounded" src="<?php echo BASEURL; ?>images/default-avatar.png" alt="profile">
                    <?php }else{ ?>
                        <img class="w-100 rounded" src="<?php echo BASEURL.$user->user_image; ?>" alt="profile">
                    <?php } ?>
                    
                    <form action="" method="POST" enctype="multipart/form-data">
                        <input class="form-control form-control-sm mt-2" type="file" name="image" accept="image/x-png,image/gif,image/jpeg">
                        <input name="submit" type="submit" class="mt-2 btn btn-sm btn-primary" value="Upload">
                    </form>

                </div>
                <div class="col-md-9">
                <a class="btn btn-sm btn-primary float-end ms-2" href="editprofile.php">Edit Profile</a>
            <a class="btn btn-sm btn-info float-end" href="print.php">Print Resume</a>
            <?php
            if(in_array('create_resume', $permissions)){
                echo '<a class="btn btn-sm btn-secondary float-end me-2" href="create.php">Create Resume</a>';
            }
            if(in_array('send_message', $permissions)){
                echo '<a class="btn btn-sm btn-secondary float-end me-2" href="chat.php">Chat</a>';
            }
            ?>
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
                    <tr>
                        <th colspan="2">Educational Qualification</th>     
                    </tr>
                    <tr>
                    <td colspan="2">
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
                    </td>
                    </tr>
                    <tr>
                        <th colspan="2">Work Experience</th>     
                    </tr>
                    <tr>
                    <td colspan="2">
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
                    </td>
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

            
            </div>
        </div>
    </main>
<?php
include('footer.php');
?>