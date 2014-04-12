<? include './header.php'; 
if(!isset($_SESSION['user'])){
        header("location:index.php");}
        if(!(isset($_GET['sub-slug'])&&isset($_GET['topic'])&&isset($_GET['level'])))
        {
            header("location:profile.php");
        }  
        
        $arr = getQuestionsOfTopicAndLevel($_GET['sub-slug'], $_GET['topic'], $_GET['level']); 
        $count = $arr -> num_rows;
        ?>
<div class="container">
    
    <div class="row-fluid">
        <div class="span12">
            <div id="profile-alert" class="alert alert-info">
                <? $topic_name = getTopicInfo($_GET['topic']);?>
                <h3>Test : <? echo $topic_name[0];?></h3>
            </div>
            
        </div>
    </div>
    
    <div class="ques-container">
        <form method="POST" action="score.php?count=<? echo $count;?>&topic=<? echo $_GET['topic']; ?>&level=<? echo $_GET['level']; ?>&sub-slug=<? echo $_GET['sub-slug']; ?>">
    <? 
    $i=1;
     while($row = $arr -> fetch_array())
     {
    ?>
    
    <div class="row-fluid">
        
        <div class="row-fluid">
            <div class="span12">
                <div id="question"> Q<? echo $i;?> &nbsp;:&nbsp;&nbsp; <? echo htmlspecialchars($row['quest']);?></div>
            </div>
        </div>
        <div class="row-fluid">
            
            <div class="span6">
                <input type="radio" name="q<? echo $i;?>" value="a" /> <label><? echo htmlspecialchars($row['op_a']);?></label>
            </div>
            <div class="span6">
                <input type="radio" name="q<? echo $i;?>" value="b" /> <label><? echo htmlspecialchars($row['op_b']);?></label>
            </div>
            
        </div>
        
        <div class="row-fluid">
            
            <div class="span6">
                <input type="radio" name="q<? echo $i;?>" value="c" /> <label><? echo htmlspecialchars($row['op_c']);?></label>
            </div>
            <div class="span6">
                <input type="radio" name="q<? echo $i;?>" value="d" /> <label><? echo htmlspecialchars($row['op_d']);?></label>
            </div>
            
        </div>
        
    </div>
    
     <? 
     $i++;
     }?>
        
            <div class="row-fluid">
                <div  id="test-submit" class="span12">
                <input class="btn btn-large btn-primary" type="submit" name="testsubmit" value="Submit"/>
                </div>
            </div>
        </form>
        
    </div>
    
</div>

<? include './footer.php'; ?>
