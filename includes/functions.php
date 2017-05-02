<?php
/*
    Created by Aman Saha
    @darknurd

*/

//validation of name
        function valid_name($name)                 
        {
            global $error_in_name;
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) 
            {
                $error_in_name = "Only letters and white space allowed";
                 return 0; 
            }
               
            else
                return 1;
        }
//validation of name

//validation of e-mail
        function valid_email($email,$connection)                
        {
            global $error_in_email;
            if(!empty($email))
            {
                $query = "SELECT email FROM users WHERE email='$email'";
                $result = mysqli_query($connection,$query);
                if(@mysqli_num_rows($result) == 0)
                {
                    if (filter_var($email, FILTER_VALIDATE_EMAIL))
                    {
                        return 1;
                    }
                    else
                    {
                        $error_in_email="E-mail format error";
                        return 0;
                    }
                }
                else
                {
                    $error_in_email="User already exists.";
                    return 0;
                }
            }
            else
            {
                $error_in_email="Please enter an E-mail";
                return 0;
            }
        }
//validation of e-mail

//validation of username
        function valid_username($username,$connection)        
        {
            global $error_in_username;
            $salt_string="@!";
            $username.=$salt_string;
            $query="SELECT username FROM users WHERE username='$username'";
            $result = mysqli_query($connection,$query);
            if(@mysqli_num_rows($result) == 0)
            {
                return 1;
            }
            else
            {
                $error_in_username="Username already taken.";
                return 0;
            }
        }
//validation of username

//validation of if username available
        function valid_new_username($new_username,$connection)        
        {
            $salt_string="@!";
            $new_username.=$salt_string;
            $query="SELECT username FROM users WHERE username='$new_username'";
            $check_username=mysqli_query($connection,$query);
            $check=@mysqli_num_rows($check_username);
            if($check==0)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }

//validation of if username available
        function valid_web($web,$connection)
        {
            global $error_in_web;
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) 
            {
                $error_in_web = "Invalid URL";
                return 0; 
            }
            return 1;
        }
//validation of password
        function valid_password($password,$confirm_password)         
        {
            global $error_in_password;
            if($password!=$confirm_password)
            {
                $error_in_password="Passwords do not match";
                return 0;
            }
            else
                return 1;
        }
//validation of password

//------------------------------------------------------------------------------------------------------------------------------------------------//

//hashing of password
        function password_hashing($password)
        {
            $salt_string="sha512";
            $hashed=hash('ripemd128',$salt_string.$password);
            return $hashed;
        }

//------------------------------------------------------------------------------------------------------------------------------------------------//

//preventing HTML and SQL Injection
        function mysql_entities_fix_string($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');

            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);

            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);

            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);

            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);

            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);
            $data = trim($data);
            $data = stripslashes($data);
            $data=htmlspecialchars($data);
            return $data;
        }

//------------------------------------------------------------------------------------------------------------------------------------------------//

        //controlling the current user attempting login
        function attempt_login($username,$hash_password,$connection)
        {
            $salt_string="@!";
            $username.=$salt_string;
            $query="SELECT user_id FROM users WHERE username='$username' and password='$hash_password'";
            $result = mysqli_query($connection,$query);
            if(@mysqli_num_rows($result) == 1)
                return true;
            return false;
        }

//------------------------------------------------------------------------------------------------------------------------------------------------//

        //to destroy current user session
         function destroySession()  
         {    
            $_SESSION=array();
            if (session_id() != "" || isset($_COOKIE[session_name()])) 
                setcookie(session_name(), '', time()-2592000, '/');
                session_destroy();
              
        }

//------------------------------------------------------------------------------------------------------------------------------------------------//

        //checking if user remained logged in
        function logged_in() 
        {
            return isset($_SESSION['current_username']);
        }


//------------------------------------------------------------------------------------------------------------------------------------------------//

        //to redirect to a new location
        function redirect_to($new_location) 
        {
            header("Location: " . $new_location);
            exit; 
        }

