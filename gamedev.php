<?php
class Game{
private $ua_word;
private $engword;

public function getcard()
{
    global $mysqli;
        
        $a = $mysqli->query("SELECT * FROM `maindictionary` ORDER BY RAND() Limit 3");
        $count = 0;
      
     
        while($row = mysqli_fetch_assoc($a))
        {
            $id = $row['id'];
            $ua = $row['Ua'];
            $eng = $row['Eng'];
            
            echo " <div class='col s4  cards center g'id = '$id' >
               <h4>$ua</h4>
           </div>";
             echo " <div class='col s4  cards center g'id = '$id'>
               <h4>$eng</h4>
           </div>";
        }
   
        echo" <script>
            var count = 0;
            var mid = -1;
            $('.cards').on('click', function() {
                
                if(mid == -1 )
                {
                    count++;
                    $(this).attr('disabled');
                    mid = $(this).attr('id');
                     $(this).css('background-color', 'green');
                    
                }
                else if(mid == $(this).attr('id'))
                    {
                    
                    
                    
                    $('#'+mid).remove();
                    $('#'+mid).remove();
                     M.toast({
                            html: $(this).text()+'!'
                        });
                    
                    count++;
                    if (count==2)
                    {
                        mid = -1;
                        count = 0;
                    }
                }
                else
                {
                $('.g').each(function(i,elem) {
                    
                    $(this).css('background-color', 'white');
                    
                        
                });
                    
                mid = -1;
                }
            })
        </script>";
         $mysqli->close();
}

}
function getcard($arr)
{
    $game = new Game;
    $game->getcard();
}
?>