<?php

    require '../config/function.php';

    $admin_table = 'role';

    if(isset($_POST['signIn']))
    {
        $emailInput = validate($_POST['email']);
        $passwordInput = validate($_POST['password']);

        $email = filter_var($emailInput,FILTER_SANITIZE_EMAIL);
        $password = filter_var($passwordInput,FILTER_SANITIZE_STRING,FILTER_FLAG_STRIP_HIGH);

        if($email != '' && $password != ''){
            
            $query = "SELECT * FROM $admin_table WHERE email = '$email' AND password = '$password'";
            $result = mysqli_query($conn,$query);

            if($result)
            {
                if(mysqli_num_rows($result) == 1)
                {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    if($row['role'] == 'admin')
                    {

                        $_SESSION['auth'] =true;
                        $_SESSION['loggedInUserRole'] = $row['role'];
                        $_SESSION['loggedInUser'] = [
                            'name' => $row['name'],
                            'email' => $row['email']
                        ];
                        redirect('../proj-back/admin.php','Logged In Successfully');
                    }
                    else
                    {
                        $_SESSION['auth'] =true;
                        $_SESSION['loggedInUserRole'] = $row['role'];
                        $_SESSION['loggedInUser'] = [
                            'name' => $row['name'],
                            'email' => $row['email']
                        ];
                        redirect('home.html','Logged In Successfully');
                    }
                }
                else
                {
                    redirect('login.php','Invalid Email or Password');
                }
            }
            else
            {
                redirect('login.php','Something went Wrong');
            }
        }
    }

?>