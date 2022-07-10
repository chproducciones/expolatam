<!DOCTYPE html>
<html>

<head>
    <title>Expolatam</title>
    <!-- 
        PRINCIPAL VIEW --OTHERS ARE FOR VIEW JUST DESIGN WITH CONTAINS JQUERY  /js-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Expolatam " />

    <!-- //for-mobile-apps -->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <!-- js -->
    <script src="js/jquery.min.js"></script>
    <!-- //js -->
    <!-- cart -->
    <script src="js/simpleCart.min.js">

    </script>

    <script src="js/solicitudes.js">

    </script>
    <!-- cart -->
    <link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
    <!-- for bootstrap working -->
    <script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
    <!-- //for bootstrap working -->
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Lato:400,100,100italic,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
    <!-- animation-effect -->
    <link href="css/animate.min.css" rel="stylesheet">
    <script src="js/wow.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/css/iziToast.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/izitoast/1.4.0/js/iziToast.min.js" integrity="sha512-Zq9o+E00xhhR/7vJ49mxFNJ0KQw1E1TMWkPTxrWcnpfEFDEXgUiwJHIKit93EW/XxE31HSI5GEOW06G6BF1AtA==" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- //animation-effect -->
</head>

<!-- js -->
<script type="application/x-javascript">
    addEventListener("load", function() {

        setTimeout(hideURLbar, 0);
        // GetFerias();
        var texts = new Array();
        texts.push("VIRTUAL");
        texts.push("ATRACTIVO");
        texts.push("INMERSIVO");
        texts.push("DE FÁCIL USO");

        var point = 0;

        function changeText() {
            $(".textC").html(texts[point]);
            if (point < texts.length - 1) {
                point++;
            } else {
                point = 0;
            }
        }
        changeText();
        setInterval(changeText, 1000)

        /*$(".card-body").hover(function() {
                $(this).css("background", "#AEB6BF");
                $(this).addClass('text-white shadow-lg')
                $(this).removeClass('text-dark')
            },
            function() {
                $(this).css("background", "#FFF");
                $(this).addClass('text-dark')
                $(this).removeClass('text-white shadow-lg')
            });*/

        $("#id_partner").click(function() {
            $("#div_datetime").hide();
            $("#offcanvasRightLabel").text('Conviertete en socio')

        })

        $("#id_demo").click(function() {
            $("#div_datetime").show();
            $("#offcanvasRightLabel").text('Solicitar Demo')
        })

    }, false);

    function hideURLbar() {
        window.scrollTo(0, 1);
    }

    function GetFerias() {

        $.ajax({
            type: "POST",
            dataType: "json",
            url: "Ajax/GetFerias.php",

            success: function(r) {
                console.log("BIEN --", r);

                var newHtml = "";
                var feriaActivaHtml = "";
                var year = "";
                var month = "";
                var day = "";
                var UrlFeriaActiva = "";

                $.each(r, function(index, course) {
                    var urlImage = "";
                    var now = new Date(course.date)
                    year = now.getFullYear();
                    month = now.getMonth()
                    day = now.getDay()


                    if (course.image != null && course.image != "")
                        urlImage = course.url_fair + "/storage/fair-title-image/normal/" + course
                        .image;
                    else
                        urlImage = "images/expolatam.png";

                    if (index == 0) {
                        //FERIA ACTIVA
                        $('.carousel-inner').append($('<div class="carousel-item item active"><img class="d-block img-fluid" src=' + urlImage + '></div>'));
                        /*newHtml =
                            "<div class='col-md-3 bg-white new-collections-grid rounded shadow p-2 m-2'> <div  class='new-collections-grid1' data-wow-delay='.5s'>" +
                            " <div class='new-collections-grid1-image timer-grid-right1'><img style=' max-width: 100%;' src='" +
                            urlImage + "' class='img-responsive' />  <div class='timer-grid-right-pos' style=' max-width:100px; font-size:12px;'><h4>Feria Activa</h4></div>" +
                            "<div class='new-collections-grid1-image-pos d-none'> <a target='blank' href='" +
                            course.url_fair + "'>Ver feria</a> </div>  </div>" +
                            "<h4  class='d-none'>" + course.name + "</h4> <p  class='d-none'>" + course.description +
                            "</p></div></div>";*/

                        newHtml = " <div class='carousel-item active'><img class='d-block w-80' src='" + urlImage + "'></div>"

                    } else {
                        $('.carousel-inner').append($('<div class="carousel-item item active"><img class="d-block img-fluid" src=' + urlImage + '></div>'));
                        //FERIAS PASADAS
                        /*newHtml +=
                            "<div class='col-md-3 bg-white new-collections-grid rounded shadow p-2 m-2'> <div  class='new-collections-grid1' data-wow-delay='.5s'>" +
                            " <div class='new-collections-grid1-image'><img style='max-height: 200px; max-width: 100%;' src='" +
                            urlImage + "' class='img-responsive' />" +
                            "<div class='new-collections-grid1-image-pos d-none'> <a target='blank' href='" +
                            course.url_fair + "'>Ver feria</a> </div>  </div>" +
                            "<h4 class='d-none'>" + course.name + "</h4> <p  class='d-none'>" + course.description +
                            "</p></div></div>";*/

                        newHtml = " <div class='carousel-item'><img class='d-block w-80' src='" + urlImage + "'></div>"

                    }

                });

                //$("#feria_activa").empty().html(feriaActivaHtml);
                //$(".carousel-inner").empty().html(newHtml);
                $('.carousel').carousel();
            },
            error: function(h) {
                console.log(h);
            }

        });
    }

    function Timer(year, month, days) {
        const second = 1000,
            minute = second * 60,
            hour = minute * 60,
            day = hour * 24;
        // let countDown = new Date('Nov 9, 2020 12:00:00').getTime(),
        let countDown = new Date('' + month + ' ' + days + ', ' + year + ' 12:00:00').getTime(),
            x = setInterval(function() {

                let now = new Date().getTime(),
                    distance = countDown - now;

                document.getElementById('dias').innerText = Math.floor(distance / (day)),
                    document.getElementById('horas').innerText = Math.floor((distance % (day)) / (hour)),
                    document.getElementById('minutos').innerText = Math.floor((distance % (hour)) / (minute)),
                    document.getElementById('segundos').innerText = Math.floor((distance % (minute)) / second);


            }, second)
    }
