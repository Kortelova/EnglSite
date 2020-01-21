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
<style>
    html {
        background-color: white;
    }

    body {
        background-color: white;
    }

    .container {
        margin-top: 10vh;
        height: 85vh;
    }

    #leftP {
        border: 2px solid rgba(128, 128, 128, 0.47);
        height: 85vh;
        background-color: white;
    }

    #listss {
        margin-left: 40px;
    }

    #rightpan {
        height: 85vh;
        border: 2px solid rgba(128, 128, 128, 0.47);
        border-left: 0px;
        background-color: white;
    }

    .row {
        margin-bottom: 0px;
        padding: 0px;
    }

    .collection {
        border: 0px;
    }

    .collection .collection-item {
        border: 0px;
        cursor: pointer;
    }

    .collection.collection-item:hover {

        background-color: rgba(215, 232, 232, 0.38)
    }

    .asd {
        margin-left: 20px;
    }

    .card .card-content {
        padding: 0px;

    }
    .GO{
        margin-bottom: 10px;
    }
    #ChatH{
        height: 10vh;
        overflow-x: scroll;
        overflow-y: hidden;
    }
    .row .col.s2 {
        width: 50px;
    }
    #ChatH::-webkit-scrollbar { width: 0; }

/* ie 10+ */
#ChatH { -ms-overflow-style: none; }

/* фф (свойство больше не работает, других способов тоже нет)*/
#ChatH { overflow: -moz-scrollbars-none; }
</style>

<body>
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

    <div class="container">
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>

        </ul>
        <div class="row no-padign">
            <div class="col s1 center" id="leftP">

                <a href="example.php" class="center  "><i class="medium material-icons">face</i></a>
                <a href="pretraine.php" class="center"><i class="medium material-icons">extension</i></a>
                <a href="dictionary.php" class="center "><i class="medium material-icons">import_contacts</i></a>
                <a href="examplechat.php" class="center"><i class="medium material-icons">chat_bubble_outline</i></a>
                <a href="#!" class="center"><i class="medium material-icons">book</i></a>
                <a href="#!" class="center"><i class="medium material-icons">reorder</i></a>
                <a href="test.php" class="center"><i class="medium material-icons">format_list_bulleted</i></a>


            </div>
            <div class="col s11" id="rightpan">
                <div class="row">
                    <div id='ChatH'>

                    </div>
                </div>
                <div id="send_chat_message">
                    <div class="row">
                        <div id="field_message" style="height: 62vh; background-color:white;overflow-y: scroll;">

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
            

            $('#ChatH').on('click', '.groupClass', function() {
                let a = $(this).attr('id');
                localStorage['lastChannel'] = a;
                $('#field_message').html('');

                setLocation('http://tspp/examplechat.php?namechat=' + a);
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
                        var lid = $('#ChatH').children().last().attr('id');
                        console.log(lid);
                        if (localStorage['lastChannel'] != '') {
                            lid = localStorage['lastChannel'];
                        }
                        setLocation('http://www.postavte100.com/examplechat.php?namechat=' + lid);
                        getMessageChat(lid);
                        $('.tooltipped').tooltip();
                    }
                });
            }
            getchat();

            $("#sendmessage").on('click', function() {
                var url = window.location.href;

                var now = new Date();
                var time = now.getFullYear() + '-' + (now.getMonth() + 1) + '-' + now.getDate() + ' ' + now.getHours() + ':' + now.getMinutes() + ':' + now.getSeconds();

                let message = $("#inputMM").val();
                let counts = (Number($(".MessageC").last().prop('id')) + 1);
                let a = `<div class='MessageC' id ='${(counts)}'><div class='row'>
                <div class='col s6 offset-s1'>
                    <div class='user_m_id' id='<?php echo $_SESSION['USER_ID'];?>'></div>
        <?php echo $_SESSION['name'].' '.$_SESSION['sname'];?>
                </div>
                <div class = 'col s4 right'>
                    <div class='dateM'>${time} </div>
                </div>
            </div>
            <div class='row'>
                <div class='col s1 offset-s1'>
                    <img src='img/1.jpg' alt='' class='circle responsive-img'>
                </div><div class='col s9'>
                    <div>
                     ${message}
                    </div>
                </div>
            </div>
        </div></div>
                    `;
                var hhref = $(location).attr('href');
                var lastIndex = hhref.lastIndexOf("namechat=");

                hhref = hhref.substring((lastIndex + 9), (lastIndex + 18));
                $("#field_message").append(a);
                $.ajax({
                    type: 'POST',
                    url: 'jq_link.php?a=sendmessage',
                    data: 'message=' + message + '&namechat=' + hhref,
                    success: function(data) {

                        console.log(data);
                    }
                });

            })
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
            setInterval(function() {
                var hhref = $(location).attr('href');
                var lastIndex = hhref.lastIndexOf("namechat=");

                hhref = hhref.substring((lastIndex + 9), (lastIndex + 18));
                getMessageChat(hhref);
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
        $("#modal2").on('click', '.sendml',
            function() {
                let reciver_id = $(this).attr('id');
                $.ajax({
                    type: 'POST',
                    url: 'jq_link.php?a=createchat',
                    data: 'reciver_id=' + reciver_id,

                    success: function(data) {


                    }
                });
            })

    </script>
</body>

</html>
