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
    </head>
    <body>
        <?php
        include '/user.php';
        $id = "1267420166624625";
        echo $id;
        $test = User::findByFacebookid($id);
        echo User::getSadsanaName($test->religion);
        echo User::getCityName($test->city_id);
        echo User::getJobName($test->job_id);
        $tt = User::getGetHistory($test->userid);
        echo count(($tt));
        for ($x = 0; $x < count($tt); $x++) {
            echo User::getEducationName($tt[$x]);
            echo "<br>";
        }
        ?>
    </body>
</html>
