<?php
session_start();
if(isset($_SESSION['token']))
{
    if($_SESSION['token']==1)
        header ('Location: example.php');
}
?>

<html>

<head>

    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/x-icon" href="https://static.codepen.io/assets/favicon/favicon-8ea04875e70c4b0bb41da869e81236e54394d63638a1ef12fa558a4a835f1164.ico" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->



    <script src="js/jquery-3.3.1.min.js"></script>
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
    <link rel="mask-icon" type="" href="https://static.codepen.io/assets/favicon/logo-pin-f2d2b6d2c61838f7e76325261b7195c27224080bc099486ddd6dccb469b8e8e6.svg" color="#111" />
    <title>Sign Up</title>
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">


    <style>
        * {
  box-sizing: border-box;
}
          html{
                  background-image: url(../img/16.png);
    /* background-size: cover; */
    position: unset;
    background-position: center;
    /* background-position-y: center; */
    height: 100%;
    
          }
          .panel__box .active{
              height: 230px;
          }
.view__more {
  position: absolute;
  left: 0;
  top: 0;
  padding: 20px 40px;
  background: #616fa5;
  color: #fff;
  transition: all .3s;
}
.view__more:hover {
  background: #717eae;
}

body {
 
  font-family: 'Lato', sans-serif;
}

a {
    text-decoration: none;  
}
#signInBox
        {
            height: 230px;
        }
.panel {
    
  width: 600px;
  margin: auto;
}
.panel__menu {
  width: 100%;
  float: left;
  margin: 20px 0 30px;
    margin-top: 23%;
  position: relative;
}
.panel__menu.second-box hr {
  -webkit-transform: translateX(325%);
          transform: translateX(325%);
}
.panel__menu hr {
  position: absolute;
  top: 100%;
  width: 20%;
  -webkit-transform: translateX(75%);
          transform: translateX(75%);
  border: none;
  background: #C8DFED;
  height: 1px;
  margin: 0;
  transition: all 0.5s;
}
.panel__menu li {
  width: 50%;
  text-align: center;
  float: left;
  cursor: pointer;
}
.panel__menu li a {
  color: #fff;
  display: inline-block;
  padding: 17px 30px;
  text-transform: uppercase;
}
.panel__wrap {
  width: 100%;
  float: left;
  position: relative;
}
.panel__wrap .panel__box label {
  opacity: 0;
}
.panel__wrap .panel__box:first-child {
  left: 0;
  -webkit-transform: translateX(30%) scale(0.8);
          transform: translateX(30%) scale(0.8);
  -webkit-animation: box-1--out 0.5s;
          animation: box-1--out 0.5s;
  -webkit-transform-origin: center right;
          transform-origin: center right;
}
.panel__wrap .panel__box:first-child.active {
  -webkit-transform: translateX(35%);
          transform: translateX(35%);
  -webkit-animation: box-1 0.5s;
          animation: box-1 0.5s;
}
.panel__wrap .panel__box:last-child {
  right: 0;
  -webkit-transform: translateX(-30%) scale(0.8);
          transform: translateX(-30%) scale(0.8);
  -webkit-animation: box-2--out 0.5s;
          animation: box-2--out 0.5s;
  -webkit-transform-origin: center left;
          transform-origin: center left;
}
.panel__wrap .panel__box:last-child input[type="submit"] {
  background: none;
  border: 1px solid #A5E434;
  color: #A5E434;
}
.panel__wrap .panel__box:last-child.active {
  -webkit-animation: box-2 0.5s;
          animation: box-2 0.5s;
  -webkit-transform: translateX(-35%);
          transform: translateX(-35%);
}
          .panel__box::-webkit-scrollbar { width: 0; }

/* ie 10+ */
.panel__box { -ms-overflow-style: none; }
.panel__box {
  width: 50%;
    overflow-y: scroll;
   height: 300px
       ;
  float: left;
  z-index: 1;
  background: pink;
  position: absolute;
  padding: 20px;
  background: #C8DFED;
  border-radius: 4px;
  transition: all 0.5s;
}
.panel__box.active {
  background: #fff;
  z-index: 2;
}
.panel__box.active label, .panel__box.active input {
  opacity: 1;
}
.panel__box label {
  float: left;
  width: 100%;
  margin-bottom: 20px;
  color: #a1b4b4;
}
.panel__box input {
  outline: none;
  opacity: 0;
}
.panel__box input[type="email"], .panel__box input[type="password"] {
  margin-top: 10px;
  width: 100%;
  float: left;
  background: #EEF9FE;
  border: 1px solid #CDDBEF;
  border-radius: 3px;
  padding: 7px 10px;
}
.panel__box input[type="submit"] {
  float: right;
  cursor: pointer;
  border: none;
  padding: 11px 40px;
  background: #A5E434;
  border-radius: 30px;
  color: #fff;
    
}

