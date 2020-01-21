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

    .GO {
        margin-bottom: 10px;
    }
a{
        color:black;
    }
    
    .act{
         color:lightcoral;
    }
</style>

<body>


    <div class="container">
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>

        </ul>
        <div class="row no-padign">
            <div class="col s1 center" id="leftP">
               
                    <a href="example.php" class="center  "><i class="medium material-icons">face</i></a>
                    <a href="pretraine.php" class="center"><i class="medium material-icons">extension</i></a>
                    <a href="#!" class="center"><i class="medium material-icons">import_contacts</i></a>
                    <a href="examplechat.php" class="center act"><i class="medium material-icons">chat_bubble_outline</i></a>
                    <a href="dictionary.php" class="center"><i class="medium material-icons">book</i></a>
                    <a href="#!" class="center"><i class="medium material-icons">reorder</i></a>
                    <a href="#!" class="center"><i class="medium material-icons">format_list_bulleted</i></a>
                    
                
            </div>
            <div class="col s11" id="rightpan">
                <h2 class="center">Тренировка речи</h2>
                <div class="row" id='cardgame'>

                    <input type="text" id="textInput">
                </div>
                <button class="btn pulse" id="hearing" onclick="speech ()">Слушать</button>



            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();

            $('.dropdown-trigger').dropdown();
        });
        $('#EXIT').on('click', function() {
            $.ajax({
                type: 'POST',
                url: 'jq_link.php?a=logout',
                success: function(data) {
                    location.reload();

                }
            });

        })

    </script>
    <script>
        // Создаем распознаватель
        var recognizer = new webkitSpeechRecognition();

        // Ставим опцию, чтобы распознавание началось ещё до того, как пользователь закончит говорить
        recognizer.interimResults = true;

        // Какой язык будем распознавать?
        recognizer.lang = 'en-us';

        // Используем колбек для обработки результатов
        recognizer.onresult = function(event) {

            var result = event.results[event.resultIndex];
            if (result.isFinal) {
                $('#textInput').val(result[0].transcript);
            }
        };

        function speech() {
            $('#hearing').removeClass('pulse');
            M.toast({
                html: 'Запись'
            });
            // Начинаем слушать микрофон и распознавать голос
            recognizer.start();
        }

    </script>
</body>

</html>
