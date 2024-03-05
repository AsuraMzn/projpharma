<?php
    require '../config/function.php';

    if(!isset($_SESSION['auth'])){
        redirect('../proj-front/login.php','Please Log In First!');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
    <link rel="stylesheet" href="assets/css/admin.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="assets/css/header.css">
    <title>Document</title>
    <!-- <script>
    let dropdown = document.getElementById("admin");

    function dropdownmenu(){
        dropdown.classList.add(".show");
    }
</script> -->
</head>
<body>
    <div class="sidebar">
        <h1>Pharma</h1>
        <div class="list">
            <h3>Dashboard</h3>
            <div class="list-item">
                    <ul class="main-list" id="admin">
                        <li><a>Admin Management</a><span class="material-symbols-outlined" id="down" style="display: inline;">
                            expand_more
                            </span><span class="material-symbols-outlined" id="up" style="display: none;">expand_less</span>
                            <ul class="sub-list" id="admin">
                                <li data-display="adminform"><a data-display="adminform">Add Admins</a></li>
                                <li data-display="admins"><a data-display="admins">Display Admins</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="main-list" id="user">
                        <li><a>Customer Management</a><span class="material-symbols-outlined" id="down" style="display: inline;">
                            expand_more
                            </span><span class="material-symbols-outlined" id="up" style="display: none;">expand_less</span>
                            <ul class="sub-list" id="user">
                                <li data-display="userform"><a data-display="userform">Add Customers</a></li>
                                <li data-display="users"><a data-display="users">Display Customers</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="main-list" id="meds">
                        <li><a>Medicines Management</a><span class="material-symbols-outlined" id="down" style="display: inline;">
                            expand_more
                        </span><span class="material-symbols-outlined" id="up" style="display: none;">expand_less</span>
                        <ul class="sub-list" id="medicine">
                                <li data-display="medicineform"><a data-display="medicineform">Add Medicines</a></li>
                                <li data-display="medicines"><a data-display="medicines">Display Medicines</a></li>
                            </ul>
                        </li>
                    </ul>
                    <ul class="main-list" id="setting" onclick="handleDisplay(event)">
                        <li data-display="set"><a data-display="set">Settings</a></li>
                    </ul>
                    <a href="logout.php" class="logout">Log Out</a>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="header">
            <div class="title">
                <h1 id="title">Admin Panel</h1>
            </div>
            <!-- <div class="search-bar">
                <input type="search">
                <button>Search</button>
            </div> -->
        </div>
        <div class="table">
            <div class="display-element admin-form" id="admin-adminform" style="display: block;">
                <?php include('adminform.php'); ?>
            </div>
            
            <div class="display-element" id="admin-admins"  style="display: none;">
                <?php
                    $query = "SELECT * FROM admin_info";
                    $data = mysqli_query($conn,$query);
                    $total = mysqli_num_rows($data);
                    /* echo "$total"; */
                    if($total != 0)
                    {
                ?>
                    <table border="3px">
                        <tr>
                            <th>FIRST NAME</th>
                            <th>MIDDLE NAME</th>
                            <th>LAST NAME</th>
                            <th>GENDER</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>BIRTH DATE</th>
                            <th>ADDRESS</th>
                        </tr>
                <?php 
                    while($result = mysqli_fetch_assoc($data)){
                        echo " <tr>
                                    <td>".$result['first_name']."</td>
                                    <td>".$result['middle_name']."</td>
                                    <td>".$result['last_name']."</td>
                                    <td>".$result['gender']."</td>
                                    <td>".$result['email']."</td>
                                    <td>".$result['phone']."</td>
                                    <td>".$result['dob']."</td>
                                    <td>".$result['address']."</td>
                                </tr>";
                        }
                    }
                    else{
                        echo "no error";
                    }
                ?>
                    </table>
            </div>

            <div class="display-element user-form" id="user-userform"  style="display: none;">
                    <?php include('pharmacyform.php'); ?>
            </div>
            
            <div class="display-element" id="user-users"  style="display: none;">
                <?php
                    include("Database.php");

                    $query = "SELECT * FROM user_info";
                    $data = mysqli_query($conn,$query);
                    $total = mysqli_num_rows($data);
                    /* echo "$total"; */
                    if($total != 0)
                    {
                ?>
                    <table border="3px">
                        <tr>
                            <th>FIRST NAME</th>
                            <th>MIDDLE NAME</th>
                            <th>LAST NAME</th>
                            <th>GENDER</th>
                            <th>EMAIL</th>
                            <th>PHONE</th>
                            <th>ADDRESS</th>
                        </tr>
                <?php 
                    while($result = mysqli_fetch_assoc($data)){
                        echo " <tr>
                                    <td>".$result['first_name']."</td>
                                    <td>".$result['middle_name']."</td>
                                    <td>".$result['last_name']."</td>
                                    <td>".$result['gender']."</td>
                                    <td>".$result['email']."</td>
                                    <td>".$result['phone']."</td>
                                    <td>".$result['address']."</td>
                                </tr>";
                        }
                    }
                    else{
                        echo "no error";
                    }
                ?>
                    </table>
            </div>

            <div class="display-element medicine-form" id="medicine-medicineform"  style="display: none;">
                <?php include('medicineform.php') ?>
            </div>
            
            <div class="display-element" id="medicine-medicines"  style="display: none;">
                <?php

                    $query = "SELECT * FROM medicine_info";
                    $data = mysqli_query($conn,$query);
                    $total = mysqli_num_rows($data);
                    /* echo "$total"; */
                    if($total != 0)
                    {
                ?>
                    <table border="3px">
                        <tr>
                            <th>MEDICINE NAME</th>
                            <th>MANUFACTURERE</th>
                            <th>PRICE</th>
                            <th>QUANTITY</th>
                            <th>EXPIRATION DATE</th>
                            <th>CATEGORY</th>
                        </tr>
                <?php 
                    while($result = mysqli_fetch_assoc($data)){
                        echo " <tr>
                                    <td>".$result['medicine_name']."</td>
                                    <td>".$result['manufacturer']."</td>
                                    <td>".$result['price']."</td>
                                    <td>".$result['quantity']."</td>
                                    <td>".$result['expiration_date']."</td>
                                    <td>".$result['category']."</td>
                                </tr>";
                        }
                    }
                    else{
                        echo "no error";
                    }
                ?>
                    </table>
            </div>

            <div class="setting-set">
                <?php include('setting.php') ?>
            </div>
        </div>
    </div>
    <script src="assets/js/app.js"></script>
    <script src="assets/js/dropmenu.js"></script>
</body>
</html>