@-webkit-keyframes box-1 {
  0% {
    -webkit-transform: translateX(30%) scale(0.8);
            transform: translateX(30%) scale(0.8);
    z-index: 1;
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
    label, input {
      opacity: 0;
    }
  }
  100% {
    -webkit-transform: translateX(35%) scale(1);
            transform: translateX(35%) scale(1);
    z-index: 2;
    label, input {
      opacity: 1;
    }
  }
}

@keyframes box-1 {
  0% {
    -webkit-transform: translateX(30%) scale(0.8);
            transform: translateX(30%) scale(0.8);
    z-index: 1;
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
    label, input {
      opacity: 0;
    }
  }
  100% {
    -webkit-transform: translateX(35%) scale(1);
            transform: translateX(35%) scale(1);
    z-index: 2;
    label, input {
      opacity: 1;
    }
  }
}
@-webkit-keyframes box-1--out {
  0% {
    -webkit-transform: translateX(35%) scale(1);
            transform: translateX(35%) scale(1);
    z-index: 2;
    label {
      opacity: 1;
    }
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
    label, input {
      opacity: 1;
    }
  }
  100% {
    -webkit-transform: translateX(30%) scale(0.8);
            transform: translateX(30%) scale(0.8);
    z-index: 1;
    label, input {
      opacity: 0;
    }
  }
}
@keyframes box-1--out {
  0% {
    -webkit-transform: translateX(35%) scale(1);
            transform: translateX(35%) scale(1);
    z-index: 2;
    label {
      opacity: 1;
    }
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
    label, input {
      opacity: 1;
    }
  }
  100% {
    -webkit-transform: translateX(30%) scale(0.8);
            transform: translateX(30%) scale(0.8);
    z-index: 1;
    label, input {
      opacity: 0;
    }
  }
}
@-webkit-keyframes box-2 {
  0% {
    -webkit-transform: translateX(-30%) scale(0.8);
            transform: translateX(-30%) scale(0.8);
    z-index: 1;
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
    label, input {
      opacity: 0;
    }
  }
  100% {
    -webkit-transform: translateX(-35%) scale(1);
            transform: translateX(-35%) scale(1);
    z-index: 2;
    label, input {
      opacity: 1;
    }
  }
}
@keyframes box-2 {
  0% {
    -webkit-transform: translateX(-30%) scale(0.8);
            transform: translateX(-30%) scale(0.8);
    z-index: 1;
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
    label, input {
      opacity: 0;
    }
  }
  100% {
    -webkit-transform: translateX(-35%) scale(1);
            transform: translateX(-35%) scale(1);
    z-index: 2;
    label, input {
      opacity: 1;
    }
  }
}
@-webkit-keyframes box-2--out {
  0% {
    -webkit-transform: translateX(-35%) scale(1);
            transform: translateX(-35%) scale(1);
    z-index: 2;
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
    label, input {
      opacity: 1;
    }
  }
  100% {
    -webkit-transform: translateX(-30%) scale(0.8);
            transform: translateX(-30%) scale(0.8);
    z-index: 1;
    label, input {
      opacity: 0;
    }
  }
}
@keyframes box-2--out {
  0% {
    -webkit-transform: translateX(-35%) scale(1);
            transform: translateX(-35%) scale(1);
    z-index: 2;
  }
  49% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 2;
  }
  50% {
    -webkit-transform: translateX(0) scale(0.9);
            transform: translateX(0) scale(0.9);
    z-index: 1;
    label, input {
      opacity: 1;
    }
  }
  100% {
    -webkit-transform: translateX(-30%) scale(0.8);
            transform: translateX(-30%) scale(0.8);
    z-index: 1;
    label, input {
      opacity: 0;
    }
  }
}

    </style>

    <script>
        window.console = window.console || function(t) {};
</script>



    <script>
        if (document.location.search.match(/type=embed/gi)) {
    window.parent.postMessage("resize", "*");
  }
</script>


</head>

