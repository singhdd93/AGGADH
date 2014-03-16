<?php require 'db.php';

function getProfileid() {
    $pi = uniqid();
    $pis = hexdec($pi);
    $len = strlen($pis);
    $st = $len - 8;
    $ret_id = substr($pis, $st);
    return $ret_id;
}

function getRowsFromEmail($email)
{
    $getquery = "Select * from users_reg WHERE `email`= ? ;";
    global $conn;
                        $q = $conn->prepare($getquery);
                        if ($q === FALSE) {
                            trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                        }
                        $q->bind_param('s', $em);
                        $em = $email;
                        $q->execute();
                        $q->store_result();
                        $rows = $q->num_rows;
                        $q->close();
                        
                        return $rows;
}
function regNewUser($em, $psd)
{
    global $conn;
    $insquery = "INSERT INTO users_reg(`email`,`password`,`profile_id`,`confirm_code`) VALUES(?,?,?,?)";
                            $qs = $conn->prepare($insquery);

                            if ($qs === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }

                            $qs->bind_param('ssis', $ems, $pass, $pid, $cc);
                            $ems = $em;
                            $pass = sha1($psd) . md5($psd);
                            $pid = getProfileid();
                            $cc = md5($em);
                            $qs->execute();
                            $rows = $qs->affected_rows;
                            $qs->close();
                            
                            return $rows;
}

function adminLogin($username, $password)
{
    global $conn;
    $query = "SELECT a_id from admins WHERE `a_username`=? AND `a_password`=? ;";
                            $q = $conn->prepare($query);

                            if ($q === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }

                            $q->bind_param('ss', $userna,$passwo);
                        $userna = $username;
                        $passwo =$password;
                        $q->execute();
                        $q->bind_result($admin_id);
                        $q->fetch();
                        $q->close();
                        
                        
                        return $admin_id;
                        
}