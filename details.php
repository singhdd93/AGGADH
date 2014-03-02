<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?
        if (!isset($_GET['pro'])) {
            header("locattion:index.php");
        } else {
            include './includes/db.php';
        }
        ?>
    </head>
    <body>
        <form method="post" action="details.php">
            <input type="text" name="usersname" placeholder="Name" />
            <select required="required" name="dobd" >
                <option value="" label="Day" selected="selected">Day</option>
                <option value="01" label="01">01</option>
                <option value="02" label="02">02</option>
                <option value="03" label="03">03</option>
                <option value="04" label="04">04</option>
                <option value="05" label="05">05</option>
                <option value="06" label="06">06</option>
                <option value="07" label="07">07</option>
                <option value="08" label="08">08</option>
                <option value="09" label="09">09</option>
                <option value="10" label="10">10</option>
                <option value="11" label="11">11</option>
                <option value="12" label="12">12</option>
                <option value="13" label="13">13</option>
                <option value="14" label="14">14</option>
                <option value="15" label="15">15</option>
                <option value="16" label="16">16</option>
                <option value="17" label="17">17</option>
                <option value="18" label="18">18</option>
                <option value="19" label="19">19</option>
                <option value="20" label="20">20</option>
                <option value="21" label="21">21</option>
                <option value="22" label="22">22</option>
                <option value="23" label="23">23</option>
                <option value="24" label="24">24</option>
                <option value="25" label="25">25</option>
                <option value="26" label="26">26</option>
                <option value="27" label="27">27</option>
                <option value="28" label="28">28</option>
                <option value="29" label="29">29</option>
                <option value="30" label="30">30</option>
                <option value="31" label="31">31</option>
            </select>
            <select required="required" name="dobm">
                <option value="" label="Month" selected="selected">Month</option>
                <option value="01" label="Jan">Jan</option>
                <option value="02" label="Feb">Feb</option>
                <option value="03" label="Mar">Mar</option>
                <option value="04" label="Apr">Apr</option>
                <option value="05" label="May">May</option>
                <option value="06" label="Jun">Jun</option>
                <option value="07" label="Jul">Jul</option>
                <option value="08" label="Aug">Aug</option>
                <option value="09" label="Sep">Sep</option>
                <option value="10" label="Oct">Oct</option>
                <option value="11" label="Nov">Nov</option>
                <option value="12" label="Dec">Dec</option>
            </select>
            <select required="required" name="doby">
                <option value="" label="Year" selected="selected">Year</option>
                <option value="1996" label="1996">1996</option>
                <option value="1995" label="1995">1995</option>
                <option value="1994" label="1994">1994</option>
                <option value="1993" label="1993">1993</option>
                <option value="1992" label="1992">1992</option>
                <option value="1991" label="1991">1991</option>
                <option value="1990" label="1990">1990</option>
                <option value="1989" label="1989">1989</option>
                <option value="1988" label="1988">1988</option>
                <option value="1987" label="1987">1987</option>
                <option value="1986" label="1986">1986</option>
                <option value="1985" label="1985">1985</option>
                <option value="1984" label="1984">1984</option>
                <option value="1983" label="1983">1983</option>
                <option value="1982" label="1982">1982</option>
                <option value="1981" label="1981">1981</option>
                <option value="1980" label="1980">1980</option>
            </select>
            <input type="number" name="contactno" placeholder="Mobile No" />
            <select required="required" name="sex" >
                <option value="" label="Sex" selected="selected">Sex</option>
                <option value="m" label="Male">Male</option>
                <option value="f" label="Female">Female</option>
            </select>
            <!-- Live Validation to be implemented using JavaScript -->
            <input type="text" name="user_name" placeholder="User Name" />
            <input type="submit" name="sub" value="Submit" />
        </form>
        <?php
        // put your code here
        if (isset($_POST['sub'])) {
            $dobd = $_POST['dobd'];
            $dobm = $_POST['dobm'];
            $doby = $_POST['doby'];

            $insq = "INSERT into users_info VALUES(?, ?, ?, ?, ?, ?)";
            $q = $conn->prepare($insq);
            $q->bind_param('ssisis', $name, $dob, $contact, $sex, $prof, $us_name);
            $name = $_POST['usersname'];
            $dob = "$doby-$dobm-$dobd";
            $contact = $_POST['contactno'];
            $sex = $_POST['sex'];
            $prof = $_GET['pro'];
            $us_name = $_POST['user_name'];
            $q->execute();
            $rows = $q->affected_rows;
            if ($rows == 1) {
                echo "<p> Your Details have been added.</p>"
                . "<p>Please Login with your Username & Password</p>"
                . "<p>Thank You</p>";
            }
            $q->close();
            $conn->close();
        }
        ?>
    </body>
</html>