<body translate="no">


    <div class="panel">
        <ul class="panel__menu" id="menu">
            <hr />
            <li id="signIn"> <a href="#">Login</a></li>
            <li id="signUp"><a href="#">Sign up</a></li>
        </ul>
        <div class="panel__wrap">
            <div class="panel__box active" id="signInBox">
               <form id='auform'>
                   <label>Email
                    <input type="email" name="loginA" />
                </label>
                <label>Password
                    <input type="password" name="password" />
                </label>
               </form>
                
               <a id="logbut" href="#!" style="    margin-left: 150px;">Авторизация</a>
                
            </div>
            <div class="panel__box" id="signUpBox">
               <form id ="regform">
                <label>Email
                    <input type="email" name='login' />
                </label>
                <label>Password
                    <input type="password" name='Password' />
                </label>
                <label>Name
                    <input type="email" name='name'>
                </label>
                <label>Second name
                    <input type="email" name='secondname'>
                </label>
                <label>MobilePhone
                    <input name="number" type="email">
                </label>
                <label>Role
                    <select name='role'>

                        <option value="student" disabled selected>Студент</option>
                        <option value="student">Студент</option>
                        <option value="teacher">Преподователь</option>

                    </select>
                </label>
                <label>GROUP(FOR EXAMPLE DA-62)
                    <input type="email"name='group'  />
                </label>
                </form>
               <a id='regbut' href="#!">Регистрация</a>

               
            </div>
        </div>
    </div>
    <script src="//static.codepen.io/assets/common/stopExecutionOnTimeout-de7e2ef6bfefd24b79a3f68b414b87b8db5b08439cac3f1012092b2290c719cd.js"></script>




    <script>
        var menu = document.getElementById('menu'),
            panelMenu = menu.querySelectorAll('li'),
            panelBoxes = document.querySelectorAll('.panel__box'),
            signUp = document.getElementById('signUp'),
            signIn = document.getElementById('signIn');

        function removeSelection() {
            for (var i = 0, len = panelBoxes.length; i < len; i++) {
                panelBoxes[i].classList.remove('active');
            }
        }


        signIn.onclick = function(e) {
            e.preventDefault();
            removeSelection();
            panelBoxes[0].classList.add('active');
            menu.classList.remove('second-box');
        }

        signUp.onclick = function(e) {
            e.preventDefault();
            removeSelection();
            panelBoxes[1].classList.add('active');
            menu.classList.add('second-box');
        }
        //# sourceURL=pen.js

    </script>






    <script src="https://static.codepen.io/assets/editor/live/css_reload-5619dc0905a68b2e6298901de54f73cefe4e079f65a75406858d92924b4938bf.js"></script>
    <script>
       


       


        $('#regbutform').on('click', function() {
            $('#regbutform').addClass('hide');
            $('#Autorization').addClass('hide');
            $('#Registration').removeClass('hide');
            $('#abut').removeClass('hide');
        })
        $('#abut').on('click', function() {
            $('#regbutform').removeClass('hide');
            $('#Autorization').removeClass('hide');
            $('#Registration').addClass('hide');
            $('#abut').addClass('hide');
        })
        $('#regbut').on('click', function() {
            
            var fin = 0;
            $('#regform input').each(function(i, elem) {
                if ($(this).val() == '') {
                   alert('Заполните все поля');
                    fin = 1;

                }
                if($(this).val().length<3)
                   {
                   alert('Длина поля должна быть больше 3 симвлов');
                    fin = 1;

                   }
            });
            if (fin != 1) {
                $.ajax({
                    url: 'jq_link.php?a=reg', //url страницы (action_ajax_form.php)
                    type: "POST", //метод отправки
                    dataType: "html", //формат данных
                    data: $("#regform").serialize(), // Сеарилизуем объект
                    beforeSend: function() {

                    },
                    success: function(data) { //Данные отправлены успешно
                        location.reload();
                    },
                    error: function(response) { // Данные не отправлены
                        alert(response);
                    }
                });
            }
        })
        $('#logbut').on('click', function() {
            
            $.ajax({
                url: 'jq_link.php?a=au', //url страницы (action_ajax_form.php)
                type: "POST", //метод отправки
                dataType: "html", //формат данных
                data: $("#auform").serialize(), // Сеарилизуем объект
                success: function(data) { //Данные отправлены успешно\
                    
                    location.reload();
                    //location.reload();
                },
                error: function(response) { // Данные не отправлены
                    alert(response);
                }
            });
        })

    </script>
</body>

</html>
