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
            
            <h5>About us heading</h5>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem officia est reiciendis cum obcaecati, repellendus veritatis id. Molestias mollitia necessitatibus laudantium non dolorem, officiis obcaecati eum! Ab totam id quis.</p>
            
        </div>
    </section>

    @include('layouts.footer')
    
</body>
</html>