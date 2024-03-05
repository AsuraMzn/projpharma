<?php
    
    include_once('../config/function.php');
    ?>
    <form action="pharmacyform.php" method="POST">
                    <h1>Append Pharmacy From</h1>
                    <div class="input_field">
                        <label for="pan">Pan No.</label>
                        <input type="text" class="input" name="pan" required>
                    </div>
                    <div class="input_field">
                        <label>Pharmacy Name</label>
                        <input type="text" class="input" name="name" required>
                    </div>
                    <div class="input_field">
                        <label for="email">Email</label>
                        <input type="email" class="email" name="email" placeholder="">
                    </div>
                    <div class="input_field">
                        <label for="phone">Phone</label>
                        <input type="text" class="input" maxlength="10" name="phone">
                    </div>
                    <div class="input_field">
                        <label for="address">Address</label>
                        <input type="text" class="input" name="address">
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Add" class="btn" name="add-user">
                    </div>
                </form>
    <?php

    if(isset($_POST['add-user'])){
        $pan = $_POST['pan'];
        $pharmacy_name = $_POST['name'];
        $last_name = $_POST['lname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address= $_POST['address'];

        $query = "INSERT INTO tbl_pharmacy VALUES('$pan','$pharmacy_name','$email','$phone','$address')";
        $data = mysqli_query($conn,$query);

        if($data){
            redirect('admin.php','data inserted');
        }
        else{
            echo "failed";
        }
    }
?>