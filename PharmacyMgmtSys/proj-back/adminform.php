<?php
    include_once('../config/function.php');
    
    ?>
    <form action="adminform.php" method="POST">
        <h1>Append Admin From</h1>
        <div class="input_field">
            <label for="name">Full Name</label>
            <input type="text" class="input" name="name" required>
        </div>
        <div class="input_field">
            <label for="email">Email</label>
            <input type="email" class="email" name="email" placeholder="@admin.gmail.com" >
        </div>
        <div class="input_field">
            <label for="gender">Gender</label>
            <select class="selectbox" name="gender">
                <option value="Not Selected" >Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </div>
        
        <div class="input_field">
            <label for="phone">Phone</label>
            <input type="text" class="input" maxlength="10" name="phone">
        </div>
        <div class="input_field">
            <label for="birth">Birth-Date </label>
            <input type="date" class="aalu" name="birth" required>
            </div>
        <div class="input_field">
            <label for="address">Address</label>
            <input type="text" class="input" name="address">
        </div>
        <div class="input_field">
            <input type="submit" value="Add" class="btn" name="add-admin">
        </div>
</form>

<?php

if(isset($_POST['add-admin'])){
    $admin_name = $_POST['name'];
    $email = $_POST['email'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $dob = $_POST['birth'];
    $address= $_POST['address'];

    $query = "INSERT INTO tbl_admin VALUES(''$admin_name','$email','$gender','$phone','$dob','$address')";
    $data = mysqli_query($conn,$query);

    if($data){
        redirect('admin.php','data inserted');
    }
    else{
        echo "failed";
    }
}
?>
