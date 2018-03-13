<?php  

define('hrs',24);
class sleep {
	var $fname;
	var $age;
	var $hours;
	public function __construct($fname,$age,$hours) {
		 $this->fname = $fname;
		 $this->age = $age;
		 $this->hours = $hours;
	}

	public function calculatesleep($fname,$age,$hours){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "my_db";
		$conn = new mysqli($servername, $username, $password, $dbname);
		if ($conn->connect_error) {
    		die("Connection failed: " . $conn->connect_error);
		}
    $noofhoursslept = ($age * $hours)/hrs;
		$sql = "INSERT INTO sleep_cycle (first_name, age, effective_sleep)
		VALUES ('$fname', '$age', '$noofhoursslept')";
		if ($conn->query($sql) === TRUE) {
        echo "Hey ".$fname." you have been effectively sleeping for ".$noofhoursslept." years of your life!";
    } else {
    		echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$conn->close();
	}
}

$calculate = new sleep($_POST["name"],$_POST["age"],$_POST["hours"]);
$result = $calculate->calculatesleep($_POST["name"],$_POST["age"],$_POST["hours"]);
?>