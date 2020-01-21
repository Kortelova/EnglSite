<?php
class Chat{
    private $user_id;
    private $chat_name;
    private $lastmsg;
    public function setid($id)
    {
        $this->user_id=$id;
    }
     public function setcname($chat_name)
    {
        $this->chat_name=$chat_name;
    }
    public function setlastmsg($setlastmsg)
    {
         $this->lastmsg=$setlastmsg;
    }
    private function checkchat($idpartner)
    {
         global $mysqli;
    }
    public function createchat($idpartner)
    {
        
    }
    function getChat()
    {
        global $mysqli;
        $uid= $this->user_id;
        $a = $mysqli->query("SELECT ci.NAME, ci.Chat_id FROM `userchat` as u JOIN `chatid` as ci on u.Chat_id=ci.Chat_id WHERE u.UserID='$uid'");
        
        while($row = mysqli_fetch_assoc($a))
        {
            $id = $row['Chat_id'];
            $name = $row['NAME'];
           
          echo "<div id = '$id' class = 'groupClass center'>
           <div class='col s2 center'>
          
                 <img src='img/1.jpg' height='39vh' class='circle tooltipped'  data-position='top' data-tooltip='$name'>
    </div>
            </div>
           
                </div>";            
        }
        
        $mysqli->close();
   
    }
    function getMessageChat()
    {
        global $mysqli;
        $uid= $this->user_id;
        $a = $mysqli->query("SELECT   ");
        
        while($row = mysqli_fetch_assoc($a))
        {
            $id = $row['Chat_id'];
            $name = $row['Name'];
           
          echo "<div id = '$id'>
         
            <i class='material-icons left'>group</i>$name<br>
            <div>last message</div>
             <hr>
                </div>
               ";
            
        }
        
        $mysqli->close();
   
    }
    function ssendmessage($text)
    {
        
        global $mysqli;
        $uid= $this->user_id;
        $cn = $this-> chat_name;
          
        $mysqli->query("INSERT INTO `message`( `message`, `fromID`, `chatID`) VALUES ('$text','$uid','$cn')");
       
        $mysqli->close();
    }
    function getsMessageChat()
    {
        global $mysqli;
        $uid= $this->user_id;
         
        $res = $mysqli->query("SELECT * FROM `userchat`
                           Where `UserID`='$uid' AND `Chat_id` = '$this->chat_name' ");
        
        $res = mysqli_fetch_assoc($res);
       
       
        $res = $res['id'];
        
     
        if(empty($res))
        {
            
             print_r ($this->chat_name);
            

        }
         else{
           
        $b = $mysqli->query("SELECT `ID`,`message`,`fromID`,`datemess` FROM `message` WHERE `chatID`='$this->chat_name' ORDER BY `ID` DESC LIMIT 1");
        $row = mysqli_fetch_assoc($b);
        if($row['ID']!=$this->lastmsg)
        {
            
        $a = $mysqli->query("SELECT `ID`,`message`,`fromID`,`datemess` FROM `message` WHERE `chatID`='$this->chat_name' AND `ID`>'$this->lastmsg'");
        
        while($row = mysqli_fetch_assoc($a))
        {
            $From_id = $row['fromID'];
            $message = $row['message'];
            $date = $row['datemess'];
            $id = $row['ID'];
            $b ='';
            $c = '';
            $trow = $mysqli->query("SELECT * FROM `users` where `ID`='$From_id'");
            $trow = mysqli_fetch_assoc($trow);
            $name = $trow['uname'];
            $sname = $trow['usecondname'];
            
            if($uid==$From_id)
            {
                $b = "<div class='MessageC' id ='$id'><div class='row'>
        <div class='col s6 offset-s1'>
            <div class='user_m_id' id=' $From_id'>$name $sname </div>
        </div>
        <div class = 'col s4 right'>
            <div class='dateM'>$date </div>
        </div>
    </div>
    <div class='row'>
        <div class='col s1 offset-s1'>
            <img src='img/1.jpg' alt='' class='circle responsive-img'>
        </div><div class='col s9'>
            <div>
              $message 
            </div>
        </div>
    </div>
</div></div>";
            }
            else
            {
                $b = "<div class='MessageC' id='$id'><div class='row'>
                  <div class = 'col s4 left offset-s1'>
            <div class='dateM'>$date </div>
        </div>
        <div class='col s6  '>
            <div class='user_m_id right' id=' $From_id'>$name $sname </div>
        </div>
      
    </div>
    <div class='row'>
        <div class='col s9 offset-s1 '>
            <div style='text-align: right;'>
             $message 
            </div>
        </div>
        <div class='col s1 '>
            <img src='img/1.jpg' alt='' class='circle responsive-img'>
        </div>
    </div>
</div>";
            }
// echo "<div class='MessageC' id='$id'>
    //
    // <div class='grey lighten-5 z-depth-1'>
        // <div class='row valign-wrapper'>
            // $b
            // <div class='col s10'>
                // <span class='black-text'>
                    // $message
                    // </span>
                // </div>
            //
            // </div>
        // </div>
    // </div>";
            




echo $b;
            echo $c;
    
        


        }
        
        $mysqli->close();
         }
         }
        
    }
    
}

function getMyChat()
{
    session_start();
    $ch =new Chat;
    $ch->setid($_SESSION['USER_ID']);
    $ch->getChat();
    
}
function sendmessage(){
    
    session_start();
    $ch =new Chat;
    $ch->setid($_SESSION['USER_ID']);
    $ch->setcname($_POST['namechat']);
  
    $ch->ssendmessage(htmlspecialchars($_POST['message']));
}
function getssMessageChat()
{
    session_start();
    $ch =new Chat;
    $ch->setid($_SESSION['USER_ID']);
    $ch ->setlastmsg($_POST['lastmessagechat']);
    $ch->setcname($_POST['Chat_id']);
     $ch->getsMessageChat();
}





?>