</script>
<script src="js/jquery.min.js"></script>
<!-- //js -->
<!-- cart -->
<script src="js/simpleCart.min.js"></script>
<!-- cart -->
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<script src="js/wow.min.js"></script>
<script>
    new WOW().init();
</script>
<script src="js/jquery.wmuSlider.js"></script>

<script src="js/jquery.countdown.js"></script>
<script src="js/script.js"></script>

<body>
    <!-- header -->
    <div class="header">
        <div class="container">
            <div class="header-grid">

                <div class="header-grid-left logo-nav-left zoomIn animated wow slideInLeft" data-wow-delay=".5s">
                    <img src="images/logo-2.png" class="img-responsive mb-1">

                </div>

                <div class="header-grid-right animated wow slideInRight" data-wow-delay=".5s">

                    <ul class="social-icons d-none">
                        <li>
                            <a href="#" class="facebook"></a>
                        </li>
                        <li>
                            <a href="#" class="twitter"></a>
                        </li>
                        <li>
                            <a href="#" class="g"></a>
                        </li>
                        <li>
                            <a href="#" class="instagram"></a>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>

        </div>
    </div>
    <!-- //header -->

    <!-- banner -->
    <div class="banner">

        <div class="container">
            <div class="banner-info animated wow zoomIn " style="text-align:center;" data-wow-delay=".5s">
                <div class="d-flex flex-row justify-content-center">
                    <h3 class="p-2" style="font-family: Glyphicons Halflings; color: #4C4C4C"> Ferias</h3>
                    <h3 class="p-2 text-white" style=" font-family: Glyphicons Halflings; background: #4F77FA; text-align:center;"> Virtuales</h3>

                </div>

                <div class="d-flex flex-row justify-content-center mt-5">
                    <h5 class="p-2 " style="font-family: Glyphicons Halflings; color: #4C4C4C; font-size:24px;"> IMPACTA A LOS VISITANTES CON UN EVENTO</h5>
                    <h5 class="p-2 text-white textC" style=" font-family: Glyphicons Halflings;font-size:24px; background: #4F77FA; text-align:center;"> VIRTUALES</h5>

                </div>
            </div>
        </div>
    </div>

    <div class="container mt-5" style="margin-bottom: -100px;">
        <div class="row justify-content-center">
            <div class="col-sm-4">
                <div class="card card-flip h-100  animated wow slideInUp">
                    <div class="card-front text-white " style="text-align: center;  background-color: #4F77FA;">
                        <div class="card-body m-5  d-flex flex-row justify-content-center">
                            <h3 class="p-2 mt-5 mb-5 text-white" style="font-family: Glyphicons Halflings;"> Feria</h3>
                            <h3 class="p-2 mt-5 mb-5 bg-white" style=" font-family: Glyphicons Halflings; color: #4F77FA; text-align:center;"> Virtual</h3>

                        </div>
                    </div>
                    <div class="card-back bg-white text-white">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #4F77FA; font-family: Glyphicons Halflings;">¿POR QUE REALIZAR UNA FERIA VIRTUAL?</h5><br>

                            <p class="card-text" style="color: #4C4C4C; font-size:15px; font-family: Glyphicons Halflings;">* COSTO EN IMPLEMENTACION Y DIFUSÓN <br>
                                * MAYOR ALCANCE GEOGRÁFICO NACIONAL E INTERNACIONAL<br>
                                * PÚBLICOS OBJETIVOS FOCALIZADOS<br>
                                * ACCESO DESDE CUALQUIER DISPOSITIVO<br>
                                * ALTAMENTE MEDIBLE Y TRAZABLE</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-flip h-100 animated wow slideInUp">
                    <div class="card-front text-white" style="text-align: center;  background-color: #4F77FA;">
                        <div class="card-body m-5  d-flex flex-row justify-content-center">
                            <h3 class="p-2 mt-5 mb-5 bg-white" style=" font-family: Glyphicons Halflings; color: #4F77FA; text-align:center;"> Rueda</h3>
                            <h3 class="p-2 mt-5 mb-5 text-white" style="font-family: Glyphicons Halflings;"> Negocios </h3>

                        </div>

                    </div>
                    <div class="card-back bg-white text-white">
                        <div class="card-body">

                            <h5 class="card-title" style="color: #4F77FA; font-family: Glyphicons Halflings;">¿POR QUE REALIZAR UNA RUEDA DE NEGOCIOS?</h5> <br>
                            <p class="card-text justify-content-center" style="color: #4C4C4C; font-size:15px; font-family: Glyphicons Halflings;">* REGISTRO DE PARTICIPANTES<br>
                                * VERIFICACIÓN DE AGENDA DE REUNIONES<br>
                                * REUNIÓN VIRTUAL DE CITAS PROGRAMADAS<br>
                                * ENCUESTA DE INTENCIONES DE NEGOCIOS<br>
                                * ANALÍTICAS DEL ENCUENTRO</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="card card-flip h-100 animated wow slideInUp">
                    <div class="card-front text-white " style="text-align: center;  background-color: #4F77FA;">
                        <div class="card-body m-5  d-flex flex-row justify-content-center">
                            <h3 class="p-2 mt-5 mb-5 bg-white" style=" font-family: Glyphicons Halflings; color: #4F77FA; text-align:center;"> Negocios</h3>
                        </div>

                    </div>
                    <div class="card-back bg-white">
                        <div class="card-body">

                            <h5 class="card-title" style="color: #4F77FA; font-family: Glyphicons Halflings;">TRANSFORMANDO LA MANERA DE HACER NEGOCIOS</h5><br>
                            <p class="card-text" style="color: #4C4C4C; font-size:15px; font-family: Glyphicons Halflings;">* PLATAFORMA 100% PERSONALIZABLE<br>
                                * AMIGABE CON EL MEDIO AMBIENTE<br>
                                * ALTO ROI Y DATOS EN TIEMPO REAL<br>
                                * EXPERIENCIA DEL USUARIO INTEGRAL<br>
                                * POTENCIA VENTAS EN EL MUNDO ONLINE</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class='cell d-none'>
        <div class='caption'>

            <h3 class="p-2 mt-5 mb-5 bg-white" style=" font-family: Glyphicons Halflings; color: #4F77FA; text-align:center;"> Negocios</h3>
        </div>
        <div class='back'>
            <div class="m-5 p-5 d-flex flex-row justify-content-center" style="text-align: center;  background-color: #4F77FA;">
                HOLA
            </div>
        </div>
    </div>


    <div class="bootstrap-tab animated wow slideInUp mx-auto d-none" style="width: 80%;" data-wow-delay=".5s">
        <div class="row">
            <div class="col">
                <div class="men-position animated wow slideInUp" data-wow-delay=".5s">
                    <img src="images/banner.1.png" alt=" " class="img-responsive" />
                    <div class="men-position-pos d-none">
                        <h4>Summer collection</h4>
                        <h5><span>55%</span> Flat Discount</h5>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
                    <ul id="myTab" class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Feria virtual</a></li>
                        <li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Rueda de negocios</a></li>
                        <li role="presentation"><a href="#negocio" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Negocios</a></li>

                    </ul>
                    <div id="myTabContent" class="tab-content visible">
                        <div role="tabpanel" class="tab-pane fade in active bootstrap-tab-text" id="home" aria-labelledby="home-tab">
                            <h5>¿POR QUE REALIZAR UNA FERIA VIRTUAL?</h5>

                            <p>* COSTO EN IMPLEMENTACION Y DIFUSÓN <br>
                                * MAYOR ALCANCE GEOGRÁFICO NACIONAL E INTERNACIONAL<br>
                                * PÚBLICOS OBJETIVOS FOCALIZADOS<br>
                                * ACCESO DESDE CUALQUIER DISPOSITIVO<br>
                                * ALTAMENTE MEDIBLE Y TRAZABLE</p>

                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="profile" aria-labelledby="profile-tab">
                            <h5>¿POR QUE REALIZAR UNA RUEDA DE NEGOCIOS?</h5>
                            <p>* REGISTRO DE PARTICIPANTES<br>
                                * VERIFICACIÓN DE AGENDA DE REUNIONES<br>
                                * REUNIÓN VIRTUAL DE CITAS PROGRAMADAS<br>
                                * ENCUESTA DE INTENCIONES DE NEGOCIOS<br>
                                * ANALÍTICAS DEL ENCUENTRO</p>


                        </div>
                        <div role="tabpanel" class="tab-pane fade bootstrap-tab-text" id="negocio" aria-labelledby="profile-tab">
                            <h5>TRANSFORMANDO LA MANERA DE HACER NEGOCIOS</h5>
                            <p>* PLATAFORMA 100% PERSONALIZABLE<br>
                                * AMIGABE CON EL MEDIO AMBIENTE<br>
                                * ALTO ROI Y DATOS EN TIEMPO REAL<br>
                                * EXPERIENCIA DEL USUARIO INTEGRAL<br>
                                * POTENCIA VENTAS EN EL MUNDO ONLINE</p>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <div class="wmuSlider example1 mx-auto mt-5 zoomIn animated wow slideInLeft d-none" data-wow-delay=".5s" style="width: 60%;">

        <div class="wmuSliderWrapper">
            <article style="position: absolute; width: 10%; opacity: 10;">
                <div class="banner-wrap rounded" style="background-image: linear-gradient( #141111, #AFA5A5); padding-left: 15px;">
                    <div>
                        <h4 class="text-white pt-4">¿POR QUE REALIZAR UNA FERIA VIRTUAL?</h4>
                        <ul class="text-white mt-3">
                            <li>BAJO COSTO EN IMPLEMENTACION Y DIFUSÓN</li>
                            <li>MAYOR ALCANCE GEOGRÁFICO NACIONAL E INTERNACIONAL</li>
                            <li>PÚBLICOS OBJETIVOS FOCALIZADOS</li>
                            <li>ACCESO DESDE CUALQUIER DISPOSITIVO</li>
                            <li>ALTAMENTE MEDIBLE Y TRAZABLE</li>
                        </ul>
                    </div>
                </div>
            </article>
            <article style="position: absolute; width: 100%; opacity:10;">
                <div class="banner-wrap rounded" style="background-image: linear-gradient( #141111, #AFA5A5);padding-left: 15px;">
                    <div>
                        <h4 class="text-white mx-auto pt-4">¿POR QUE REALIZAR UNA RUEDA DE NEGOCIOS?</h4>
                        <ul class="text-white mt-3">
                            <li>REGISTRO DE PARTICIPANTES</li>
                            <li>VERIFICACIÓN DE AGENDA DE REUNIONES</li>
                            <li>REUNIÓN VIRTUAL DE CITAS PROGRAMADAS</li>
                            <li>ENCUESTA DE INTENCIONES DE NEGOCIOS</li>
                            <li>ANALÍTICAS DEL ENCUENTRO</li>
                        </ul>
                    </div>
                </div>
            </article>
            <article style="position: absolute; width: 100%; opacity: 10;">
                <div class="banner-wrap rounded" style="background-image: linear-gradient( #141111, #AFA5A5); padding-left: 15px; padding-right:15px;">
                    <div>
                        <h4 class="text-white mx-auto pt-4">TRANSFORMANDO LA MANERA DE HACER NEGOCIOS</h4>
                        <ul class="text-white mt-3">
                            <li>PLATAFORMA 100% PERSONALIZABLE</li>
                            <li>AMIGABE CON EL MEDIO AMBIENTE</li>
                            <li>ALTO ROI Y DATOS EN TIEMPO REAL</li>
                            <li>EXPERIENCIA DEL USUARIO INTEGRAL</li>
                            <li>POTENCIA VENTAS EN EL MUNDO ONLINE</li>
                        </ul>
                    </div>
                </div>
            </article>
        </div>
    </div>
    <!-- //banner -->

    <!-- FERIA ACTIVA -->
    <div class="timer ">
        <div class="container" id="feria_activa">

        </div>
        <!--  <div id="counter" class="d-none" style="margin-top: -150px; float: left; margin-left: 100px;"> </div>-->
    </div>

    <div class="timer d-none">
        <div class="container">
            <div class="timer-grids ">
                <div class="col-md-6 timer-grid-left animated wow slideInLeft" data-wow-delay=".5s">
                    <h3><a href="products.html">Expo Emprendimiento</a></h3>

                    <div class="new-collections-grid1-left simpleCart_shelfItem timer-grid-left-price">

                        <h4>Descripcion de expo emprendimiento.</h4>
                        <p><a class="item_add timer_add" href="#">Visitar feria </a></p>
                    </div>
                    <div id="counter"> </div>
                    <script src="js/jquery.countdown.js"></script>
                    <script src="js/script.js"></script>
                </div>
                <div class="col-md-4 timer-grid-right animated wow slideInRight" data-wow-delay=".5s">
                    <div class="timer-grid-right1">
                        <img style="height: 350px; width: 350px; " src="images/linea_blanca.png" alt=" " class="img-responsive" />
                        <div class="timer-grid-right-pos">
                            <h4>Feria Activa</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
    </div>


    <div style="margin-top: 0px;">
        <div class="d-flex flex-row justify-content-center animated wow zoomIn mb-2" style="text-align: center;">
            <h3 class="" style="font-family: Glyphicons Halflings; color: #4C4C4C; font-size: 55px;"> Bene</h3>
            <h3 class="text-white" style=" font-family: Glyphicons Halflings; background-color: #4F77FA; font-size: 55px; text-align:center;"> ficios</h3>

        </div>
        <div class="p-5" style="background-color: #4F77FA;">

            <div class="animated wow slideInLeft" data-wow-delay=".5s">
                <div class="mx-auto mt-4 row justify-content-center" style="width: 85%;">
                    <div class="col-sm-4 mb-2">
                        <div class="card border-0 shadow" style="width: 18rem; ">
                            <img class="card-img-top mx-auto mt-4" style="width: 50%; height:50%;;" src="images/benef-Org.png" alt="Card image cap">
                            <div class="card-body">
                                <h4 class="card-title mb-2">Beneficios organizadores eventos</h4>
                                <p class="card-text">
                                    <strong> *</strong> Bajo costo de implementación comparado con una feria física <br>
                                    <strong> *</strong> Alto alcance a nivel nacional e Internacional<br>
                                    <strong> *</strong> Ser un referente en el uso de nuevas herramientas tecnológicas<br>
                                    <strong> *</strong> Apoyo a empresas para que puedan vender sus productos dentro y fuera del país.<br>
                                    <strong> *</strong> Brindar un medio virtual integral para la experiencia del cliente final.<br>
                                    <strong> *</strong> Los disertantes pueden realizar sus presentaciones desde cualquier lugar del mundo.<br>
                                    <strong> *</strong> Data y métricas en tiempo real<br>

                                </p>

                            </div>
                        </div>

                    </div>

                    <div class="col-sm-4 mb-2">
                        <div class="card border-0 shadow" style="width: 18rem;">
                            <img class="card-img-top mx-auto mt-4" style="width: 50%; height:50;;" src="images/benef-expo.png" alt="Card image cap">

                            <div class="card-body">
                                <h4 class="card-title mb-2">Beneficios expositor</h4>
                                <p class="card-text">
                                    <strong> *</strong> Exhibición de productos y/o servicios al mundo online. <br>
                                    <strong> *</strong> Apertura de nuevos mercados.<br>
                                    <strong> *</strong> Métricas en tiempo real.<br>
                                    <strong> *</strong> Su marca es asociada con nuevas tecnologías.<br>
                                    <strong> *</strong> Rueda de Negocios <br>
                                    <strong> *</strong> Contacto directo con los clientes <br>
                                    <strong> *</strong> Fácil Acceso a la plataforma y a carga de achivos, videos y/o fotos.<br>
                                    <strong> *</strong> Promoción de ofertas especiales para atraer más clientes.<br>
                                </p>

                            </div>
                        </div>

                    </div>
                    <div class="col-sm-4 mb-2">
                        <div class="card border-0 shadow" style="width: 18rem; ">
                            <img class="card-img-top mx-auto mt-4" style="width: 50%; height:50%;;" src="images/benef-visitante.png" alt="Card image cap">

                            <div class="card-body">
                                <h4 class="card-title mb-2">Beneficios visitante</h4>
                                <p class="card-text">
                                    <strong> *</strong> Ingreso Gratuito <br>
                                    <strong> *</strong> Posibilidad de ingresar y realizar negocios desde cualquier parte del mundo.<br>
                                    <strong> *</strong> Conectar con nuevos clientes o proveedores.<br>
                                    <strong> *</strong> Herramienta fácil de utilizar que guía al participante de inicio a Fin. <br>
                                    <strong> *</strong> No se requiere ningún requisito para ingresar.<br>
                                    <strong> *</strong> Información de ofertas y descuentos en tiempo real.<br>
                                    <strong> *</strong> Participación en la Feria, Eventos o Conferencias.<br>
                                </p>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>


    <div class="modal" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog modal-dialog-centered " role="document">
            <div class="modal-content" style="background-image: linear-gradient( #EAE6E6, white);">
                <div class="modal-header">
                    <h5 class="modal-title text-primary" id="offcanvasRightLabel">Solicitar Demo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nombre_solcitud">Nombre Completo(*)</label>
                        <input type="text" class="form-control" id="nombre_solicitud" placeholder="Nombre">
                    </div>
                    <div class="form-group">
                        <label for="nombre_solcitud">Nombre Empresa(*)</label>
                        <input type="text" class="form-control" id="nombre_empresa_solicitud" placeholder="Nombre empresa">
                    </div>
                    <div class="form-group">
                        <label for="nombre_solcitud">Cargo(*)</label>
                        <input type="text" class="form-control" id="cargo_solicitud" placeholder="Cargo">
                    </div>
                    <div class="form-group">
                        <label for="nombre_solcitud">Pagina web</label>
                        <input type="text" class="form-control" id="web_solicitud" placeholder="https://..">
                    </div>
                    <div class="form-group">
                        <label for="correo_solcitud">Correo (*)</label>
                        <input type="email" class="form-control" id="correo_solicitud" placeholder="Correo">
                    </div>

                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="pais_solcitud">Pais (*)</label>
                            <input type="text" class="form-control" id="pais_solicitud" placeholder="Pais">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ciudad_solcitud">Ciudad (*)</label>
                            <input type="text" class="form-control" id="ciudad_solicitud" placeholder="Ciudad">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="telefono_solcitud">Celular (*)</label>
                        <input type="number" class="form-control" id="telefono_solicitud" placeholder="Telefono">
                    </div>

                    <div class="row" id="div_datetime">
                        <div class="form-group col-md-6">
                            <label for="fecha_solicitud">Fecha (*) </label>
                            <input type="date" class="form-control" id="fecha_solicitud" placeholder="fecha">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="hora_solicitud">Hora (*)</label>
                            <input type="time" class="form-control" id="hora_solicitud" placeholder="hora">
                        </div>
                    </div>


                    <div class="form-group ">
                        <label for="mensaje_solicitud">Mensaje</label>
                        <textarea id="mensaje_solicitud" class="form-control" rows="4" cols="50" placeholder="Mensaje">

                        </textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn_solicitd">Enviar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="animated p-5 wow slideInLeft" data-wow-delay=".5s" style="margin-top: -0px;">
        <div class="container mx-auto">
            <div class="row">

                <div class="col-md-5 mx-auto" style="width: 45%;">

                    <div class=" animated wow slideInUp shadow" data-wow-delay=".5s">
                        <img src="images/demo.1.jpg" alt=" " class="img-responsive" />
                        <div class="men-position-pos mx-auto" style="width: 80%;">
                            <p class="text-white" style="font-size: 20px; visibility: hidden;"><strong> ¿Quieres solicitar un demo?</strong></p>
                            <p class="text-white" style="visibility: hidden;">Descubre en menos de 30 min como funciona la plataforma.</p>
                            <i class="bi bi-align-bottom"></i>

                            <div class="col-md-10 text-center">
                                <button type="button mx-auto" style="font-family: Glyphicons Halflings;" class="btn btn-primary" id="id_demo" data-toggle="modal" data-target="#exampleModal">
                                    Solicitar Demo
                                </button>
                            </div>

                        </div>
                    </div>

                </div>

                <div class="col-md-5 mx-auto" id="id_partner" style="margin-left: 15px; width: 45%;">
                    <div class="animated wow slideInUp shadow" data-wow-delay=".5s">
                        <img src="images/SocialPartners.jpg" alt=" " class="img-responsive" />
                        <div class="men-position-pos">
                            <p class="text-white" style="font-size: 20px;visibility: hidden; "><strong> ¿Quieres convertirte en socio partner?</strong></p>
                            <p class="text-white" style="visibility: hidden;">Dejanos tus datos y nosotros te contactaremos.</p>
                            <br>

                            <div class="col-md-12 text-center">
                                <button type="button" style="font-family: Glyphicons Halflings;" class="btn btn-primary" id="id_partner" data-toggle="modal" data-target="#exampleModal">
                                    Ser Socio Partner
                                </button>
                            </div>

                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>


    <div class="container">

        <h3 class="animated wow zoomIn text-center mt-5" style="font-family: Glyphicons Halflings; color: #4C4C4C; font-size: 55px;" data-wow-delay=".5s">Funcionalidad de la </h3>
        <h3 class="mb-5 text-white" style="text-align:center;">
            <span class="p-2" style="font-family: Glyphicons Halflings; background-color: #4F77FA; font-size: 55px;">Plataforma</span>
        </h3>

        <div class="row justify-content-center mb-5 animated wow zoomIn">
            <div class="col-sm-6">
                <div class="card h-100  animated wow slideInUp">
                    <div class=" text-white " style="text-align: center;  background-color: #4F77FA;">
                        <img class="d-block w-100" src="images/f1.png" alt="First slide">
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 animated wow slideInUp">
                    <div class="text-white " style="text-align: center;  background-color: #4F77FA;">
                        <img class="d-block w-100" src="images/f2.png" alt="Second slide">
                    </div>

                </div>
            </div>

        </div>

        <div class="row justify-content-center mb-5 animated wow zoomIn">
            <div class="col-sm-6">
                <div class="card h-100  animated wow slideInUp">
                    <div class=" text-white " style="text-align: center;  background-color: #4F77FA;">
                        <img class="d-block w-100" src="images/f3.png" alt="Third slide">
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 animated wow slideInUp">
                    <div class=" text-white " style="text-align: center;  background-color: #4F77FA;">
                        <img class="d-block w-100" src="images/f4.png" alt="Third slide">
                    </div>

                </div>
            </div>

        </div>


        <div class="row justify-content-center mb-5 animated wow zoomIn">
            <div class="col-sm-6">
                <div class="card h-100  animated wow slideInUp">
                    <div class=" text-white " style="text-align: center;  background-color: #4F77FA;">
                        <img class="d-block w-100" src="images/f5.png" alt="Third slide">
                    </div>

                </div>
            </div>

            <div class="col-sm-6">
                <div class="card h-100 animated wow slideInUp">
                    <div class=" text-white " style="text-align: center;  background-color: #4F77FA;">
                        <img class="d-block w-100" src="images/f6.png" alt="Third slide">
                    </div>

                </div>
            </div>

        </div>

    </div>



    <p class="est animated wow zoomIn d-none" data-wow-delay=".5s">Te damos estas y muchas otras mas funcionalidades que ayudarán a que tu feria sea exitosa!</p>

    <!-- ULTIMAS FERIAS -->
    <div>
        <div class="d-flex flex-row justify-content-center animated wow zoomIn mb-2" style="text-align: center;">
            <h3 class="p-2 text-white" style=" font-family: Glyphicons Halflings; background-color: #4F77FA; font-size: 55px; text-align:center;"> Eventos</h3>
            <h3 class="p-2" style="font-family: Glyphicons Halflings; color: #4C4C4C; font-size: 55px;"> Realizados</h3>

        </div>
        <div class="p-5" style="background-color: #4F77FA;">

            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">

                    <?php
                    include 'db/conexion.php';
                    $query2 = "SELECT * from fair_titles";
                    //echo $query2;

                    $conexion = Database::connect();
                    $conectar = $conexion->prepare($query2);
                    $conectar->execute();
                    // $respuesta= mysqli_result($conectar);
                    // $respuesta = json_encode($conectar->fetchAll(PDO::FETCH_ASSOC));
                    //$fila = mysqli_fetch_array($respuesta);
                    $results = $conectar->fetchAll(PDO::FETCH_ASSOC);
                    $response = json_encode($results);
                    $json = json_decode($response, true);
                    /*echo $response;
                        echo $json;
                    foreach($json as $data){
                        echo $data['url_fail']."/storage/fair-title-image/normal/".$data["image"];
                    }*/

                    //var_dump($fila);

                    for ($i = 0; $i < count($json); $i++) {
                        if ($i == 0) {
                    ?>
                            <div class="carousel-item item active">

                                <img class="d-block mx-auto img-fluid" style="max-height: 150px;" src="  <?php  //IMAGEN PRINCIPAL

                                                                                if ($json[$i]['image'] != null && $json[$i]['image'] != "")
                                                                                    $urlImage = $json[$i]['url_fair'] . "/storage/fair-title-image/normal/" . $json[$i]['image'];
                                                                                else
                                                                                    $urlImage = "images/expolatam.png";
                                                                                echo $urlImage ?>" alt="Principal">
                            </div>

                        <?php
                        } else {
                        ?>
                            <div class="carousel-item item ">
                                <img class="d-block mx-auto  img-fluid" src=" <?php
                                                                                if ($json[$i]['image'] != null && $json[$i]['image'] != "")
                                                                                    $urlImage = $json[$i]['url_fair'] . "/storage/fair-title-image/normal/" . $json[$i]['image'];
                                                                                else
                                                                                    $urlImage = "images/expolatam.png";
                                                                                echo $urlImage ?>" alt="second">
                            </div>

                    <?php
                        }
                    }

                    ?>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>

        </div>
    </div>


    <div class="container mx-auto animated wow zoomLeft mt-3 mb-3" style="width: 80%;">
        <div class="d-flex flex-row justify-content-center animated wow zoomIn mt-2 mb-2" style="text-align: center;">
            <h3 class="p-2" style="font-family: Glyphicons Halflings; color: #4C4C4C; font-size: 55px;"> Nuestros</h3>
            <h3 class="p-2 text-white" style=" font-family: Glyphicons Halflings; background-color: #4F77FA; font-size: 55px; text-align:center;"> Aliados</h3>

        </div>
        <img class="w-100 h-80 mt-2" src="images/sponsors.png">

    </div>


    <!-- footer -->
    <div class="footer text-white" style="background-color: #4F77FA;">
        <div class="container">
            <div class="footer-grids">
                <div class="col-md-3 footer-grid animated wow slideInLeft " data-wow-delay=".5s">
                    <h3>Nosotros</h3>
                    <p class="text-white text-justify">EXPOLATAM busca generar nuevos espacios virtuales para concretar negocios y
                        alianzas que permitan incrementar las ventas, contactar a nuevos clientes y proveedores,
                        ampliar los objetivos y las fronteras comerciales. A través de la creación de eventos virtuales a medida,
                        ferias y ruedas de negocios virtuales, tiendas virtuales, conferencias, cursos, festivales y conciertos online.</span></p>
                </div>
                <div class="col-md-3 footer-grid animated wow slideInLeft" data-wow-delay=".6s">
                    <h3>Contacto</h3>
                    <ul class="">
                       <!-- <li><i class="text-white glyphicon glyphicon-map-marker" aria-hidden="true"></i><a class="text-white" href="#">La paz-Bolivia</a> </li>-->
                        <li><i class="text-white glyphicon glyphicon-envelope" aria-hidden="true"></i><a class="text-white" href="mailto:info@pixbolivia.com">info@pixbolivia.com</a></li>
                        <li><i class="text-white glyphicon glyphicon-new-window" aria-hidden="true"></i><a class="text-white" href="https://pixbolivia.com/"> by PIX s.r.l</a></li>
                        <li><i class="text-white glyphicon glyphicon-phone" aria-hidden="true"></i><a class="text-white" href="https://api.whatsapp.com/send?phone=+59177777777">+591 76715252</a></li>
                    </ul>
                </div>

                <div class="col-md-6 mail-grid-left animated wow slideInLeft" data-wow-delay=".5s">

                    <input type="text" id="nombre" placeholder="Nombre" onfocus="this.value = '';" onblur="if (this.value == '') {this.placeholder = 'Nombre';}" required="">
                    <input type="email" id="email" placeholder="Email" onfocus="this.value = '';" onblur="if (this.value == '') {this.placeholder = 'Email';}" required="">
                    <textarea type="text" id="message" onfocus="this.value = '';" onblur="if (this.value == '') {this.placeholder = 'Mensaje...';}" required="">Mensaje...</textarea>
                    <input type="submit" i id="id_btn_send_message" value="Enviar mensaje">

                </div>


                <div class="clearfix"> </div>
            </div>
            <div class="footer-logo animated wow slideInUp" data-wow-delay=".5s">
                <h2><a class="text-white" href="#">Expolatam <span class="text-white">Ferias online</span></a></h2>
            </div>
            <div class="copy-right animated wow slideInUp" data-wow-delay=".5s">
                <p class="text-white">&copy 2021 Expolatam. All rights reserved </p>
            </div>
        </div>
    </div>
    <input type="hidden" value="" id="url_feria_active">
    <!-- //footer -->


</body>

</html>