//------------------------------------------------------------------------------------------------------------------------------------------------//
        
        //find name of user
        function find_name_by_id($user_id,$connection)
        {
            $username.=$salt_string;
            $query="SELECT name FROM users WHERE user_id='$user_id'";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                return chop($row['name'],$salt_string);
            }
        }

        //find email of user
        function find_email_by_id($user_id,$connection)
        {
            $query="SELECT email FROM users WHERE user_id='$user_id'";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                return chop($row['email'],$salt_string);
            }
        }

        //finds username of user
        function find_username_by_id($user_id,$connection)                           
        {
            $salt_string="@!";
            $query="SELECT username FROM users WHERE user_id=$user_id";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                return chop($row['username'],$salt_string);
            }
        }

        function find_user_by_id($username,$connection)                           
        {
            $salt_string="@!";
            $username.= $salt_string;
            $query="SELECT user_id FROM users WHERE username = '$username'";
            $result=mysqli_query($connection,$query);
            if($result)
            {
                $row=mysqli_fetch_assoc($result);
                return $row['user_id'];
            }
        }

        //update username
        function update_username($user_id,$new_username,$connection)
        {
            if(!empty($new_username) && valid_username($new_username,$connection))
            {
                $salt_string="@!";
                $new_username.=$salt_string;

                $query = "UPDATE users SET username = '$new_username' WHERE user_id = '$user_id' LIMIT 1";
                $result = mysqli_query($connection, $query);
                $query = "UPDATE user_details SET username = '$new_username' WHERE user_id = '$user_id' LIMIT 1";
                $result = mysqli_query($connection, $query);
                if($result)
                {
                    $_SESSION['current_username'] = chop($new_username,$salt_string);
                    return 1;
                }
                else
                    return 0;
            }
            else
                return 2;
        }

//update bio of user
         function update_bio($user_id,$bio,$connection)
        {
            if(!empty($bio))
            { 
                $salt_string="@!";
                $current_username.=$salt_string;
                $query = "UPDATE user_details SET bio = '$bio' WHERE user_id = '$user_id' LIMIT 1";
                $result = mysqli_query($connection, $query);

                if($result)
                    return true;
                else
                    return false;
            }
            else
                return true;
        }

//update birthday of user
        function update_birthday($user_id,$bday,$connection)
        {
            if(!empty($bday))
            {
                $salt_string="@!";
                $current_username.=$salt_string;
                $query = "UPDATE user_details SET bday = '$bday' WHERE user_id = '$user_id' LIMIT 1";
                $result = mysqli_query($connection, $query);

                if($result)
                    return true;
                else
                    return false;
            }
            else
                return true;
        }
        
//update new password of user
        function update_password($username,$confirm_password,$connection)         
        {
            if(!empty($confirm_password))
            {
                $salt_string="@!";
                $username.=$salt_string;
                $confirm_hashed_password=password_hashing($confirm_password);
                $query="UPDATE users SET password='$confirm_hashed_password' WHERE username='$username' LIMIT 1";
                $result = mysqli_query($connection,$query);
                if($result)
                    return true;
                else
                {
                    return false;
                }
           }
            else
                return true;
        }
