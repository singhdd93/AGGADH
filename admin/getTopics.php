<?php
require '../includes/functions.php';

$sub_id = $_POST['subjects'];
//echo $sub_id;
echo "<option value='' label='Topics' selected='selected'>Topics</option>";
                    $arr = getTopicForSubject($sub_id);

                   while ($row = $arr->fetch_array()) {
                        
                        echo "<option value='{$row['topic_id']}' label='{$row['topic_name']}'> {$row['topic_name']}</option>";
                     }