<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> {{ config('app.name' , 'Hospital Management') }}</title>

    <link rel="shortcut icon" href="assets/ext/images/fav.jpg">
    <link rel="stylesheet" href="assets/ext/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/ext/css/fontawsom-all.min.css">
    <link rel="stylesheet" href="assets/ext/css/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/ext/css/style.css" />
</head>

<body>

    <!-- ################# Header Starts Here#######################--->

    <header id="menu-jk">

        <div id="nav-head" class="header-nav">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2 col-md-3 no-padding col-sm-12 nav-img">
                        <img src="assets/ext/images/logo.jpg" alt="">
                        <a data-toggle="collapse" data-target="#menu" href="#menu" ><i class="fas d-block d-md-none small-menu fa-bars"></i></a>
                    </div>
                    <div id="menu" class="col-lg-8 col-md-9 d-none d-md-block nav-item">
                        <ul>
                            <li><a href="/">Home</a></li>
                            @if (auth()->user())
                            <li><a href="/dashboard">Dashboard</a></li>
                            @else
                            <li><a href="/login">Login</a></li>
                            <li><a href="/register">Register</a></li>
                            @endif
                            <li><a href="#doctors">Doctors</a></li>
                            <li><a href="#about_us">About</a></li>
                            <li><a href="#contact_us">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-2 d-none d-lg-block appoint">
                        <a href="/dashboard" class="btn btn-success">Book an Appointment</a>
                    </div>
                </div>

            </div>
        </div>
    </header>

    <!-- ################# Slider Starts Here#######################--->

    <div class="slider-detail">

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item ">
                    <img class="d-block w-100" src="assets/ext/images/slider/slider_1.jpg" alt="First slide">
                    <div class="carousel-cover"></div>
                    <div class="carousel-caption vdg-cur d-none d-md-block">
                        <h5 class="animated bounceInDown">{{config('app.name')}}</h5>
                        <p class="animated bounceInLeft">{{config('app.name')}}’s rich historical background began in 1949 as a grassroots effort among residents in Rolla and the surrounding communities. A medical facility was needed in the community, so area residents and organizations in Rolla stepped up to make that happen. Through philanthropic efforts by community businesses and area residents, construction of the {{config('app.name')}}, as it was called in the early years, was completed on ground donated by the Rolla Lions Club and opened to the public on March 12, 1951.</p>

                        <div class="row vbh">

                           <a href="/dashboard" class="btn btn-default animated bounceInUp"> Book an Appointment </a>
                       </div>
                   </div>
               </div>

               <div class="carousel-item active">
                <img class="d-block w-100" src="assets/ext/images/slider/slider_3.jpg" alt="Third slide">
                <div class="carousel-cover"></div>
                <div class="carousel-caption vdg-cur d-none d-md-block">
                    <h5 class="animated bounceInDown">{{config('app.name')}}</h5>
                    <p class="animated bounceInLeft">{{config('app.name')}} opened with 63 beds, including 15 bassinets for infants, two surgery rooms, two obstetrical rooms, a big kitchen, a laundry area and a variety of other facilities to make it an all-inclusive medical center. In 1951, the new hospital was, according to The Rolla Daily News, “one of the finest medical centers to be built in the Midwest in recent years.” A staff of 65 employees, including 12 registered nurses, 14 practical nurses and nine referring physicians from the surrounding counties provided care to the hospital’s first patients.</p>

                    <div class="row vbh">

                       <a href="/dashboard" class="btn btn-default animated bounceInUp"> Book an Appointment </a>
                   </div>
               </div>
           </div>

       </div>
       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>


</div>

<!-- ################# Our Departments Starts Here#######################--->


<section id="services" class="key-features department">
    <div class="container">
        <div class="inner-title">

            <h2>Our Key Features</h2>
            <p>Take a look at some of our key features</p>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-heartbeat"></i>
                    <h5>Cardiology</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                    <i class="fas fa-ribbon"></i>
                    <h5>Orthopaedic</h5>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <div class="single-key">
                 <i class="fab fa-monero"></i>
                 <h5>Neurologist</h5>
             </div>
         </div>

         <div class="col-lg-4 col-md-6">
            <div class="single-key">
                <i class="fas fa-capsules"></i>
                <h5>Pharma Pipeline</h5>
            </div>
        </div>

        <div class="col-lg-4 col-md-6">
            <div class="single-key">
                <i class="fas fa-prescription-bottle-alt"></i>
                <h5>Pharma Team</h5>
            </div>
        </div>



        <div class="col-lg-4 col-md-6">
            <div class="single-key">
                <i class="far fa-thumbs-up"></i>
                <h5>High Quality treatments</h5>
            </div>
        </div>
    </div>






</div>

</section>

<!--  ************************* Doctors Starts Here ************************** -->


