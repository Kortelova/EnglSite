<?php
    session_start();
if(!isset($_SESSION['token']))
{
    header ('Location: index.php');
}
?>
<!DOCTYPE HTML>
<html>

<head>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <meta charset="utf-8">
    <title>Learn and play</title>
</head>


<body>

    <?php
    require("menu.php");
    ?>
    <div id="modal1" class="modal">
        <div class="modal-content">
            <h3 class="center">Proffile
                <?php echo $_SESSION["name"]." ".$_SESSION["sname"];?>
            </h3>
            <h4>Name:
                <?php echo $_SESSION["name"];?>
            </h4>
            <h4>Second name:
                <?php echo $_SESSION["sname"];?>
            </h4>
            <h4>Mobile number:
                <?php echo $_SESSION["num"];?>
            </h4>
            <h4>Group:</h4>


        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
        </div>
    </div>
    <div id="modal2" class="modal">
        <div class="modal-content" id="conProf">


        </div>
        <div class="modal-footer">
            <a href="#!" class="modal-close waves-effect waves-green btn-flat">Закрыть</a>
        </div>
    </div>
    <div class="container" style="height: 90vh;">





        <div class="row">
            <div class="col s3" id='users_icon' style="border-right: 1px solid rgba(128, 128, 128, 0.58);">
                <div class="profile">
                    <div id="profile_photo">

                        <div class="card-panel grey lighten-5 z-depth-1">
                            <div class="row valign-wrapper">
                                <div class="col s12">
                                    <img src="img/1.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
                                    <br>
                                    <div class="center">

                                        <a class="waves-effect waves-light btn modal-trigger purple darken-4" href="#modal1" id="MainName">
                                            <?php echo $_SESSION["name"]." ".$_SESSION["sname"];?></a>
                                    </div>

                                </div>

                            </div>
                        </div>

                    </div>

                </div>
                <div id="search_message">


                    <div class="input-field col s12">
                        <i class="material-icons prefix">search</i>
                        <input type="text" id="autocomplete-input" class="autocomplete">
                        <label for="autocomplete-input">Поиск</label>
                    </div>

                </div>
                <div id='ChatH'>

                </div>
            </div>



            <div class="col s9 " style="height: 90vh;">
                <div id="send_chat_message">
                    <div class="row">
                        <div id="field_message" style="height: 80vh; background-color:white;overflow-y: scroll;">

                        </div>
                        <div id="smf" style="height: 10vh">
                            <div class="row">
                                <div class="input-field col s9 offset-s1">
                                    <i class="material-icons prefix">sms</i>
                                    <input type="text" id="inputMM" class="autocomplete">
                                    <label for="input">Отправить сообщение</label>

                                </div>

                                <div class="input-field col s2">
                                    <a id="sendmessage"><i class="material-icons prefix right">send</i></a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>




    <script>
        $(document).ready(function() {

            $('.sidenav').sidenav();
            $('.modal').modal();
            $("#field_message").scrollTop('9999999999');

            $('#ChatH').on('click', '.groupClass', function() {
                let a = $(this).attr('id');
                $('#field_message').html('');
                setLocation('http://tspp/profile.php?namechat=' + a);
                getMessageChat(a);
            });

            function setLocation(curLoc) {
                try {
                    history.pushState(null, null, curLoc);
                    return;
                } catch (e) {}

            }

            function getMessageChat(chatID) {

                let lastmessagechat = $('#field_message').children().last().attr('id');
                console.log(lastmessagechat);
                $.ajax({
                    type: 'POST',
                    url: 'jq_link.php?a=getMessageChat',
                    data: 'Chat_id=' + chatID + '&lastmessagechat=' + lastmessagechat,
                    success: function(data) {

                        $('#field_message').append(data);



                    }
                });
            }

            function getchat() {
                $.ajax({
                    type: 'POST',
                    url: 'jq_link.php?a=getMyChat',
                    success: function(data) {

                        $('#ChatH').append(data);
                        $lid = $('#ChatH').children().last().attr('id');
                        console.log($lid);
                        setLocation('http://tspp/profile.php?namechat=' + $lid);
                        var hhref = $(location).attr('href');
                        var lastIndex = hhref.lastIndexOf("namechat=");

                        hhref = hhref.substring((lastIndex + 9), 50);

                        getMessageChat(hhref);

                    }
                });
            }
            getchat();
            $("#sendmessage").on('click', function() {
                console.log('asdasd');
                let message = $("#inputMM").val();
                let count = $(".MessageC").length;
                let a = `<div class ='MessageC' id ="${(count+1)}"> 
            
        <div class="grey lighten-5 z-depth-1">
          <div class="row valign-wrapper">
            <div class="col s2">
              <img src="img/1.jpg" alt="" class="circle responsive-img"> <!-- notice the "circle" class -->
            </div>
            <div class="col s10">
              <span class="black-text">
                ${message}
              </span>
            </div>
          </div>
        </div>
      </div>
            `;
                $("#field_message").append(a);
                $.ajax({
                    type: 'POST',
                    url: 'jq_link.php?a=sendmessage',
                    data: 'message=' + message + '&namechat=' +
                        <?php if(isset($_GET['namechat']))echo $_GET['namechat'];
                 else echo '-1';?>,
                    success: function(data) {

                        console.log(data);
                    }
                });

            })
            setTimeout(function() {
                $("#field_message").scrollTop('9999999999');
            }, 1000);


            $('#field_message').on('click', '.user_m_id', function() {
                let id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'jq_link.php?a=getuserinfo',
                    data: 'user_id=' + id,

                    success: function(data) {

                        $('#conProf').html(data);
                        $('#modal2').modal('open');
                    }
                });
            })
        });

    </script>
</body>

</html>
