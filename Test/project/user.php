<?php

class User {

    public $userid;
    public $first_name;
    public $last_name;
    public $nick_name;
    public $eng_name;
    public $eng_last_name;
    public $birth_date;
    public $gender;
    public $clean_lvl;
    public $snoring;
    public $haveroom;
    public $smoke;
    public $children;
    public $status;
    public $party_lvl;
    public $description;
    public $country_id;
    public $job_id;
    public $city_id;
    public $email;
    public $user_name;
    public $password;
    public $fbid;
    public $religion;

    static function findByFacebookid($id) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT *  FROM users where fbid =" . $id;
        
        $result = mysqli_query($conn, $sql) or die(mysql_error() . "555");
        ;
        $us = null;
        while ($row = mysqli_fetch_assoc($result)) {
            if ($us == null) {
                $us = new User;
            }
            $us->userid = $row["user_id"];
            $us->first_name = $row["first_name"];
            $us->last_name = $row["last_name"];
            $us->nick_name = $row["nick_name"];
            $us->eng_name = $row["eng_name"];
            $us->eng_last_name = $row["eng_last_name"];
            $us->birth_date = $row['birth_date'];
            $us->gender = $row["gender"];
            $us->clean_lvl = $row["clean_lvl"];
            $us->snoring = $row["snoring"];
            $us->haveroom = $row["haveroom"];
            $us->smoke = $row["smoke"];
            $us->children = $row["children"];
            $us->status = $row["status"];
            $us->party_lvl = $row["party_lvl"];
            $us->description = $row["description"];
            $us->country_id = $row["country_id"];
            $us->job_id = $row["job_id"];
            $us->city_id = $row["city_id"];
            $us->email = $row["email"];
            $us->user_name = $row["user_name"];
            $us->password = $row["password"];
            $us->fbid = $row["fbid"];
            $us->religion = $row["religion_id"];
        }

        $conn->close();
        return $us;
    }

    static function getSadsanaName($id) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select religion_name from religion where religion_id  =".$id;
       
        $result = mysqli_query($conn, $sql) or die(mysql_error() . "555");
        ;
        $name = null;
        while ($row = mysqli_fetch_assoc($result)) {
           $name = $row["religion_name"];
            
        }

        $conn->close();
        return $name;
    }
    static function getCityName($id) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select city_name from city where city_id  =".$id;
       
        $result = mysqli_query($conn, $sql) or die(mysql_error() . "555");
        ;
        $name = null;
        while ($row = mysqli_fetch_assoc($result)) {
           $name = $row["city_name"];
            
        }

        $conn->close();
        return $name;
    }
    static function getEducationName($id) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select education_name_primary from education where education_id  =".$id;
        $result = mysqli_query($conn, $sql) or die(mysql_error() . "555");
        ;
        $name = null;
        while ($row = mysqli_fetch_assoc($result)) {
           $name = $row["education_name_primary"];
            
        }

        $conn->close();
        return $name;
    }
    static function getJobName($id) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select job_name from jobs where job_id  =".$id;
       
        $result = mysqli_query($conn, $sql) or die(mysql_error() . "555");
        ;
        $name = null;
        while ($row = mysqli_fetch_assoc($result)) {
           $name = $row["job_name"];
            
        }

        $conn->close();
        return $name;
    }
    static function getGetHistory($id) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "project";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        mysqli_set_charset($conn, "utf8");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "select * from hstory_education where user_id  =".$id;
        $result = mysqli_query($conn, $sql) or die(mysql_error() . "555");
        ;
        $name = null;
        while ($row = mysqli_fetch_assoc($result)) {
            if($name==null){
                $name = array();
            }
            array_push($name,$row["education_id"]);
            
        }

        $conn->close();
        return $name;
    }
    

}
?>

