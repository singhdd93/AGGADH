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
          <div id="donut-example"></div> 
        </div>

        <div class="span6">
            <div id="bar-example"></div>
        </div>

    </div>

    <div class="row-fluid">    
        <div class="span3"></div>
        <div class="span6">
            <div id='cssmenu'>
                <ul>
                    <li class='has-sub'><a href='#'><span>Take a test</span></a>
                        <ul>
                            <li><a href='#'><span>Product 1</span></a></li>
                            <li><a href='#'><span>Product 2</span></a></li>
                            <li><a href='#'><span>Product 3</span></a></li>
                            <li><a href='#'><span>Product 4</span></a></li>
                            <li><a href='#'><span>Product 5</span></a></li>
                            <li><a href='#'><span>Product 6</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="span3"></div>

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
    {label: "Current Score", value: 70},
    {label: "To reach Next Level", value: 30}
    //{label: "Mail-Order Sales", value: 20}
    ],
  colors: ["#2f2f2f","#efefef"]
});

</script>