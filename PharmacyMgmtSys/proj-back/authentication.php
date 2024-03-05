<?php

    if(isset($_SESSION['auth']))
    {
        if(isset($_SESSION['loggedInUserRole'])){
            $role = validate($_SESSION['loggedInUserRole']);
            $email = validate($_SESSION['loggedInUser']['email']);

            $query = "SELECT *FROM admin_table WHERE enail='$email' AND role='$role' LIMIT 1";
            $result = mysqli_query($conn,$query);
            if($result){

                if(mysqli_num_rows($result) == 0){
                    logoutsession();
                    redirect('../proj-front/login.php','Access Denied');
                }
            }else{
                logoutsession();
                redirect('../proj-front/login.php','Something Went Wrong!');
            }
        }
    }else{
            redirect('../proj-front/login.php','Login to Continue...');
    }

?>