<?php 
    include('connection.php');
    $testIDFromURL = $_GET['id'];
?>

<html>
  <head>
    <title>MCQ Test</title>
    <style>
        input{
            margin-top: 1%;
            margin-bottom: 2%;
            display: inline;
        }
        
        div{
            margin: 2%;
            border: 1px solid black;
            background-color: #fffc63;
        }

        button {
            border-radius: 100rem;
            padding: 1rem;
            font-size: 1rem;
            margin-top: 2%;
            margin-bottom: 2%;
            padding: .5rem 3rem;
            color: $color-black;
            box-shadow: 0 0 6px 0 rgba(157, 96, 212, 0.5);
            border: solid 3px transparent;
            background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), linear-gradient(101deg, #78e4ff, #ff48fa);
            background-origin: border-box;
            background-clip: content-box, border-box;
            box-shadow: 2px 1000px 1px #fff inset;
        }

        button:hover {
            box-shadow: none;
            color: white;
        }

        .buttonContainer{
            margin-top: 4%;
        }
        
        .attempts{
            padding: 2%;
        }
    </style>
  </head>
  
  <body>
    <div class = "attempts">
            <center><h1><u>MCQ Test on General Knowledge</u></h1></center>
            <?php
                $getMCQs = "select tr.q_id, tqa.q_description, tqa.option1, tqa.option2, tqa.option3, tqa.option4, tr.marked_option from test_q_a tqa, test_response tr where tqa.test_id = tr.test_id and tqa.class_id = tr.class_id and tqa.q_id = tr.q_id and tqa.test_id = '".$testIDFromURL."'";
                $result = $conn->query($getMCQs);
                $qno = 1;
                if($result->num_rows > 0){
                    while($eachQandA = $result->fetch_assoc()) {
                        echo($qno.") ".$eachQandA["q_description"]."<br>");
            ?>
            <input type="radio" id = "<?= "optA".$qno; ?>" name = "<?= $qno; ?>" value = "<?= "a.".$eachQandA["option1"]; ?>"  >a)<?php echo $eachQandA["option1"]; ?>
            <input type="radio" id = "<?= "optB".$qno; ?>" name = "<?= $qno; ?>" value = "<?= "b.".$eachQandA["option2"]; ?>" >b)<?php echo $eachQandA["option2"]; ?>
            <input type="radio" id = "<?= "optC".$qno; ?>" name = "<?= $qno; ?>" value = "<?= "c.".$eachQandA["option3"]; ?>" >c)<?php echo $eachQandA["option3"]; ?>
            <input type="radio" id = "<?= "optD".$qno; ?>" name = "<?= $qno; ?>" value = "<?= "d.".$eachQandA["option4"]; ?>" >d)<?php echo $eachQandA["option4"]; ?>
            <b><br><?='Marked option \''.$eachQandA['marked_option']."'"; ?></b><br>
            <?php
                        $qno+=1;
                        echo("<br>");
                    }
                }
            ?>
    </div>

    <center><div class = "buttonContainer">
        <button onclick = "printDiv();">Print Question paper with attempts</button>
        <button onclick = "window.history.back()">Go Back</button>
    </div></center>
  </body>
    <script type="text/javascript">
        var correctOption = []; 
        var markedOption = [];

        function markAnswer(ans){
            markedOption.push(ans);
        }
        
        function storeCorrectAnswer(ans){
            correctOption.push(ans);
        }

        function storeInLocalStorage(e){
            console.log(JSON.stringify(markedOption));
            localStorage.setItem("key", JSON.stringify(markedOption));
            e.preventDefault();
        }
        
        function printDiv(){
            window.print();
        }
    </script>
</html>
