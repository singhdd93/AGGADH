<?
include './header.php';
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}
if (!(isset($_GET['sub-slug']) && isset($_GET['topic']) && isset($_GET['level']) && isset($_GET['count']))) {
    header("location:profile.php");
}
?>
<div class="container">

    <div class="row-fluid">
        <div class="span12">
            <div id="profile-alert" class="alert alert-info">
                <? $topic_name = getTopicInfo($_GET['topic']); ?>
                <h3>Test Score : <? echo $topic_name[0]; ?></h3>
            </div>

        </div>
    </div>

    <?php
    if (isset($_POST['testsubmit'])) {
        $arr = getQuestionsOfTopicAndLevel($_GET['sub-slug'], $_GET['topic'], $_GET['level']);

        while ($row = $arr->fetch_array()) {
            $cans[] = $row['c_ans'];
            $quest[] = $row['quest'];
            $op_a[] = $row['op_a'];
            $op_b[] = $row['op_b'];
            $op_c[] = $row['op_c'];
            $op_d[] = $row['op_d'];
        }
        $cc = $_GET['count'];

        $marks = 0;

        for ($i = 1; $i <= $cc; $i++) {
            $uans[] = $_POST["q$i"];
        }

        $lcc = $cc - 1;

        for ($a = 0; $a <= $lcc; $a++) {
            if ($cans[$a] == $uans[$a]) {
                $marks++;
            }
        }

        $percent = ($marks / $cc) * 100;
        
        function printAns($ans_op)
        {
            global $a;
            global $op_a;
            global $op_b;
            global $op_c;
            global $op_d;
            if($ans_op == 'a' || $ans_op == 'A')
            {
                return $op_a[$a];
            }
            else if($ans_op == 'b' || $ans_op == 'B')
            {
                return $op_b[$a];
            }
            else if($ans_op == 'c' || $ans_op == 'C')
            {
                return $op_c[$a];
            }
            else if($ans_op == 'd' || $ans_op == 'D')
            {
                return $op_d[$a];
            }
            
        }
    }
    ?>


    <div class="progress progress-info progress-striped active">
        <div class="bar" style="width: <? echo $percent; ?>%;"></div>
    </div>

    <div class="row-fluid">

        <div class="span6">
            <h4>Marks Scored : <? echo $marks; ?>/<? echo $cc; ?> </h4>
        </div>
        <div class="span6">
            <h4>Percentage : <? echo $percent; ?>% </h4>
        </div>
    </div>

    <div class="row-fluid">

        <div class="span12">

            <table class="table table-bordered">
                <tr id="question">
                    <td><h4>Question</h4></td>
                    <td><h4>Your Answer</h4></td>
                    <td><h4>Correct Answer</h4></td>
                </tr>

<?php
for ($a = 0; $a <= $lcc; $a++) {
    if ($cans[$a] == $uans[$a]) {?>
                <tr class="success">
                    <td>
                        <? echo htmlspecialchars($quest[$a])?>
                    </td>
                    <td>
                        <? echo htmlspecialchars(printAns($uans[$a])); ?>
                    </td>
                    <td>
                        <? echo htmlspecialchars(printAns($cans[$a])); ?>
                    </td>
                </tr>
    <?} else { ?>
        <tr class="error">
                    <td>
                        <? echo htmlspecialchars($quest[$a])?>
                    </td>
                    <td>
                        <? echo htmlspecialchars(printAns($uans[$a])); ?>
                    </td>
                    <td>
                        <? echo htmlspecialchars(printAns($cans[$a])); ?>
                    </td>
                </tr>
   <? }
}

$res = getAttemptsAndMarks($info['user_name'], $_GET['topic'], $_GET['level']);

if($res['attempts'] > 0)
{
    $att = $res['attempts'] + 1;
    if($percent > $res['marks'])
    {
        $num = updateAttemptsAndMarks($info['user_name'], $_GET['topic'], $_GET['level'], $percent, $att);
    }
    else
    {
        $num = updateAttemptsAndMarks($info['user_name'], $_GET['topic'], $_GET['level'], $res['marks'], $att);
    }
    
}
else if($res['attempts'] == 0)
{
    $num = addAttemptsAndMarks($info['user_name'], $_GET['topic'], $_GET['level'], $percent, '1');
}
    

?>


            </table>
        </div>
    </div>



    
    <div class="row-fluid">
        <div class="row-fluid">    
        <div class="span3"></div>
        <div class="span6" id="testbutton">
            <div id='cssmenu'>
                <ul>
                    <li class='has-sub'><a href='#'><span>Take another Test</span></a>
                        <ul>
                            <? $subs = getSubjectIdsForBranch($info['branch_id']);
 foreach ($subs as $s)
 {
     $subjecttt = getSubjectInfo($s);?>
                            <li><a href="subject.php?sub=<?echo $subjecttt[1]; ?>&subid=<? echo $s; ?>"><?  echo $subjecttt[0];?></a></li>
 <?}
                                    ?>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="span3"></div>

    </div>
    </div>


</div>

                <? include './footer.php'; ?>

<script src="js/menu_jquery.js"></script>
