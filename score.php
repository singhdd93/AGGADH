<? include './header.php'; 
if(!isset($_SESSION['user'])){
        header("location:index.php");}
        if(!(isset($_GET['sub-slug'])&&isset($_GET['topic'])&&isset($_GET['level'])&&isset($_GET['count'])))
        {
            header("location:profile.php");
        }  
        
        
        ?>
<div class="container">
    
    <div class="row-fluid">
        <div class="span12">
            <div id="profile-alert" class="alert alert-info">
                <? $topic_name = getTopicInfo($_GET['topic']);?>
                <h3>Test Score : <? echo $topic_name[0];?></h3>
            </div>
            
        </div>
    </div>
    
    <?php 
 
    if(isset($_POST['testsubmit']))
    {
        $arr = getQuestionsOfTopicAndLevel($_GET['sub-slug'], $_GET['topic'], $_GET['level']);
        
     while($row = $arr -> fetch_array())
      {
          $cans[] = $row['c_ans'];
      }
      $cc=$_GET['count'];
            
      $marks = 0;
      
      for($i=1;$i<=$cc; $i++)
      {
          $uans[] = $_POST["q$i"];
      }
      
        $lcc = $cc - 1;
        
     for($a=0;$a<=$lcc;$a++)
      {
          if($cans[$a] == $uans[$a])
          {
              $marks++;
            }
     }
      
      $percent = ($marks/$cc)*100;
          
    }
?>
    
    
        <div class="progress progress-info progress-striped active">
            <div class="bar" style="width: <? echo $percent;?>%;"></div>
    </div>
    
    <div class="row-fluid">
        
        <div class="span6">
            <h4>Marks Scored : <? echo $marks;?>/<? echo $cc;?> </h4>
        </div>
        <div class="span6">
            <h4>Percentage : <? echo $percent;?>% </h4>
        </div>
    </div>
    
    
    
    
    
    
    
</div>

<? include './footer.php'; ?>
