<?php
include('../inc/connect.php');
$sql = "SELECT id, name from states WHERE country_id=".$_GET['country'];
$result = $conn->query($sql);

?>
                        <label class="form-label">State</label>
                        <select class="form-select" name="state" required>
                            <option selected>Select State</option>
                            <?php
                             while($row = $result->fetch_object()) {
                                echo "<option value=".$row->id.">".$row->name."</option>";
                            }
                            ?>
                        </select>