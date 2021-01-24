<?php
session_start();
$title="Home Page";
include('header.php');
?>
<main>
        <div id="title">
            <h1 style="display:block;" id="textTitle" class="text-center py-5">Edit Profile<br/></h1>
            <?php
            include('inc/connect.php');

            $message=array();
            if(isset($_POST['submit'])){

                $education= array(
                    "qualification" => $_POST['qualification'], 
                    "year" => $_POST['year'], 
                    "percent" => $_POST['percent']
                );

                $experience= array(
                    "company" => $_POST['company'], 
                    "yearFrom" => $_POST['yearFrom'], 
                    "yearTo" => $_POST['yearTo'], 
                    "designation" => $_POST['designation']
                );

                $toUpdate=array(
                    "fullname" => $_POST['name'],
                    "country_id" => $_POST['country'],
                    "state_id" => $_POST['state'],
                    "language" => implode(',', $_POST['language']),
                    "gender" => $_POST['gender'],
                    "dob" => $_POST['dob'],
                    "education" => json_encode($education),
                    "experience" => json_encode($experience),
                );

                $whereData= "user_id = '".$_SESSION['user']."'";

                $affected = $db->update('user', $toUpdate, $whereData);
                if($affected>0){
                    echo "<div class='alert alert-success m-5'>Data Updated</div>";
                }
                
            }

            $sql = "SELECT * from user WHERE user_id='".$_SESSION['user']."' LIMIT 1";
            $result = $conn->query($sql);
                // output data of each row
                while($row = $result->fetch_object()) {
                    $user = $row;
                }
                
            $sqlCountry = "SELECT id, name from countries";
            $resultCountry = $conn->query($sqlCountry);
            
            $resultStates =array();
            if($user->country_id!=null){
                $sqlStates = "SELECT id, name from states WHERE country_id=".$user->country_id;
                $resultStates = $conn->query($sqlStates);
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
            <form action="" method="POST">
            <div class="row justify-content-center">
                <div class="col-md-7">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" required class="form-control" value="<?php echo  $user->fullname; ?>">
                    </div>

                    <h5>Address Details</h5>
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <select class="form-select" name="country" onchange="loadStates(this.value)" required>
                            <option selected>Select Country</option>
                            <?php
                             while($row = $resultCountry->fetch_object()) {
                                $selected = '';
                                if($user->country_id==$row->id){
                                    $selected = "selected='selected'";
                                }
                                echo "<option value=".$row->id." ".$selected.">".$row->name."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="stateInput">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" required>
                            <option value="">Select State</option>
                            <?php
                             while($row = $resultStates->fetch_object()) {
                                $selected = '';
                                if($user->state_id==$row->id){
                                    $selected = "selected='selected'";
                                }
                                echo "<option value=".$row->id." ".$selected.">".$row->name."</option>";
                            }
                            ?>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="stateInput">
                        <label class="form-label">Language Known</label>
                        <?php
                        $languages=array("English", "Marathi", "Hindi", "Telugu", "Gujrathi");
                        $known = explode(',', $user->language);
                        foreach($languages as $lang){
                                $checked = '';
                                if(in_array($lang, $known)){
                                    $checked = "checked";
                                }
                            echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="language[]" value="'.$lang.'" id="'.$lang.'" '.$checked.'>
                            <label class="form-check-label" for="'.$lang.'">
                                '.$lang.'
                            </label>
                            </div>';
                        }
                        ?>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Gender</label>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="male" value="Male" required <?php
                            if($user->gender=='Male'){ echo "checked"; }
                        ?>
                        >
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="gender" id="female" value="Female" required <?php
                            if($user->gender=='Female'){ echo "checked"; }
                        ?>>
                        <label class="form-check-label" for="female" required>
                            Female
                        </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth" value="<?php echo  $user->dob; ?>">
                    </div>

                    <h5>Educational Qualification</h5>
                    <?php
                    $edArr = json_decode($user->education);
                    function addQ($rowNum, $edArr){
                        $qual='';
                        $year='';
                        $percent='';
                        if(isset($edArr->qualification[$rowNum])){ 
                           $qual = $edArr->qualification[$rowNum]; 
                        }
                        if(isset($edArr->year[$rowNum])){ 
                            $year = $edArr->year[$rowNum]; 
                        }
                        if(isset($edArr->percent[$rowNum])){ 
                            $percent = $edArr->percent[$rowNum]; 
                        }
                        if($rowNum>0){
                            echo "<div id='q".$rowNum."'><a class='btn btn-sm btn-danger float-end' onclick=\"removeRow('q".$rowNum."')\">Remove</a><div class='clearfix'></div><div class='row'>";
                        }
                        echo '<div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Qualification</label>
                                <input type="text" class="form-control" name="qualification[]" required value="'.$qual.'">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Year</label>
                                <input type="text" class="form-control" name="year[]"  value="'.$year.'">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Percent/Marks</label>
                                <input type="text" class="form-control" name="percent[]"  value="'.$percent.'">
                            </div>
                        </div>';
                        if($rowNum>0){
                            echo "</div></div>";
                        }
                    }
                    ?>
                    <div class="row" id="qualificationInput">
                        <?php addQ(0, $edArr); ?>
                    </div>
                    <div id="moreQ">
                        <?php if(sizeof($edArr->qualification)>1){
                            foreach($edArr->qualification as $key=>$val){
                                if($key!=0){
                                    addQ($key, $edArr);
                                }
                            }
                        } ?>
                    </div>
                    <a class="float-end btn btn-sm btn-info" onclick="addQualification()">Add More</a>
                    <div class="clearfix"></div>


                    <h5>Work Experience</h5>
                    <?php
                    $expArr = json_decode($user->experience);
                    function addExp($rowNum, $expArr){
                        $company='';
                        $yearFrom='';
                        $yearTo='';
                        $designation='';
                        if(isset($expArr->company[$rowNum])){ 
                           $company = $expArr->company[$rowNum]; 
                        }
                        if(isset($expArr->yearFrom[$rowNum])){ 
                            $yearFrom = $expArr->yearFrom[$rowNum]; 
                        }
                        if(isset($expArr->yearTo[$rowNum])){ 
                            $yearTo = $expArr->yearTo[$rowNum]; 
                        }
                        if(isset($expArr->designation[$rowNum])){ 
                            $designation = $expArr->designation[$rowNum]; 
                        }
                        if($rowNum>0){
                            echo "<div id='exp".$rowNum."'><a class='btn btn-sm btn-danger float-end' onclick=\"removeRow('exp".$rowNum."')\">Remove</a><div class='clearfix'></div><div class='row'>";
                        }
                        echo '<div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Company</label>
                                <input type="text" class="form-control" name="company[]" required value="'.$company.'">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Year From</label>
                                <input type="text" class="form-control" name="yearFrom[]"  value="'.$yearFrom.'">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Year To</label>
                                <input type="text" class="form-control" name="yearTo[]"  value="'.$yearTo.'">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="mb-3">
                                <label class="form-label">Designation</label>
                                <input type="text" class="form-control" name="designation[]"  value="'.$designation.'">
                            </div>
                        </div>';
                        if($rowNum>0){
                            echo "</div></div>";
                        }
                    }
                    ?>
                    <div class="row" id="companyInput">
                        <?php addExp(0, $expArr); ?>
                    </div>
                    <div id="moreExp">
                        <?php if(isset($expArr->company) and sizeof($expArr->company)>1){
                            foreach($expArr->company as $key=>$val){
                                if($key!=0){
                                    addExp($key, $expArr);
                                }
                            }
                        } ?>
                    </div>
                    <a class="float-end btn btn-sm btn-info" onclick="addCompany()">Add More</a>
                    <div class="clearfix"></div>




                    <input name="submit" type="submit" value="Submit" class="btn btn-primary">
                    
                </div>
            </div>
            </form>
        </div>
    </main>
    <script>
    function loadStates(countryId){
        let url = "<?php echo BASEURL; ?>/formdata/states.php?country="+countryId;
        loadData(url, 'statesLoaded');
    }
    function statesLoaded(data){
        document.getElementById('stateInput').innerHTML=data;
    }
    var qualificationHtml=document.getElementById('qualificationInput').innerHTML;
    var count = 0;
    <?php
    if(sizeof($edArr->qualification)>0){
        echo "count=".sizeof($edArr->qualification).";\n";
    }
    ?>
    function addQualification(){
        count = count + 1;
        document.getElementById('moreQ').innerHTML+="<div id='q"+count+"'><a class='btn btn-sm btn-danger float-end' onclick=\"removeRow('q"+count+"')\">Remove</a><div class='clearfix'></div><div class='row'>"+qualificationHtml+"</div></div>";
    }
    function removeRow(divId){
        document.getElementById(divId).remove();
    }

    var expHtml = document.getElementById('companyInput').innerHTML;
    var expCount = 0;
    function addCompany(){
        expCount = expCount + 1;
        document.getElementById('moreExp').innerHTML+="<div id='exp"+expCount+"'><a class='btn btn-sm btn-danger float-end' onclick=\"removeRow('exp"+expCount+"')\">Remove</a><div class='clearfix'></div><div class='row'>"+expHtml+"</div></div>";
    }
    </script>
<?php
include('footer.php');
?>