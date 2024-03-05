<?php
    session_start();

    require 'conn.php';

    function validate($inputdata){
        
        global $conn;
        
        $validatedData = mysqli_real_escape_string($conn, $inputdata);
        return trim($validatedData);
    }

    function redirect($url, $status){
        $_SESSION['status'] = $status;
        header('Location: '.$url);
        exit(0);
    }

    function logoutsession(){
        unset($_SESSION['auth']);
        unset($_SESSION['loggedInUserRole']);
        unset($_SESSION['loggedInUser']);
    }

    // function alertmessage(){
    //     if(isset($_SESSION['status'])){
    //         echo "<div>
    //             <h6>".$_SESSION['status']."</h6>
    //             </div>
    //         ";
    //         unset($_SESSION['status']);
    //     }
    // }
?>