<? include './header.php'; 
if(!isset($_SESSION['user'])){
        header("location:index.php");}
        
        $sid= $_GET['subid'];
        if(!(isset($_GET['sub']) && isset($_GET['subid'])))
            {
            header("location:profile.php");
            }
        $arr = getTopicForSubject($sid);
        $level=  getUserLevel($info['user_name'], $sid);
        if($level<2)
        {
            $level=1;
        }
        $levelName =  getLevelInfo($level);
        ?>
<div class="container">
    
     <div class="row-fluid">
        <div class="span12">
            <div id="profile-alert" class="alert alert-info">
                <? 
                $subInfo = getSubjectInfo($sid);
                $sName=$subInfo[0]; ?>
                <h3> <? echo $sName;?></h3>
                
                <h4>Current Level : <? echo $levelName;?></h4>
                
            </div>
            
        </div>
    </div>


    <div class="row-fluid">    

        <div class="span6">
          <div id="donut-example"></div> 
        </div>

        <div class="span6">
            <div id="bar-example"></div>
        </div>

    </div>
    
    <div class="row-fluid">
        
        <table class="table table-bordered">
            
            <tr class="error">
                <td><h4>Topic Name</h4></td>
                <td><h4>Attempts</h4></td>
                <td><h4>Marks</h4></td>
                <td><h4>Test</h4></td>
            </tr>
            
            <?
            

                   while ($row = $arr->fetch_array()) {
                       
                       $testinfo = getUserTestInfo($info['user_name'], $row['topic_id']);?>
            <tr class="warning">
                <td><span><? echo $row['topic_name'];?></span></td>
                <td><span><? echo $testinfo['attempts']?></span></td>
                <td><span><? echo $testinfo['marks']?>%</span></td>
                <td><a href="test.php?" class="btn btn-danger">Take Test</a></td>
            </tr>
                   <?}
                   ?>
            
        </table>
    </div>

    
</div>

<? include './footer.php'; ?>

<script type="text/javascript">
    Morris.Bar({
  element: 'bar-example',
  data: [
    { y: '2006', a: 100 },
    { y: '2007', a: 75 },
    { y: '2008', a: 50 },
    { y: '2009', a: 75 },
    { y: '2010', a: 50 },
    { y: '2011', a: 75 },
    { y: '2012', a: 100 }
  ],
  xkey: 'y',
  ykeys: ['a'],
  labels: ['Series A']
});

Morris.Donut({
  element: 'donut-example',
  data: [
    {label: "Sub1", value: 1},
    {label: "Sub2", value: 1},
    {label: "Sub3", value: 1},
    {label: "Sub4", value: 1}
    //{label: "Mail-Order Sales", value: 20}
    ],
  colors: ["#2f2f2f","#efefef","#efefef","#efefef"]
});

</script>
