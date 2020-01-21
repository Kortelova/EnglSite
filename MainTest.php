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
    <?php if($_SESSION['role']=='teacher')
{?>
        <div class="col s6 m6">
          <div class="card">
            <div class="card-image">
              <img height = '300px' src="https://st03.kakprosto.ru/tumb/680/images/article/2011/2/3/1_52552a4eeb68352552a4eeb6c1.jpg">
              <span class="card-title ">CREATE TEST</span>
            </div>
            <div class="card-content">
              <p>I am a very simple card. I am good at containing small bits of information.
              I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
              <a href="test.php">Create test</a>
            </div>
          </div>
        </div>
<?php }
        ?>
    <div class="col s6 m6">
      <div class="card">
        <div class="card-image">
          <img height = '300px'src="http://www.studyintorino.it/wp-content/uploads/test.png">
          <span class="card-title">MY TESTS</span>
        </div>
        <div class="card-content">
          <p>I am a very simple card. I am good at containing small bits of information.
          I am convenient because I require little markup to use effectively.</p>
        </div>
        <div class="card-action">
          <a href="test.php?a=mytest">My test</a>
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
