<?php include("views/commons/head.php") ?>

<body>
    <div class="container p-0 my-5 rounded my_shadow bg-white">
        <!--Header -->
        <header>
            <div class="row align-items-center m-0 bg-light ">
                <div class="col-2 text-center">
                    <!-- <a href="accueil">
                        <img class="img-fluid" style='width:80px'src="public/sources/images/others/LogoSA.svg" alt="logo du site">
                    </a> -->
                </div>
                <div class="col-8 p-3 text-center">
                    <?php include("views/commons/menu.php") ?>
                </div>
            </div>
        </header>
        <!--EndHeader -->
        <!--Contains -->
        <div class="my_minBodySize">
            <?= $content ?>
        </div>
        <!--EndContains -->
        <!--Footer-->
        <footer class="text-center">
            <p class="p-2">&copy; SaveAnimals 2020</p>
        </footer>
        <!--EndFooter-->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Swiper JS -->
    <script src="<?= URL ?>public/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="<?= URL ?>public/js/main.js"></script>

</body>

</html>