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
                print_r($_POST);
            }

            $sql = "SELECT * from user WHERE user_id='".$_SESSION['user']."' LIMIT 1";
            $result = $conn->query($sql);
                // output data of each row
                while($row = $result->fetch_object()) {
                    $user = $row;
                }
                
            $sqlCountry = "SELECT id, name from countries";
            $resultCountry = $conn->query($sqlCountry);


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
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" required class="form-control">
                    </div>

                    <h5>Address Details</h5>
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <select class="form-select" name="country" onchange="loadStates(this.value)" required>
                            <option selected>Select Country</option>
                            <?php
                             while($row = $resultCountry->fetch_object()) {
                                echo "<option value=".$row->id.">".$row->name."</option>";
                            }
                            ?>
                            
                        </select>
                    </div>
                    
                    <div class="mb-3" id="stateInput">
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" required>
                            <option selected>Select State</option>
                        </select>
                    </div>
                    
                    <div class="mb-3" id="stateInput">
                        <label class="form-label">Language Known</label>
                        <?php
                        $languages=array("English", "Marathi", "Hindi", "Telugu", "Gujrathi");
                        foreach($languages as $lang){
                            echo '<div class="form-check">
                            <input class="form-check-input" type="checkbox" name="language[]" value="'.$lang.'" id="'.$lang.'">
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
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="male" value="Male">
                        <label class="form-check-label" for="male">
                            Male
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="female" value="Female">
                        <label class="form-check-label" for="female">
                            Female
                        </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="dob" class="form-label">Date of Birth</label>
                        <input type="date" class="form-control" name="dob" id="dob" placeholder="Date of Birth">
                    </div>

                    <h5>Educational Qualification</h5>
                    
                    <div class="row" id="qualificationInput">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Qualification</label>
                                <input type="text" class="form-control" name="qualification[]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Year</label>
                                <input type="text" class="form-control" name="year[]">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Percent/Marks</label>
                                <input type="text" class="form-control" name="percent[]">
                            </div>
                        </div>
                    </div>
                    <a class="float-end btn btn-sm btn-info" onclick="addQualification()">Add More</a>
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
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            document.getElementById('stateInput').innerHTML=this.responseText;
        }
        };
        xhttp.open("GET", url, true);
        xhttp.send();
    }
    var qualificationHtml=document.getElementById('qualificationInput').innerHTML;
    function addQualification(){
        document.getElementById('qualificationInput').innerHTML+=qualificationHtml;
    }
    </script>
<?php
include('footer.php');
?>