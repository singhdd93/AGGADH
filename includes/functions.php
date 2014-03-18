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

function addBranch($branchName, $branchSlug)
{
    global $conn;
    $insquery = "INSERT INTO branches(`branch_name`,`bn_slug`) VALUES(?,?)";
                            $qs = $conn->prepare($insquery);

                            if ($qs === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }

                            $qs->bind_param('ss', $bnn, $bns);
                            $bnn = $branchName;
                            $bns = $branchSlug;
                            $qs->execute();
                            $rows = $qs->affected_rows;
                            $qs->close();
                            
                            return $rows;
}


function getBranches()
{
    $getquery = "Select * from branches ;";
    global $conn;
                        $res = $conn->query($getquery);
                     
                     return $res;
}

function getBranchInfo($id)
{
    
    global $conn;
    $query = "SELECT branch_name, bn_slug from branches WHERE `branch_id`=? ;";
                            $q = $conn->prepare($query);

                            if ($q === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }

                            $q->bind_param('s', $bid);
                        $bid = $id;
                        $q->execute();
                        $q->bind_result($b_name,$b_slug);
                        $q->fetch();
                        $q->close();                       
                        $row[0] = $b_name;
                        $row[1] = $b_slug;
                        return $row;
    
}

function updateBranch($branchName, $branchSlug, $id)
{
    global $conn;
    $insquery = "UPDATE branches SET `branch_name`=?,`bn_slug`=? WHERE `branch_id` = ?";
                            $qs = $conn->prepare($insquery);

                            if ($qs === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }

                            $qs->bind_param('ssi', $bnn, $bns, $bid);
                            $bnn = $branchName;
                            $bns = $branchSlug;
                            $bid = $id;
                            $qs->execute();
                            $rows = $qs->affected_rows;
                            $qs->close();
                            
                            return $rows;
}


function deleteBranch($id)
{
    global $conn;
    $insquery = "DELETE FROM branches WHERE `branch_id` = ?";
                            $qs = $conn->prepare($insquery);
                            if ($qs === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }
                            $qs->bind_param('i', $bid);                            
                            $bid = $id;
                            $qs->execute();
                            $rows = $qs->affected_rows;
                            $qs->close();                            
                            return $rows;
}


function addSubject($subjectName, $subjectSlug)
{
    global $conn;
    $insquery = "INSERT INTO subjects(`sub_name`,`sub_slug`) VALUES(?,?)";
                            $qs = $conn->prepare($insquery);

                            if ($qs === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }

                            $qs->bind_param('ss', $bnn, $bns);
                            $bnn = $subjectName;
                            $bns = $subjectSlug;
                            $qs->execute();
                            $idd = $qs->insert_id;
                            $qs->close();
                            
                            return $idd;
}


function mapSubjectToBranches($branch_id,$subject_id)
{
    global $conn;
    $query = "INSERT INTO branch_sub_map VALUES (NULL,?,?)";
    $q = $conn->prepare($query);

                            if ($q === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }
                            
                            $q->bind_param("ii",$bid,$sid);
                            $i=0;
                            foreach ($branch_id as $bidd) {
                                
                                $bid=$bidd;
                                $sid=$subject_id;
                                $q->execute();
                                $r = $q->affected_rows;
                                if($r>0)
                                {
                                    $i++;
                                }                     
                            }
                            $q->close();
                            return $i;
    
}


function getSubjects()
{
    $getquery = "Select * from subjects ;";
    global $conn;
                        $res = $conn->query($getquery);
                     
                     return $res;
}

function getBranchIdsForSubject($sub_id)
{
    $query = "Select branch_id FROM branch_sub_map WHERE `sub_id` = ?";
     global $conn;
     
     $q = $conn->prepare($query);

                            if ($q === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }
                            
                            $q->bind_param("i",$sid);
                            $sid = $sub_id;
                            $q->execute();
                            $q->bind_result($branch);
                            while($q->fetch())
                            {
                                $branches[] = $branch;
                            }
                            return $branches;
}


function deleteSubjectMap($id)
{
    global $conn;
    $insquery = "DELETE FROM branch_sub_map WHERE `sub_id` = ?";
                            $qs = $conn->prepare($insquery);
                            if ($qs === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }
                            $qs->bind_param('i', $bid);                            
                            $bid = $id;
                            $qs->execute();
                            $rows = $qs->affected_rows;
                            $qs->close();                            
                            return $rows;
}

function deleteSubject($id)
{
    global $conn;
    $insquery = "DELETE FROM subjects WHERE `sub_id` = ?";
                            $qs = $conn->prepare($insquery);
                            if ($qs === FALSE) {
                                trigger_error('Error: ' . $conn->error, E_USER_ERROR);
                            }
                            $qs->bind_param('i', $bid);                            
                            $bid = $id;
                            $qs->execute();
                            $rows = $qs->affected_rows;
                            $qs->close();                            
                            return $rows;
}