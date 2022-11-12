<?php
session_start(); ?>
<html>

<head>

    <title>Відгуки</title>
    <?php
    require_once('headCommon.php');
    require_once __DIR__ . "/pdo.php";
    ?>

    <script> 
        function update() {
       
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.getElementById("reviews").innerHTML = this.responseText;
                }
            };
            xmlhttp.open("GET", "loadReviews.php", true);
            xmlhttp.send();
        }
    </script>
</head>

<body>
    <header>
        <div class="header-img">
            <div class="header-blur">
                <nav class="navbar navbar-expand-lg navbar-dark" style="background: rgba(0, 0, 0, 0.8);
      position: absolute; width: 100%;
      ">

                    <div class="collapse navbar-collapse ">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Головна</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="3dmodels.php">Модель сонячної системи</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" style="color: white;">Відгуки про сайт</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="jquery.php">jQuery</a>
                            </li>
                        </ul>
                        <?php
                        if (!isset($_SESSION["auth"]) || (isset($_SESSION["auth"]) && $_SESSION["auth"] != true)) {

                        ?>
                            <a class="nav-link" href="signinForm.php" style="position: absolute;
    right: 13%;
    color: white;">Зареєструватися</a>
                            <a class="nav-link" style="position: absolute;
    right: 8%;
    color: white;" href="loginForm.php">Увійти</a>
                        <?php
                        } else {
                        ?>
                            <a class="nav-link" style="position: absolute;
    right: 10%;
    color: white;" href="logout.php">Вийти</a>
                        <?php
                        }
                        ?>
                        <input class="colorPicker form-control form-control-color" type="color" id="colorPicker">
                    </div>
                </nav>
                <p class="header-title" id="title">Відгуки</p>
            </div>
        </div>
    </header>
    <div class="row main">
        <div class="col-1">

        </div>
        <div class="col-10">

            <h3>Відгуки користувачів</h3></br>
            <?php
            if (isset($_SESSION["auth"]) && $_SESSION["auth"] == true) {


            ?>
                <a href="enterReview.php" class="btn btn-outline-dark">Додати відгук</a>

            <?php
            }
            ?>
            <button class="btn btn-outline-dark" id="updateReviews" onclick='update()'>Оновити Відгуки</button>
            </br></br>
            <div id="reviews">
                <?php
                require_once('loadReviews.php'); ?>

            </div>
        </div>
        <div class="col-1"> </div>
    </div>
    <footer>
        <?php require_once('DateShower.php'); ?>


    </footer>
</body>

</html>