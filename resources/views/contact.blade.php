<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "Contact us " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">Contact</h2>
                        <p><a href="{{url('')}}">Home</a> | Contact</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="noru-contact">
        <div class="container">
            <form action="{{route('contact')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="row">
                            <div class="all-contact">
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="di-na">
                                        <label class="l-contact">Your name<em>*</em></label>
                                        <input class="form-control" type="text" required name="name">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <div class="di-na">
                                        <label class="l-contact">Email address<em>*</em></label>
                                        <input class="form-control" type="email" required name="email">
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-12">
                                    <label class="l-contact">Phone <em>*</em></label>
                                    <input class="form-control" type="tel" minlength="10" maxlength="10" required name="phone">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <label class="l-contact con-color">Message  <em>*</em></label>
                        <textarea class="form-control" required name="message"></textarea>
                    </div>
                    <div class="col-lg-12">
                        <div class="last-cart-con">
                            <input class="wpcf7" type="submit" value="Send Message">
                        </div>
                    </div>
                </div>
            </form>
            <div class="row">
                <div class="col-md-12">
                    <div class="map-area">
                        <div class="contact-map">
                          <div class="container text-center">
                    <h3>Operating Address:</h3>
                    <p>The hostel yard, 12-13, royal street lane, Raipur khadar, sector -126, Noida - 201310</p>
                </div><br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

    @include('layouts.footer')

    <!--{{-- Google Maps Script --}}-->
    <!--<script src="https://maps.googleapis.com/maps/api/js"></script>-->
    <!--<script>-->
    <!--    var myCenter=new google.maps.LatLng(44.868771, 24.856159);-->
    <!--    function initialize() {-->
    <!--        var mapProp = {-->
    <!--            center:myCenter,-->
    <!--            scrollwheel: false,-->
    <!--            zoom:17,-->
    <!--            mapTypeId:google.maps.MapTypeId.ROADMAP-->
    <!--        };-->
    <!--        var map=new google.maps.Map(document.getElementById("hastech"),mapProp);-->
    <!--        var marker=new google.maps.Marker({-->
    <!--            position:myCenter,-->
    <!--            animation:google.maps.Animation.BOUNCE,-->
    <!--            icon:'img/map-marker.png',-->
    <!--            map: map,-->
    <!--        });-->

    <!--        marker.setMap(map);-->
    <!--    }-->
    <!--    google.maps.event.addDomListener(window, 'load', initialize);-->
    <!--</script> -->
    
</body>
</html>