//update location of user
        function update_location($user_id,$location,$connection)         
        {
            if(!empty($location))
            {
                $salt_string="@!";
                $username.=$salt_string;
                $query="UPDATE user_details SET location='$location' WHERE user_id='$user_id' LIMIT 1";
                $result = mysqli_query($connection,$query);
                if($result)
                    return true;
                else
                {
                    return false;
                }
           }
            else
                return true;
        }

        function update_gender($user_id,$gender,$connection)         
        {
            if(!empty($gender))
            {
                $salt_string="@!";
                $username.=$salt_string;
                $query="UPDATE user_details SET gender='$gender' WHERE user_id='$user_id' LIMIT 1";
                $result = mysqli_query($connection,$query);
                if($result)
                    return true;
                else
                {
                    return false;
                }
           }
            else
                return true;
        }

        function update_web($user_id,$web,$connection)         
        {
            if(!empty($web))
            {
                $salt_string="@!";
                $username.=$salt_string;
                $query="UPDATE user_details SET web='$web' WHERE user_id='$user_id' LIMIT 1";
                $result = mysqli_query($connection,$query);
                if($result)
                    return true;
                else
                {
                    return false;
                }
           }
            else
                return true;
        }

        function deactivate_account($user_id,$connection)
        {
            $query = "UPDATE users SET status=0 WHERE user_id = '$user_id' ";
            $result = mysqli_query($connection,$query);
            if($result)
                return 1;
            else
                return 0;
        }

        function RandomString()
        {
            $output = rand(1,9);

            for($i=0; $i<6; $i++) {
                $output .= rand(0,9);
            }

            return $output;
        }

        function isFollowing($user_id,$friend_id,$connection)
        {
            $query = "SELECT id FROM friends WHERE friend_id_1=$user_id AND friend_id_2=$friend_id";
            $result_1 = mysqli_query($connection,$query);
            $query = "SELECT id FROM friends WHERE friend_id_1=$friend_id AND friend_id_2=$user_id";
            $result_2 = mysqli_query($connection,$query);
            if($result_1 && $result_2)
                if(mysqli_num_rows($result_1)==1 || mysqli_num_rows($result_2)==1)
                    return true;
            return false;
        }

        function send_notification_post($post_id,$friend_id,$user_id,$msg,$connection)
        {
            $start_date = date("Y-m-d");
            $start_time = date("h:ia");
            $query = "INSERT INTO notification(post_id,user_id,friend_id,msg,start_date,start_time) VALUES($post_id,$user_id,$friend_id,'$msg','$start_date','$start_time')";
            $result = mysqli_query($connection,$query);
            if($result)
                return true;
            return false;
        } //for like and report system

        function send_notification_user($friend_id,$user_id,$msg,$connection)
        {
            $start_date = date("Y-m-d");
            $start_time = date("h:ia");
            $query = "INSERT INTO notification(user_id,friend_id,msg,start_date,start_time) VALUES($user_id,$friend_id,'$msg','$start_date','$start_time')";
            $result = mysqli_query($connection,$query);
            if($result)
                return true;
            return false;
        }

        function isRoasting($user_id,$friend_id,$connection)
        {
           $query = "SELECT id FROM roastee_event WHERE friend_id_1=$user_id AND friend_id_2=$friend_id";
            $result_1 = mysqli_query($connection,$query);
            $query = "SELECT id FROM roastee_event WHERE friend_id_1=$friend_id AND friend_id_2=$user_id";
            $result_2 = mysqli_query($connection,$query);
            if($result_1 && $result_2)
                if(@mysqli_num_rows($result_1)==1 || @mysqli_num_rows($result_2)==1)
                    return true;
            return false;
        }

        function roastee_request_sent($user_id,$friend_id,$connection)
        {
            $query = "SELECT id FROM roastee_requests WHERE requester=$user_id AND accepter=$friend_id";
            $result_1 = mysqli_query($connection,$query);
            if(@mysqli_num_rows($result_1)==1)
                return true;
            return false;
        }

        function roastee_request_accept($user_id,$friend_id,$connection)
        {
            $query = "SELECT id FROM roastee_requests WHERE requester=$friend_id AND accepter=$user_id";
            $result_1 = mysqli_query($connection,$query);
            if(@mysqli_num_rows($result_1)==1)
                return true;
            return false;
        }

        function isOnline($user_id,$connection)
        {
            $query = "SELECT online FROM users WHERE user_id = $user_id ";
            $result = mysqli_query($connection,$query);
            if($result)
            {
                $row = mysqli_fetch_assoc($result);
                if($row['online'])
                    return true;
                else
                    return false;
            }
            return false;
        }

        function isFriendOfFriend($friend_id,$connection)
        {
            $query = "SELECT id FROM friends WHERE friend_id_1 = $friend_id or friend_id_2 = $friend_id";
            $result = mysqli_query($connection,$query);
            if ($result)
                return true;
            return false;
        }
?>