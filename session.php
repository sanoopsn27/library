<?php 
require_once __DIR__.'/config.php';
  
function sec_session_start() {
     
     session_start();

}



function login($email, $password, $mysqli) {

    if ($stmt = $mysqli->prepare("SELECT id, username, password
        FROM members
        WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);  // Bind "$email" to parameter.
        $stmt->execute();    // Execute the prepared query.
        $stmt->store_result();
 
        // get variables from result.
        $stmt->bind_result($user_id, $username, $db_password);
        $stmt->fetch();
 
        if ($stmt->num_rows == 1) {
          
                if ($db_password == $password) {
                    // Password is correct!
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['userid'] = $user_id;
                      
                    // Login successful.
                    return 2;
                } 
                else

                {
                    // Password is not correct 
                    return 1;
                }
            }

        } 
        else

         {
            // No user exists.
            return 0;
         }
    }


    function login_check($mysqli) {
    // Check if all session variables are set 
 
        if (isset($_SESSION['userid'],$_SESSION['username'],$_SESSION['email'])) {

            $user_id = $_SESSION['userid'];
            $email = $_SESSION['email'];
            $username = $_SESSION['username'];

            if ($stmt = $mysqli->prepare("SELECT email 
              FROM members 
              WHERE id = ? LIMIT 1")) {
            // Bind "$user_id" to parameter. 
                $stmt->bind_param('i', $user_id);
            $stmt->execute();   // Execute the prepared query.
            $stmt->store_result();

            if ($stmt->num_rows == 1) {
                // If the user exists get variables from result.
                $stmt->bind_result($dbemail);
                $stmt->fetch();
                $login_check = $dbemail;
                 if ($login_check == $email) {
                    // Logged In!!!! 


                    return true;
                } else {

                    // Not logged in 
                    return false;
                }
            } else {
                // Not logged in 
                return false;
            }
        } else {
            // Not logged in 
            return false;
        }
    } else {

        // Not logged in 
        return false;
    } 

}

 

 