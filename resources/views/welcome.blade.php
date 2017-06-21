
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>RetroChic</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
</head>
<body>
@include('layouts.nav')

<div id="myCarousel" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
            <img class="first-slide" src="{{asset('/images/front1.jpg')}}" alt="First slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block text-left">
                    <h1>Nu er is een winkel geopend in Den Haag</h1>
                    <p>Deze is winkel is vanaf 13 maart 2018 geopend en zal meerdere soorten merken kleding verkopen</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="second-slide" src="{{asset('/images/front2.jpg')}}" alt="Second slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block">
                    <h1>Nu ook Armani te koop bij RetroChic</h1>
                    <p>Vandaag is de nieuwe lading van Armani binnen gekomen dus ze liggen nu al in de schappen kom eens een kijkje nemen</p>

                </div>
            </div>
        </div>
        <div class="carousel-item">
            <img class="third-slide" src="{{asset('/images/front3.jpg')}}" alt="Third slide">
            <div class="container">
                <div class="carousel-caption d-none d-md-block text-right">
                    <h1>We verkopen nu ook Schoenen</h1>
                    <p>Schoenen zijn de eerste 2 weken maar voor de helft van de prijs</p>

                </div>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


<div class="container marketing">
    <div class="row">

        <div class="col-lg-1 ">
        </div>
        <div class="col-lg-4 ">
            <img class="rounded-circle" src="{{asset('/images/Stefan.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>Stefan Willems</h2>
            <p>Ik ben Stefan Willems en ik ben een informatica student aan de Avans Den Bosch</p>
        </div><!-- /.col-lg-4 -->
        <div class="col-lg-2 ">
        </div>
        <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('/images/Jonathan.jpg')}}" alt="Generic placeholder image" width="140" height="140">
            <h2>Jonathan Hollander</h2>
            <p>Ik ben Jonathan Hollander en ik ben een informatica student aan de Avans Den Bosch</p>
        </div><!-- /.col-lg-4 -->
    </div><!-- /.row -->

    @include('layouts.footer')

</div>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
