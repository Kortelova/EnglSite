<?php
include_once("db.php");
class Test{
   
     public function getQ()
{
        session_start();
   
    $id_creator= $_SESSION['USER_ID'];
    global $mysqli;
    $idsd =$_POST['idd'] -1;
     $s =  $mysqli->query("SELECT * FROM `testcompl` WHERE `id_student`='$id_creator' AND `test_id`='$idsd'");
    if(mysqli_num_rows($s)!=0)
    {
        echo "<h2>Вы уже проходили этот тест</h2>";
        die();
    }
    $mysqli->query("INSERT INTO `testcompl`(`test_id`, `id_student`) VALUES ('$idsd','$id_creator')");
        $html = '';
        $a = $mysqli->query("Select * FROM `testqanda` WHERE `id`=".$_POST['idd']);
        while($row = mysqli_fetch_assoc($a))
        {
            $quetion_list = json_decode($row['quetion']);
            $answer = json_decode($row['Answer']);
            $idQ=$row['id'];

           



            for($i=0;$i<count($quetion_list);$i++)
            {
                
                echo "<div id = 'quetion'.$i class='Quet'>
                      <h4>".($i+1).". $quetion_list[$i]</h4>";
                for($j=0;$j<count($answer[$i]);$j++)
                {   
                    echo '<p>
          <label>
            <input  name="group'.$i.'" type="radio" checked />
            <span>'.$answer[$i][$j].'</span>
          </label>
        </p>';
                }
                  echo "</div>";
            }
            echo "</div>
            <a class = 'btn' id='endtest'>Закончить тест</a>";
        }
        ?>
        <script>
        var fd = new FormData();
           fd.append("testid[0]", <?php echo $idsd;?>);
         $('#endtest').on('click',function(){
        
            for (let i = 0; i < $('.Quet').length; i++) {
                 
                 
                  
                    var counts = 0;
     
                    
               
                    $('input[type=radio][name=group' + (i) + ']').each(function() {
                        if ($(this).is(':checked')) {
                            fd.append("key[" + i + "]", counts);
                              
                        }
                     
                        counts++;
                    });
                }
                $.ajax({
                    type: 'POST',
                    url: 'jq_test.php?a=sendtest',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alert(data);
                        location.reload();
                    }
                });

        })
        </script>
        <?php

        $mysqli->close();
     
}
    public function addtest()
{
    session_start();
    $id_creator= $_SESSION['USER_ID'];
    $q = json_encode($_POST['quetion']);
    $a = json_encode($_POST['answer']);
    $k = json_encode($_POST['key']);
    print_r($k);
    global $mysqli;
    $mysqli->query("INSERT INTO `testtable`(`id_creator`)
                         VALUES('$id_creator')");
     $test_id = $mysqli->insert_id;
        $mysqli->query("INSERT INTO `testqanda`(`quetion`, `Answer`, `keyA`,`test_id`)
                         VALUES('$q','$a','$k','$test_id')");
         $mysqli->close();

     
         print_r($test_id);
    
}
    public function getnametest()
{
    global $mysqli;
    $html = '';
    $a = $mysqli->query("Select * FROM `testqanda`");
    while($row = mysqli_fetch_assoc($a))
    {
        
        $quetion_list = json_decode($row['quetion']);
        $answer = json_decode($row['Answer']);
        $idQ=$row['id'];
        
         echo"<a href='#!'id ='$idQ' class='collection-item center'>Test ".($row['id']+1)."</a>";
        
      
       
//        for($i=0;$i<count($quetion_list);$i++)
//        {
//            
//            echo "<div id = 'quetion$i'>
//                  <h4>".($i+1).". $quetion_list[$i]</h4>";
//            for($j=0;$j<count($answer[$i]);$j++)
//            {   
//                echo '<p>
//      <label>
//        <input name="answer'.$i.'" type="radio" checked />
//        <span>'.$answer[$i][$j].'</span>
//      </label>
//    </p>';
//            }
//              echo "</div>";
//        }
//        echo "</div>";
    }
    echo "<script>$('.wall .center').on('click', function() {
            let id =$(this).attr('id');
            console.log(id);
            
            
            $.ajax({
                type: 'POST',
                url: 'jq_test.php?a=getQ',
                data: 'idd='+id,
                success: function(data) {
                    $('#rightpan').html(data);
                }
            });
        })</script>";
    $mysqli->close();
}
    public function sendtest()
{
    $k = $_POST['key'];
   
    session_start();
     $id_creator= $_SESSION['USER_ID'];
    $test_id=$_POST['testid']['0'];
    global $mysqli;
    $html = '';
    $a = $mysqli->query("Select `keyA` FROM `testqanda` where `test_id`='$test_id'");
    $a = mysqli_fetch_assoc($a);
    $answer =json_decode($a['keyA']);
    $countt =0;
    for($i=0;$i<count($answer);$i++)
    {
        if($answer[$i]==$k[$i])
        {
            $countt++;
        }
    }
    echo "Количество правильных ответов: ".$countt." с ". count($answer);
    $progress = $countt*100/count($answer) ;
    $mysqli->query("UPDATE `testcompl` SET `complete`='1',`progress`='$progress' WHERE `test_id`='$test_id' AND `id_student`='$id_creator'");
    
}
}





function sendtest()
{
  $test = new test;
    $test->sendtest();
}
function getnametest()
{
  $test = new test;
    $test->getnametest();
}
function addtest()
{
  $test = new test;
    $test->addtest();
}
function getQ()
{
  $test = new test;
    $test->getQ();
}
?>
