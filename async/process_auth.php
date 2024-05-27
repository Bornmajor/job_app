<?php
include('functions.php');

$user_type = escapeString($_POST['user_type']);

$mail = escapeString($_POST['mail']);
$pwd = escapeString($_POST['pwd']);
$auth_type = escapeString($_POST['auth_type']);

if(isset($_POST['official_names'])){
//official names for registeration
$official_names = escapeString($_POST['official_names']);
}

if(isset($user_type) || isset($mail) || isset($pwd)){

    if($auth_type == 'login'){
        //logging process
        $query = "SELECT * FROM brighter_users WHERE mail = '$mail'";
        $select_user = mysqli_query($connection,$query);
        checkQuery($select_user);

        if(mysqli_num_rows($select_user) == 0){
        failMsg('You do not have an account'.'<a href="#" class="alert-link"> register instead</a>');
        return false;
        }
        //mail available therefore check pwd

        while($row = mysqli_fetch_assoc($select_user)){
            $db_pwd =  $row['pwd'];
        }

            //assign session variable
        if(password_verify($pwd,$db_pwd)){
        
        setSession($mail);
        // successMsg("Your ");
        //redirecting after 2seconds
        echo "<script type='text/javascript'>
        window.setTimeout(function() {
            window.location = '?page=dashboard';
        }, 2000);
        </script>";
    
        }else{
            failMsg("Wrong credentials!!");
        }

        
    }else{
       //registration
       $query = "SELECT mail FROM brighter_users WHERE mail = '$mail'";
        $select_user = mysqli_query($connection,$query);
        checkQuery($select_user);
        if(mysqli_num_rows($select_user) !== 0){
            //if user has an account
            failMsg('It seems your account already exist'.'<a href="?page=login" class="alert-link"> login instead</a>');
            return false;
        }


      
        if(strlen($pwd) >= 8){
     

       
        //hash pwd
        // password encryption
        $pwd = password_hash($pwd,PASSWORD_BCRYPT,array('cost' => 12));

        if($user_type == 'company'){
        $account_approval = 'no';
        }else{
        $account_approval = 'yes';  
        }

        $query = "INSERT INTO brighter_users(mail,official_names,pwd,usr_role,account_approval)VALUES('$mail','$official_names','$pwd','$user_type','$account_approval')";
        $create_user = mysqli_query($connection,$query);
        checkQuery($create_user);
        if($create_user){
            setSession($mail);    

         successMsg("Creating an account!!");    
        if($user_type == 'company'){
        echo "<script type='text/javascript'>
        window.setTimeout(function() {
            window.location = '?page=dashboard&register_company=true';
        }, 3000);
        </script>"; 
        }else{
            echo "<script type='text/javascript'>
            window.setTimeout(function() {
                window.location = '?page=dashboard';
            }, 3000);
            </script>"; 
        }

       
         
        }
        }else{
        failMsg('Pasword length must be greater than 7 characters');
        }



    }
}


?>