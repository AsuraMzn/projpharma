<?php
    
    include_once('../config/function.php');

?>

    <form action="medicineform.php" method="POST">
                    <h1>Append Medicine From</h1>
                    <div class="input_field">
                        <label for="name">Medicine Name</label>
                        <input type="text" class="input" name="name" required>
                    </div>
                    <div class="input_field">
                        <label for="manufacturername">Manufacturere</label>
                        <input type="text" class="input"  name="manufacturername" >
                    </div>
                    <div class="input_field">
                        <label for="price">Price</label>
                        <input type="number" class="input" name="price" required>
                    </div>
                    <div class="input_field">
                        <label for="quantity">Quantity</label>
                        <input type="number" class="input" name="quantity" required>
                    </div>
                    <div class="input_field">
                        <label for="exp_date">Expiration Date</label>
                        <input type="date" class="email" name="exp_date">
                    </div>
                    <div class="input_field">
                        <label for="dosage">Dosage</label>
                        <select class="selectbox" name="dosage">
                                <option value="tablet" >Tablet</option>
                                <option value="capsule">Capsule</option>
                            </select>
                    </div>
                    <div class="input_field">
                        <input type="submit" value="Add" class="btn" name="add-medicine">
                    </div>
                </form>

<?php
    if(isset($_POST['add-medicine'])){
        $medicine_name = $_POST['name'];
        $manufacturer_name = $_POST['manufacturername'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $exp_date = $_POST['exp_date'];
        $formatted_Date = date("Y-m-d", strtotime($exp_date));
        $dosage = $_POST['dosage'];

        $query = "INSERT INTO tbl_medicine VALUES('','$medicine_name','$manufacturer_name',$price,$quantity, '$formattedDate','$dosage')";
        $data = mysqli_query($conn,$query);

        if($data){
            redirect('admin.php','data inserted');
        }
        else{
            echo "failed";
        }
    }
?>