<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Meta Data -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <!-- Title -->
        <title>Tour | Ireland.ie</title>

        <!-- Style & Script Code -->
        <?php
        require 'styles.php';
        require 'scripts.php';

        // Start The Session:
        $id = session_id();
        if ($id == "") {
            session_start();
        }
        ?>
    </head>

    <!-- Body -->
    <body>
        <?php require 'navBar.php' ?>
        <!-- Half Page Image Background Carousel Header -->
        <header id="myCarousel" class="carousel slide">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for Slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="carouselimg fill"><img  class="img-responsive" src="img/img5.jpg" alt="Mountain View"></div>
                    <div class="carousel-caption">
                        <h2 class="col-lg-4 col-lg-push-4 col-sm-7 col-sm-push-3 col-xs-7 col-xs-push-3"><strong>Tour |</strong> Ireland</h2><br><br><br>
                        <h3 class="col-lg-6  col-sm-7 col-sm-push-3 col-xs-7 col-xs-push-3">FAMOUS TOURS OF IRELAND<br> AWARD WINNING DAY TOURS FROM DUBLIN, CORK & BELFAST</h3>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="carouselimg fill"><img  class="img-responsive" src="img/img4.jpg" alt="Mountain View"></div>
                    <div class="carousel-caption">
                        <h2 class="col-lg-4 col-lg-push-4 col-sm-7 col-sm-push-3 col-xs-7 col-xs-push-3"><strong>Tour |</strong> Ireland</h2><br><br><br>
                        <h3 class="col-lg-6  col-sm-7 col-sm-push-3 col-xs-7 col-xs-push-3">FAMOUS TOURS OF IRELAND<br> AWARD WINNING DAY TOURS FROM DUBLIN, CORK & BELFAST</h3>
                    </div>
                </div>
                <div class="item">
                    <!-- Set the first background image using inline CSS below. -->
                    <div class="carouselimg fill"><img  class="img-responsive" src="img/img6.jpg" alt="Mountain View"></div>
                    <div class="carousel-caption">
                        <h2 class="col-lg-4 col-lg-push-4 col-sm-7 col-sm-push-3 col-xs-7 col-xs-push-3"><strong>Tour |</strong> Ireland</h2><br><br><br>
                        <h3 class="col-lg-6  col-sm-7 col-sm-push-3 col-xs-7 col-xs-push-3">FAMOUS TOURS OF IRELAND<br> AWARD WINNING DAY TOURS FROM DUBLIN, CORK & BELFAST</h3>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control hidden-xs" href="#myCarousel" data-slide="prev">
                <div class="hidden-xs arrowBox1">
                    <span class="hidden-xs icon-prev"></span>
                </div>
            </a>
            <a class="right carousel-control hidden-xs" href="#myCarousel" data-slide="next">
                <div class="hidden-xs arrowBox2">
                    <span class="hidden-xs icon-next"></span>
                </div>
            </a>

        </header>

        <!-- Page Content -->
        <div class="container">
            <br>
            <p class="tourtxt">Latest tours</p>
            <hr>

            <!-- Tours Boxs Start -->
            <div class="row text-center">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/dublin.jpg" alt="Dublin City">
                        <div class="caption">
                            <h3>DAY TOURS FROM DUBLIN</h3>
                            <p>Connemara is truly the wilderness of Ireland, ravaged during the great potato famine of 1847-1851. this landscape was left barren however its true beauty intact. With fabulous lakes, romantic castles...</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop1"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop1"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">15 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/BlarneyCastle.jpg" alt="Blarney Castle">
                        <div class="caption">
                            <h3>BLARNEY DAY TOURS</h3>
                            <p>Visit the most famous castle in all of Ireland - Blarney Castle. Lay back and kiss the magical Blarney Stone and receive the gift of eloquent speech for 7 years. Also visit Cobh, the last departure port for...</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop2"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop2"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">34 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/cork.jpg" alt="Cork City">
                        <div class="caption">
                            <h3>DAY TOURS FROM CORK</h3>
                            <p>The Rock of Cashel is situated in county Tipperary. On top of the rock you can enjoy fine views of the Tipperary countryside. You will explore one of the finest religious sites in Ireland...</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop3"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop3"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">7 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/giantsCausway.jpg" alt="Giants Causway">
                        <div class="caption">
                            <h3>GIANT'S CAUSEWAY TOUR FROM DUBLIN</h3>
                            <p>You cannot truly visit Ireland without a visit to the legendary Giant's Causeway! Volcanic activity helped Finn McCool forge this wonder of the world...</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop4"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop4"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">56 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="Tour_Ireland.php" class="btn5 pull-right">View More</a>

            <!-- Tours Boxs2 Start -->
            <p class="tourtxt tourtxt2">Most Popular</p>
            <hr>
            <div class="row text-center">
                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/Dingle.jpg" alt="Dublin City">
                        <div class="caption">
                            <h3>DINGLE DAY TOUR FROM KILLARNEY</h3>
                            <p>The Dingle Peninsula has amazing mountain scenery and unusual antiquities to see as you travel around this spectacular peninsula. You will stop at the famed...</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop5"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop5"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">115 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/CliffOfMohar.jpg" alt="Blarney Castle">
                        <div class="caption">
                            <h3>2 DAY SOUTH TOUR - CLIFFS OF MOHER</h3>
                            <p>See the world famous Cliffs of Moher,wonder in the barren beauty of the Burren, and stroll through the grounds of Blarney Castle and stay overnight in Cork...</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop6"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop6"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">413 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/RingOfKerry.jpg" alt="Cork City">
                        <div class="caption">
                            <h3>RING OF KERRY DAY TOUR FROM GALWAY</h3>
                            <p>The Ring of Kerry is considered one of the finest drives in the world. From rugged cliffs to golden beaches, small villages and pastures green to peat bogs and...</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop7"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop7"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">41 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star-empty"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-6">
                    <div class="thumbnail tourB boxt">
                        <img  class="img-responsive" src="img/Tours/CorkNight.jpg" alt="Giants Causway">
                        <div class="caption">
                            <h3>CORK CITY SIGHTSEEING (CORK HOPPER)</h3>
                            <p>Experience Cork’s main attractions in one day with Paddywagon’s Hopper Tour! With the Cork Hopper passengers can hop-on board any time of day and use..</p>
                            <br>
                            <p>
                                <a href="Tour_Ireland.php" class="visible-md col_md-12 btn2 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now<br></a> <a href="#pop8"  data-toggle="modal" class="visible-md col_md-12 btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                                <a href="Tour_Ireland.php" class="hidden-md btn1 btn-primary"><span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span> Book Now</a> <a href="#pop8"  data-toggle="modal" class="hidden-md btn1 btn-default"><span class="glyphicon glyphicon-question-sign" aria-hidden="true"></span> More Info</a>
                            </p>
                            <br>
                            <div class="ratings">
                                <p class="pull-right">301 reviews</p>
                                <p>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                    <span class="glyphicon glyphicon-star"></span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a href="Tour_Ireland.php" class="btn5 pull-right">View More</a>
            <!-- Tours Boxs End -->
        </div>
        
        <!-- SECTION DIVIDER1 -->
        <section class="section-divider textdivider divider1">
            <div class="container tourB1">
                <h1>PLAN YOUR JOURNEY WITH TOUR | IRELAND.IE</h1>
                <hr>
                <p>To achieve real change, we have to expand boundaries. Because the Wild West of what-could-be is unexplored but rife with opportunity.</p>
            </div>
        </section>
        
        <!-- Journey Planner -->
        <div class="container">
            <p class="tourtxt">Journey Planer</p>
            <hr>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6 tourtxt">
                <form role="form">
                    <h2>Plan your journey <small>Buy online and save</small></h2>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <select type="text" name="from" id="from" class="selectpicker form-control input-lg" tabindex="1">
                                    <option value="none">Travelling from</option>
                                    <option value="volvo">Antrim</option>
                                    <option value="saab">Armagh</option>
                                    <option value="opel">Carlow</option>
                                    <option value="audi">Cavan</option>
                                    <option value="volvo">Clare</option>
                                    <option value="saab">Cork</option>
                                    <option value="opel">Donegal</option>
                                    <option value="audi">Down</option>
                                    <option value="volvo">Dublin</option>
                                    <option value="saab">Fermanagh</option>
                                    <option value="opel">Galway</option>
                                    <option value="audi">Kerry</option>
                                    <option value="volvo">Kildare</option>
                                    <option value="saab">Kilkenny</option>
                                    <option value="opel">Laois</option>
                                    <option value="audi">Leitrim</option>
                                    <option value="none">Limerick</option>
                                    <option value="volvo">Londonderry</option>
                                    <option value="saab">Longford</option>
                                    <option value="opel">Louth</option>
                                    <option value="audi">Mayo</option>
                                    <option value="volvo">Meath</option>
                                    <option value="saab">Monaghan</option>
                                    <option value="opel">Offaly</option>
                                    <option value="audi">Roscommon</option>
                                    <option value="volvo">Sligo</option>
                                    <option value="saab">Tipperary</option>
                                    <option value="opel">Tyrone</option>
                                    <option value="audi">Waterford</option>
                                    <option value="volvo">Westmeath</option>
                                    <option value="saab">Wexford</option>
                                    <option value="opel">Wicklow</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <select type="text" name="to" id="to" class="selectpicker form-control input-lg" tabindex="2">
                                    <option value="none">Travelling to</option>
                                    <option value="volvo">Antrim</option>
                                    <option value="saab">Armagh</option>
                                    <option value="opel">Carlow</option>
                                    <option value="audi">Cavan</option>
                                    <option value="volvo">Clare</option>
                                    <option value="saab">Cork</option>
                                    <option value="opel">Donegal</option>
                                    <option value="audi">Down</option>
                                    <option value="volvo">Dublin</option>
                                    <option value="saab">Fermanagh</option>
                                    <option value="opel">Galway</option>
                                    <option value="audi">Kerry</option>
                                    <option value="volvo">Kildare</option>
                                    <option value="saab">Kilkenny</option>
                                    <option value="opel">Laois</option>
                                    <option value="audi">Leitrim</option>
                                    <option value="none">Limerick</option>
                                    <option value="volvo">Londonderry</option>
                                    <option value="saab">Longford</option>
                                    <option value="opel">Louth</option>
                                    <option value="audi">Mayo</option>
                                    <option value="volvo">Meath</option>
                                    <option value="saab">Monaghan</option>
                                    <option value="opel">Offaly</option>
                                    <option value="audi">Roscommon</option>
                                    <option value="volvo">Sligo</option>
                                    <option value="saab">Tipperary</option>
                                    <option value="opel">Tyrone</option>
                                    <option value="audi">Waterford</option>
                                    <option value="volvo">Westmeath</option>
                                    <option value="saab">Wexford</option>
                                    <option value="opel">Wicklow</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class='input-group date' id='datetimepicker1'>
                            <input type="email" name="email" id="email" class="form-control input-lg" placeholder="Date" tabindex="3">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <select type="text" name="adult" id="adult" class="selectpicker form-control input-lg" tabindex="4">
                                    <option value="none">Adult</option> 
                                    <option value="1">1 Adult</option>
                                    <option value="2">2 Adults</option>
                                    <option value="3">3 Adults</option>
                                    <option value="4">4 Adults</option>
                                    <option value="5">5 Adults</option>
                                    <option value="6-10">6-10 Adults</option>
                                    <option value="10+">10+ Adults</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <select type="text" name="children" id="children" class="selectpicker form-control input-lg" tabindex="5">
                                    <option value="none">Child</option>
                                    <option value="1">1 Child</option>
                                    <option value="2">2 Children</option>
                                    <option value="3">3 Children</option>
                                    <option value="4">4 Children</option>
                                    <option value="5">5 Children</option>
                                    <option value="6-10">6-10 Children</option>
                                    <option value="10+">10+ Children</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <select type="text" name="student" id="student" class="selectpicker form-control input-lg" tabindex="6">
                                    <option value="none">Student</option>
                                    <option value="1">1 Student</option>
                                    <option value="2">2 Students</option>
                                    <option value="3">3 Students</option>
                                    <option value="4">4 Students</option>
                                    <option value="5">5 Students</option>
                                    <option value="6-10">6-10 Students</option>
                                    <option value="10+">10+ Students</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-6">
                            <div class="form-group">
                                <select type="text" name="Ooptions" id="options" class="selectpicker form-control input-lg" tabindex="7">
                                    <option value="none">Options</option>
                                    <option value="0">Family Tours</option>
                                    <option value="1">School Tours</option>
                                    <option value="2">Historic Tours</option>
                                    <option value="3">Walking Tours</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <hr class="colorgraph">
                    <div class="row">
                        <div class="col-xs-12 col-md-6"><a href="#" class="btn5 btn-success btn-block btn-lg">Book now</a></div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6">  
                
                <!-- Map -->
                <!-- visible-xs -->
                <div class="visible-xl hidden-xs hidden-md hidden-sm">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152515.69312067638!2d-6.2516950000000024!3d53.324320099999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e80ea27ac2f%3A0xa00c7a9973171a0!2sDublin!5e0!3m2!1sen!2sie!4v1424644044232" width="550" height="430" frameborder="0" style="border:0"></iframe>
                </div>
                <div class="visible-md hidden-xs hidden-xl hidden-sm">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152515.69312067638!2d-6.2516950000000024!3d53.324320099999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e80ea27ac2f%3A0xa00c7a9973171a0!2sDublin!5e0!3m2!1sen!2sie!4v1424644044232" width="500" height="430" frameborder="0" style="border:0"></iframe>
                </div>
                <div class="visible-sm hidden-xs hidden-xl hidden-md">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152515.69312067638!2d-6.2516950000000024!3d53.324320099999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e80ea27ac2f%3A0xa00c7a9973171a0!2sDublin!5e0!3m2!1sen!2sie!4v1424644044232" width="350" height="430" frameborder="0" style="border:0"></iframe>
                </div>
                <div class="visible-xs hidden-sm hidden-xl hidden-md">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d152515.69312067638!2d-6.2516950000000024!3d53.324320099999994!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48670e80ea27ac2f%3A0xa00c7a9973171a0!2sDublin!5e0!3m2!1sen!2sie!4v1424644044232" width="690" height="430" frameborder="0" style="border:0"></iframe>
                </div>
            </div>
        </div>  
        
        <!-- Services Section1 -->
        <section id="services">
            <div class="container">
                <p class="tourtxt3">Our Services</p>
                <hr>
                <div class="row text-center">
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-shopping-cart fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading"><b>Online Booking</b></h4> 
                        <p2><b>Tour|Ireland.ie</b> has design a simply way for you and your friends/ family to book the perfect getaway tour bus trip across Ireland throughout the year.</p2>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-laptop fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading"><b>Help Support</b></h4>
                        <p2>Ever need help? If so <b>Tour|Ireland.ie</b> has you covered in helping you all the way through your bookings Experience.</p2>
                    </div>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                            <i class="fa fa-lock fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="service-heading"><b>Online Security</b></h4>
                        <p2>Internet security is a taken seriously at <b>Tour|Ireland.ie</b>, thats why we have key measures to ensure your online bookings are secure.</p2>
                        <br><br><br>
                        <a href="Tour_Ireland.php" class="btn5 pull-right">Read More</a>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- SECTION DIVIDER2 -->
        <section class="section-divider textdivider divider2">
            <div class="container tourB1">
                <h1>THE TEAM OF TOUR | IRELAND.IE</h1>
                <hr>
                <p>To develop a deeper and more meaningful connection with consumers, we believe that is a must to invite them to take part in the conversation.</p>
            </div>
        </section>

        <!-- TEAM MEMBERS -->
        <br>
        <br>
        <br>
        <div class="container">
            <h4 class="cheddar">Our Team</h4>
            <hr>
        </div>
        <div class="container teamtxt" id="team" name="team">
            <br>
            <div class="row white centered">
                <center>
                    <div class="col-lg-3 col-md-6 col-sm-6 centered">
                        <img class="img img-circle" src="img/Team/team4.jpg" height="120px" width="120px" alt="">
                        <br>
                        <h4><b>Jeremiah Fraites</b></h4>
                        <a href="#"><i class="fa fa-twitter social-tw2"></i></a>
                        <a href="#""><i class="fa fa-facebook social-fb2"></i></a>
                        <a href="#"><i class="fa fa-google-plus social-gp2"></i></a>
                        <a href="#"><i class="fa fa-envelope social-em2"></i></a>
                        <p>Jeremiah combines an expert technical knowledge with a real eye for design. Working with clients from a wide range of industries, he fully understands client objectives when working on a project, large or small.</p>
                    </div><!-- col-lg-3 -->
                </center>
                <center>
                    <div class="col-lg-3 col-md-6 col-sm-6 centered">
                        <img class="img img-circle" src="img/Team/team3.jpg" height="120px" width="120px" alt="">
                        <br>
                        <h4><b>Carissa rae</b></h4>
                        <a href="#"><i class="fa fa-twitter social-tw2"></i></a>
                        <a href="#""><i class="fa fa-facebook social-fb2"></i></a>
                        <a href="#"><i class="fa fa-google-plus social-gp2"></i></a>
                        <a href="#"><i class="fa fa-envelope social-em2"></i></a>
                        <p>Carissa is an experienced practitioner and manages projects from inception to delivery. She understands the synergy between great design and commercial effectiveness which shines through on every project.</p>
                    </div><!-- col-lg-3 -->
                </center>
                <center>
                    <div class="col-lg-3 col-md-6 col-sm-6 centered">
                        <img class="img img-circle" src="img/cheddar.jpg" height="120px" width="120px" alt="">
                        <br>
                        <h4><b>Cheddar Forwin</b></h4>
                        <a href="#"><i class="fa fa-twitter social-tw2"></i></a>
                        <a href="#""><i class="fa fa-facebook social-fb2"></i></a>
                        <a href="#"><i class="fa fa-google-plus social-gp2"></i></a>
                        <a href="#"><i class="fa fa-envelope social-em2"></i></a>
                        <p>Be a creative director is a hard task, but Cheddar loves what she does. He combination of knowledge and expertise is an important pillar in our agency. Firefly Fan and Doctor Who Fan ect.</p>
                    </div><!-- col-lg-3 -->
                </center>
                <center>
                    <div class="col-lg-3 col-md-6 col-sm-6 centered">
                        <img class="img img-circle" src="img/Team/team2.jpg" height="120px" width="120px" alt="">
                        <br>
                        <h4><b>juliana daily</b></h4>
                        <a href="#"><i class="fa fa-twitter social-tw2"></i></a>
                        <a href="#""><i class="fa fa-facebook social-fb2"></i></a>
                        <a href="#"><i class="fa fa-google-plus social-gp2"></i></a>
                        <a href="#"><i class="fa fa-envelope social-em2"></i></a>
                        <p>juliana began making tour trips around 10 years ago, but has since found a love for simplicity, creating tours that are a pleasure to browse. Monkey Island Fan and Doctor Who Fan ect.</p>
                        <br><br><br>
                        <a href="Tour_Ireland.php" class="btn5 pull-right">Read More</a>
                    </div><!-- col-lg-3 -->
                </center>
            </div>
        </div>
        <br><br>
        
        <!-- About Section -->
        <section id="about">
            <div class="container">  
                <h4 class="cheddar1">About Us</h4>
                <hr>
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/irishMountain.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>2009-2011</h4>
                                        <h4 class="subheading"><b>How We Started</b></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/tourBus.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>March 2011</h4>
                                        <h4 class="subheading"><b>Beginning Of Tour | Ireland.ie</b></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/team.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>December 2012</h4>
                                        <h4 class="subheading"><b>Transition to Full Service</b></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <img class="img-circle img-responsive" src="img/about/busDriver.jpg" alt="">
                                </div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>July 2014</h4>
                                        <h4 class="subheading"><b>Phase Two Expansion</b></h4>
                                    </div>
                                    <div class="timeline-body">
                                        <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p>
                                    </div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>Be Part
                                        <br>Of Our
                                        <br>Story!</h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <?php require 'footer.php' ?>
        
        <!-- Model Box One -->
        <div id="pop1" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>DAY TRIP FROM DUBLIN</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/dublin.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>Connemara is truly the wilderness of Ireland, ravaged during the great potato famine of 1847-1851. this landscape was left barren however its true beauty intact. 
                        With fabulous lakes, romantic castles, stone walls, and deserted valleys Connemara features in many blockbuster movies ie The Quiet Man with John Wayne and Maureen O'Hara, and the Guard with Brendan Gleeson. 
                        On this tour we introduce you to this amazing part of Ireland, but also take you to Galway city for a 2 hrs stop with a FREE walking tour of the highlights of this traditional, colorful and beautiful tribal city.
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                        <p class="pull-left ratingM">15 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €16.99</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>
        
        <!-- Model Box Two -->
        <div id="pop2" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>BLARNEY DAY TOURS</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/BlarneyCastle.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>Visit the most famous castle in all of Ireland - Blarney Castle. Lay back and kiss the magical Blarney Stone and receive the gift of eloquent speech for 7 years. Also visit Cobh, the last departure port for RMS Titanic in April 1912. 
                        Enjoy a stroll in Cobh and visit St Coleman's Cathedral, overlooking Cork Harbour. We will also take a panoramic drive through Cork City, and make a stop for one hour to see the highlights of the Southern Capital including the English Markets which were recently visited by Queen Elizabeth.
                        This tour allows you to see the best of County Cork on this 1 day adventure from Dublin.
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                        <p class="pull-left ratingM">34 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €19.99</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>

        <!-- Model Box Three -->
        <div id="pop3" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>DAY TOURS FROM CORK</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/cork.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>The Rock of Cashel is situated in county Tipperary. On top of the rock you can enjoy fine views of the Tipperary countryside. You will explore one of the finest religious sites in Ireland, and marvel at the fine architecture. 
                        Onwards to Kilkenny. You will enjoy 2 hours of free time in Ireland's medieval capital. Condider an optional visit to the Castle or St Canice's Cathedral. Enjoy a walk in the Castle Gardens, with pleasant views of the River Nore or a pint of Kilkenny beer in a haunted pub! A great day tour from Cork!
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                        <p class="pull-left ratingM">7 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €35</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>

        <!-- Model Box Four -->
        <div id="pop4" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>GIANT'S CAUSEWAY TOUR FROM DUBLIN</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/giantsCausway.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>You cannot truly visit Ireland without a visit to the legendary Giant's Causeway! Volcanic activity helped Finn McCool forge this wonder of the world some 60 million years ago. The 6km of sheer cliffs rising to over 90m and forming a series of bays are spectacular. We include the all-new innovative and imaginative Giant's Causeway Visitors' Center. You will be provided with free audio guides! 
                        We visit the Dark Hedges and Ballintoy, famed by the hit TV series Game of Thrones!
                        From the Giant's Causeway to Belfast, and the magnificent rope bridge this tour has it all! Definitely the most comprehensive tour of Northern Ireland!
                        Our office is open 24hrs a day, 365 days a the year and our online booking engine allows bookings to be made right up until the last minute.
                        For the most memorable day out jump aboard the Paddywagon and let our world famous guides inspire you with songs and stories, making this a wonderful trip with memories to last a lifetime! 
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                        <p class="pull-left ratingM">56 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €60</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>

        <!-- Model Box Five -->
        <div id="pop5" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>DINGLE DAY TOUR FROM KILLARNEY</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/Dingle.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>The Dingle Peninsula has amazing mountain scenery and unusual antiquities to see as you travel around this spectacular peninsula. You will stop at the famed Inch beach, one of the most famous beaches in Ireland, which is a site of outstanding natural beauty. 
                        Then to the most westerly drive in Europe known as the Slea Head drive. Marvel at the Atlantic Coast as you travel on this spectacular road which hugs the western shoreline. Enjoy great views of the Blasket Islands and maybe even see the "Sleeping Giant Island." 
                        You will also stop in Dingle town. This is one of the most picturesque fishing towns in Ireland, and is also famed for Fungi the dolphin who has been a local for almost 30 years. Dingle town is the heart and soul of the Peninsula. Today is attracts visitors, including artists and musicians, from all over the world.
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                        <p class="pull-left ratingM">115 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €25</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>

        <!-- Model Box Six -->
        <div id="pop6" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>2 DAY SOUTH TOUR - CLIFFS OF MOHER</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/CliffOfMohar.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>Your journey on this Cliff of Moher tour will take you from the banks of Dublin’s river Liffey to Ireland’s Wild Atlantic Way. You’ll see the biggest visitor attraction in all of Ireland and experience the nature, geology, history, culture and music of the region as we travel together.
                        The Cliffs of Moher are 66% as tall as New York's Empire State and stretch for almost 10km. Forming part of the edge of Western Europe, this landscape really is a "must see" on a visit to Ireland. You'll enjoy 1.5 hours at the Cliffs of Moher, which is just the right amount of time according to the 90,000 passengers who travel with us annually!
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                        <p class="pull-left ratingM">413 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €40</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>

        <!-- Model Box Seven -->
        <div id="pop7" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>RING OF KERRY DAY TOUR FROM GALWAY</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/RingOfKerry.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>The Ring of Kerry is considered one of the finest drives in the world. From rugged cliffs to golden beaches, small villages and pastures green to peat bogs and picturesque mountain ranges. This peninsula illustrates all that is beautiful, wonderful and wild in our beloved motherland. 
                        The variety of attractions makes this one of the most diverse and interesting day tours that one is likely to experience in their travel adventures. From ancient stone forts to landscapes carved out of rock by the Ice Age, from sparkling lakes to winding mountain passes our day trip shall be a highlight and shall ensure lasting memories of the beautiful Kingdom of Kerry.
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                        </p>
                        <p class="pull-left ratingM">41 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €45</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>

        <!-- Model Box Eight -->
        <div id="pop8" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-header">
                    <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                    <h3>CORK CITY SIGHTSEEING (CORK HOPPER)</h3>
                </div>
                <div class="modal-body">
                    <img src="img/Tours/CorkNight.jpg" class="img-responsive pull-left" width="300" height="300">
                    <small>Experience Cork’s main attractions in one day with Paddywagon’s Hopper Tour!
                        With the Cork Hopper passengers can hop-on board any time of day and use their ticket over 24 or 48 hours to take in the ‘must see’ attractions in County Cork. 
                        Visit the iconic Blarney Castle, Jameson Experience Midleton, Titanic Experience in Cobh or explore Fota Wildlife Park, or Fota House and Gardens.
                        Blarney Castle: 
                        Nearly six centuries old and synonymous around the world with Ireland. We stop here five times throughout the day making it the perfect first or last stop!
                    </small>
                    <div class="ratings">
                        <p class="pull-left">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                        </p>
                        <p class="pull-left ratingM">301 reviews</p>
                        <br>
                    </div>
                </div>
                <div class="modal-footer">
                    <p class="pull-left"><strong>Price: €20</strong></p><button class="btn5 btn btn-primary" data-dismiss="modal">BACK</button>
                </div>
            </div>
        </div>
        
        <!-- Script to Activate the Carousel -->
        <script>
            $('.carousel').carousel({
                interval: 50000 //changes the speed
            });
        </script>
        
        <!-- Back To Top -->
        <ul class="hidden-xs nav pull-right scroll-top">
            <li><a class="scrollup" href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
        </ul>
        <ul class="visible-xs nav pull-right scroll-top1">
            <li><a class="scrollup" href="#" title="Scroll to top"><i class="glyphicon glyphicon-chevron-up"></i></a></li>
        </ul>
    </body>
</html>
