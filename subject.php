<? include './header.php'; 
if(!isset($_SESSION['user'])){
        header("location:index.php");}?>
<div class="container">
    
    <div class="row-fluid">
        <div class="span12">
            <div id="profile-alert" class="alert alert-info">
                
                <h3>Welcome <? echo $info['name'];?></h3>
                <p> Congratulations! You can infinitely expand your knowledge.</p>
                <p> Check your Progress below. </p>
            </div>
            
        </div>
    </div>


    <div class="row-fluid">    

        <div class="span6">
        </div>

        <div class="span6">
        </div>

    </div>

    <div class="row-fluid">    
        <div class="span3"></div>
        <div class="span6">
            <div id='cssmenu'>
                <ul>
                    <li class='has-sub'><a href='#'><span>Take a test</span></a>
                        <ul>
                            <? $subs = getSubjectIdsForBranch($info['branch_id']);
 foreach ($subs as $s)
 {
     $subjecttt = getSubjectInfo($s);?>
                            <li><a href="subject.php?sub=<?echo $subjecttt[1]; ?>"><?  echo $subjecttt[0];?></a></li>
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

<? include './footer.php'; ?>