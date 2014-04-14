    <? include './includes/db.php';
   
    $sid= $_POST['subid'];
        $sub_slug=$_POST['sub'];
        $un = $_POST['un'];
        
        $getquery = "Select topics.topic_name, IFNULL(user_$un.marks,0) AS marks from topics LEFT JOIN user_$un  ON topics.topic_id = user_$un.topic_id  WHERE topics.topic_id IN (Select topic_id FROM sub_topic_map WHERE sub_id = '$sid') ;";
                        $res = $conn->query($getquery);

                        while($arr = $res->fetch_assoc())
                        {
                        $d[] = $arr;
                        }
        echo json_encode($d);