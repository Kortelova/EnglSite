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

</style>

<body>


    <div class="container">
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>

        </ul>
        <div class="row no-padign">
            <div class="col s3" id="leftP">
                <div class="collection">
                    <a href="example.php" class="collection-item active">Home</a>
                    <a href="#!" class="collection-item bold">Train</a>
                    <div class="asd">
                        <a href="traine.php" class="collection-item">Flash Cards</a><a href="#!" class="collection-item">Audio Training</a>
                        <a href="speech.php" class="collection-item">Speech Training</a>
                    </div>
                    <a href="#!" class="collection-item">Materials</a>
                    <a href="examplechat.php" class="collection-item">Chat</a>

                </div>
            </div>
            <div class="col s9" id="rightpan">
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
