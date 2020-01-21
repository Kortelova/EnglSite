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
        height: 52vh;
        border: 2px solid rgba(128, 128, 128, 0.47);
        border-left: 0px;
        background-color: white;
        background-image: url(img/3.jpg) ;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: ;
        padding: 10px;
}
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

    .GO a {
        margin-bottom: 10px;
        text-decoration: none;
        color:gray;
    }
    .downrow{
        height: 27vh;
    }
    .downrow  .card{
        height: 27vh;
    }
    .collection a.collection-item{
        color:#574b6e;
    }
    .material-icons
    {
          color:#574b6e;
    }
</style>

<body>

<div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Статистка</h4>
      <div id ="avr" >
          
      </div>
    </div>
    <div class="modal-footer">
      <a href="#!" class="modal-close waves-effect waves-green btn-flat">Agree</a>
    </div>
  </div>
    <div class="container">
        <ul id='dropdown1' class='dropdown-content'>
            <li><a href="#!">one</a></li>
            <li><a href="#!">two</a></li>

        </ul>
        <div class="row no-padign">
            <div class="col s3" id="leftP">
                <div class="collection" style="color:574b6e">
                    <a href="example.php" class="collection-item active">Home</a>
                    <a href="#!" class="collection-item bold">Train</a>
                    <div class="asd">
                        <a href="traine.php" class="collection-item">Flash Cards</a><a href="#!" class="collection-item">Audio Training</a>
                        <a href="speech.php" class="collection-item">Speech Training</a>
                    </div>
                    <a href="#!" class="collection-item">Materials</a>
                    <a href="examplechat.php" class="collection-item">Chat</a>
                
                   
                
                </div>
                <div class="row" style="    position: absolute;
    bottom: 5vh;
    left: 20vw;">
                    <div class="col s4  " style = "margin-left: 1vw" >
                     <a href='#!' id ="EXIT"><i class="medium material-icons right">exit_to_app</i></a></div>
                      <div class="col s4" >
                     <a href='#!' id ="#!"><i class=" medium material-icons right">brightness_low</i></a>
                </div>
            </div>
             </div>
            <div class="col s9" >
               
                 
              
                <div class="row" id="rightpan">
                    <div class="col s3">
                        <a class="waves-effect waves-light btn modal-trigger" href="#modal1">Статистика</a>
                    </div>
                    <div class="col s3 right">
                        <div class="center">
                            <img class="responsive-img circle " src="img/1.jpg" style="border-style: duble;">

                            <div class="card horizontal">

                                <div class="card-stacked">
                                    <div class="card-content left">
                                        <p>Name:
                                            <?php echo $_SESSION["name"];?>
                                        </p>
                                        <p>Second name:
                                            <?php echo $_SESSION["sname"];?>
                                        </p>
                                        <p>Mobile number:
                                            <?php echo $_SESSION["num"];?>
                                        </p>
                                        <p>Group:</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   <div class="row">
                    
                    <div class="downrow">
                    <div class="col s4">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title center">Vocabulary</span>
                                <div class="center">
                                    <i class="large material-icons ">book</i></div>

                            </div>
                            <div class="center GO">
                                <a href="dictionary.php">GO TO VOCABULARY</a>

                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title center">Lessons</span>
                                <div class="center">
                                    <i class="large material-icons ">edit</i></div>

                            </div>
                            <div class="center GO">
                                <a href="#">GO TO THE LESSONS</a>

                            </div>
                        </div>
                    </div>
                    <div class="col s4">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title center">TESTS</span>
                                <div class="center">
                                    <i class="large material-icons ">reorder</i></div>

                            </div>
                            <div class="center GO">
                                <a href="test.php">GO TO THE TESTS</a>

                            </div>
                        </div>
                    </div>


                </div></div>
            </div>


        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.sidenav').sidenav();
            $('.modal').modal();
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
        $.ajax({
                type: 'POST',
                url: 'jq_link.php?a=getstats',
                success: function(data) {
                    $("#avr").html(data);

                }
            });


    </script>
</body>

</html>
