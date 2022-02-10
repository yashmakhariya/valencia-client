<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "About us " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">About us </h2>
                        <p><a href="{{url('')}}">Home</a> | About us </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="page-section">
        <div class="container">
            
            <h5>About Valencia</h5>
            <p>Valencia is a shopping website that focuses on the newest fashion trends and innovative apparel concepts. <br><br>At Valencia, our mission is to enable women and men to get a unique fashionable look. We believe that if you look good, you feel good. Valencia offers you a diverse selection of fashionable clothes and activity based t-shirts, all at affordable prices to make them accessible to you.</p>
            
            
            <h4>HAPPY SHOPPING :)</h4>
        </div>
    </section>

    @include('layouts.footer')
    
</body>
</html>