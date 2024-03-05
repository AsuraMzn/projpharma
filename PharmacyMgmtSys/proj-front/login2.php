<?php
    
    
    $servername = "localhost";
    $username   = "root";
    $password   = ""; 
    $dbname     = "pharmacy";
    
    $connection = mysqli_connect($servername,$username,$password,$dbname);
    if($connection)
    {
        echo "Connection ok<br>";
    }
    else
    {
        echo "Connection fail".mysqli_connect_error();
    }

    if($_POST['signIn']){
        $u_email = $_POST['email'];
        $u_password = $_POST['password'];


        $query = "SELECT * FROM admin_table";
        $data = mysqli_query($connection,$query);

        while($result = mysqli_fetch_assoc($data)){
            if($result['password'] == $u_password){
                header("location: ../proj-back/admin.php");
            }
        }
        header("location: login.html");
        ?>
        <script>
            let invalid = document.getElementById("invalid");
            function invalid(){
                if(<?php $result['password'] != $u_password ?>){
                    invalid.style.display = 'block';
                }
            }
        </script>
        <?php
    }
?>
