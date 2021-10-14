<?php
    session_start();
    include 'connection.php';
    
    class testHistory {
        // private $tid;
        // private $classId;
        private $stdId;
        private $conn;

        function __construct( $c, $conn){
            // $this->tid = $a;
            // $this->classId = $b;
            $this->stdId = $c;
            $this->conn = $conn;
        }

        function dispAllTestsPerformance(){
            // $allInfoQuery = "select * from test_performance where test_id = '".$this->tid."' and class_id ='".$this->classId."' and std_id = '".$this->stdId."'";
            $allInfoQuery = "select test_id, class_id, marks from student_info s, test_performance t where s.std_id = t.std_id and s.std_id = '".$stdId."'";
            $results = $this->conn->query($allInfoQuery);
            while($row = $results->fetch_assoc()){
                echo($row);
            }
        }
    }
?>