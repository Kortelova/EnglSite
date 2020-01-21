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
    <div class="container">
        <div class="row">
            <div class="col s4 m6">
                <div class="card">
                    <div class="card-image">
                        <img height = '300px'src="https://www.notimeforflashcards.com/wp-content/uploads/2013/01/sight-word-game-for-kids-.jpg">
                        <span class="card-title">CARD GAME</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="traine.php">Go it</a>
                    </div>
                </div>
            </div>
            <div class="col s4 m6">
                <div class="card">
                    <div class="card-image">
                        <img height = '300px' src="http://prema-coach.ru/wp-content/uploads/2014/01/articulation-exercises.jpg">
                        <span class="card-title">SPEECH TRAINEE</span>
                    </div>
                    <div class="card-content">
                        <p>I am a very simple card. I am good at containing small bits of information.
                            I am convenient because I require little markup to use effectively.</p>
                    </div>
                    <div class="card-action">
                        <a href="speech.php">Go it</a>
                    </div>
                </div>
            </div>
        </div>



    </div>
    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();


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
</body>

</html>
