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
        overflow-y: scroll;

    }

    #rrplan {
        height: 85vh;
        border: 2px solid rgba(128, 128, 128, 0.47);
        border-left: 0px;
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

    #rightpan {}

</style>

<body>


    <div class="container">

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
            <div class="col s9" id="rightpan">



            </div>
            <div class="col s2" id="rrplan">
                <?php if($_SESSION['role']!='teacher')
{ ?>
                <h5 class="center">Access tests</h5>
                <div class="collection wall">
                </div>
                <?php
} else {?>
                <a class="btn pulse" id="AddTest" href="#!"> Добавить тест</a>
                <?php }?>

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
        $.ajax({
            type: 'POST',
            url: 'jq_test.php?a=getnametest',
            success: function(data) {
                $(".wall").append(data);
            }
        });

    </script>
    <script>
        var quetion = 1;
        var fd = new FormData();
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

        $('#AddTest').on('click', function() {
            let a = `<h5 class="center">Создание теста</h5><div id = "CTest">
                    </div><div><a id = "saveT"class="btn-small right" href = "#!"><i class="material-icons right">save</i>Сохранить</a></div>`;

            $("#rightpan").append(a);

            $("#saveT").on('click', function() {
                for (let i = 0; i < $(".autocomplete").length; i++) {

                    console.log($('input[type=text][name=quetion' + (i + 1) + ']').val());
                    fd.append("quetion[" + i + "]", $('input[type=text][name=quetion' + (i + 1) + ']').val());
                    var counts = 0;

                    $('input[type=text][name=Ranswer' + (i + 1) + '].validate').each(function() {
                        console.log("Ответы: " + $(this).val());
                        fd.append("answer[" + i + "][" + counts + "]", $(this).val());
                        counts++;

                    });
                    var counts = 0;

                    $('input[type=radio][name=group' + (i + 1) + ']').each(function() {
                        if ($(this).is(':checked')) {
                            fd.append("key[" + i + "]", counts);
                        }
                        counts++;
                    });
                }
                $.ajax({
                    type: 'POST',
                    url: 'jq_test.php?a=addtest',
                    data: fd,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        alert('Тест успешно создан');
                        location.reload();
                    }
                });

            })
            $("#AddTest").hide();
            let b = `<a class='btn-small' id ="addQ" href="#!">Добавить вопрос</a>`;

            $("#rightpan").prepend(b);
            $("#addQ").on('click', function() {
                let a = `<div class="row" >
                    <div class="col s12">
                        <div class="row" >
                            <div class="input-field col s12" id ="${quetion}">
                                <i class="material-icons prefix">forward</i>
                                <input type="text" id="autocomplete-input" class="autocomplete" name="quetion${quetion}">
                                <label for="autocomplete-input">Quetion ${quetion}</label>
                                <a  class = "btn-small addchexbox"><i class="material-icons right">add_box</i>Добавить варианты ответа</a>
                            </div>
                        </div>
                    </div>
                </div>`;
                quetion++;
                $(".addchexbox").unbind();
                $('#CTest').append(a);
                $('.addchexbox').on('click', function() {
                    let id = $(this).parent().attr("id");

                    let a = ` <div class="row"><div class="input-field col s8">
          <input  type="text" class="validate" name= "Ranswer${id}">
          <label for="validate">Answer</label>

        </div><p>
      <label>
        <input name="group${id}" type="radio" checked />
        <span>correct answer</span>
      </label>
    </p></div>`;
                    $(this).before(a);

                })

            })

        })
        $(".wall .center").on('click', function() {
            let id =$(this).attr('id');
            console.log(id);
            return;
            
            $.ajax({
                type: 'POST',
                url: 'jq_test.php?a=getQ',
                data: 'idd='+id,
                success: function(data) {
                    $("#rightpan").html(data);
                }
            });
        })
       
    </script>

</body>

</html>