<section id="doctors" class="our-blog container-fluid">
    <div class="container">
        <div class="inner-title">

            <h2>Our Doctors</h2>
            <p>Take a look at our Doctors</p>
        </div>
        <div class="col-sm-12 blog-cont">
            <div class="row no-margin">
                @foreach ($doctors as $doctor)
                <div class="col-sm-4 blog-smk">
                    <div class="blog-single">

                     @if ($doctor->photo !=null)
                     <img src="{{$doctor->photo}}" alt="{{$doctor->name}}">
                     @else
                     <img src="/uploads/users/avatar.jpg" alt="{{$doctor->name}}">
                     @endif

                     <div class="blog-single-det">
                        <h6>{{$doctor->name}}</h6>
                        <span>Since: {{$doctor->created_at ?? date_format($doctor->created_at, 'd-m-Y')}}</span>
                        @php($data = \App\DoctorFee::where('doctor',$doctor->id)->first())
                        <p>Fee: {{$data ? $data->amount : '--'}}</p>
                        <a href="/appointments/create?doctor={{$doctor->id}}">
                            <button class="btn btn-success btn-sm">Book Appointment</button>
                        </a>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>

</div>
</section>

<!--  ************************* About Us Starts Here ************************** -->

<section id="about_us" class="about-us">
    <div class="row no-margin">
        <div class="col-sm-6 image-bg no-padding">

        </div>
        <div class="col-sm-6 abut-yoiu">
            <h3>About Our Hospital</h3>
            <p>

            </p>
            <p>
                {{config('app.name')}}’s rich historical background began in 1949 as a grassroots effort among residents in Rolla and the surrounding communities. A medical facility was needed in the community, so area residents and organizations in Rolla stepped up to make that happen. Through philanthropic efforts by community businesses and area residents, construction of the {{config('app.name')}}, as it was called in the early years, was completed on ground donated by the Rolla Lions Club and opened to the public on March 12, 1951.
                <br>
                {{config('app.name')}} opened with 63 beds, including 15 bassinets for infants, two surgery rooms, two obstetrical rooms, a big kitchen, a laundry area and a variety of other facilities to make it an all-inclusive medical center. In 1951, the new hospital was, according to The Rolla Daily News, “one of the finest medical centers to be built in the Midwest in recent years.” A staff of 65 employees, including 12 registered nurses, 14 practical nurses and nine referring physicians from the surrounding counties provided care to the hospital’s first patients.
            </p>
        </div>
    </div>
</section>


<!--  ************************* Gallery Starts Here ************************** -->
<div id="gallery" class="gallery">
 <div class="container">
  <div class="inner-title">

    <h2>Our Gallery</h2>
    <p>View Our Gallery</p>
</div>
<div class="row">


    <div class="gallery-filter d-none d-sm-block">
        <button class="btn btn-default filter-button" data-filter="all">All</button>
        <button class="btn btn-default filter-button" data-filter="hdpe">Dental</button>
        <button class="btn btn-default filter-button" data-filter="sprinkle">Cardiology</button>
        <button class="btn btn-default filter-button" data-filter="spray"> Neurology</button>
        <button class="btn btn-default filter-button" data-filter="irrigation">Laboratry</button>
    </div>
    <br/>



    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
        <img src="assets/ext/images/gallery/gallery_01.jpg" class="img-responsive">
    </div>

    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter sprinkle">
        <img src="assets/ext/images/gallery/gallery_02.jpg" class="img-responsive">
    </div>

    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter hdpe">
        <img src="assets/ext/images/gallery/gallery_03.jpg" class="img-responsive">
    </div>

    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter irrigation">
        <img src="assets/ext/images/gallery/gallery_04.jpg" class="img-responsive">
    </div>

    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
        <img src="assets/ext/images/gallery/gallery_05.jpg" class="img-responsive">
    </div>



    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter spray">
        <img src="assets/ext/images/gallery/gallery_06.jpg" class="img-responsive">
    </div>

</div>
</div>


</div>
<!-- ######## Gallery End ####### -->


<!--  ************************* Contact Us Starts Here ************************** -->

<section id="contact_us" class="contact-us-single">
    <div class="row no-margin">
        <div class="col-sm-6 no-padding">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.82239587302!2d90.27923918352894!3d23.78088745429989!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1585627894736!5m2!1sen!2sbd" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
       </div>
       <div  class="col-sm-6 cop-ck">
         <h2>Contact Us</h2>
         <address class="md-margin-bottom-40">
            {{config('app.name')}} <br>
            Dhaka - 1200<br>
            Bangladesh <br>
            Email: <a href="mailto:info@hospital.com" class="">info@hospital.com</a><br>
            Web: <a href="/" class="">www.hospital.com</a>
        </address>
    </div>
</div>
</section>




<div class="copy">
    <div class="container">
        <a href="https://www.smarteyeapps.com/">{{date('Y')}} {{config('app.name')}}</a>

                <!-- <span>
                <a><i class="fab fa-github"></i></a>
                <a><i class="fab fa-google-plus-g"></i></a>
                <a><i class="fab fa-pinterest-p"></i></a>
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook-f"></i></a>
            </span> -->
        </div>

    </div>

</body>

<script src="assets/ext/js/jquery-3.2.1.min.js"></script>
<script src="assets/ext/js/popper.min.js"></script>
<script src="assets/ext/js/bootstrap.min.js"></script>
<script src="assets/ext/plugins/scroll-nav/js/jquery.easing.min.js"></script>
<script src="assets/ext/plugins/scroll-nav/js/scrolling-nav.js"></script>
<script src="assets/ext/plugins/scroll-fixed/jquery-scrolltofixed-min.js"></script>

<script src="assets/ext/js/script.js"></script>



</html>
