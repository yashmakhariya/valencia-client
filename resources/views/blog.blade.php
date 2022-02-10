<!DOCTYPE html>
<html lang="en">
<head>

    @foreach ($blog as $item)
    @php $pageTitle = $item->blog_title; @endphp    
    @endforeach

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    @foreach ($blog as $item)

    <section class="contact-img-area nu-blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">{{$item->blog_title}}</h2>
                        <p><a href="{{url('')}}">Home </a> | {{$item->blog_title}}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-area bd-area">
        <div class="container">
            <div class="row">
               <div class="col-xl-9 col-lg-8 col-md-7 col-12">
                    <div class="tb-post-item ma-nn">
                        
                            <div class="tb-thumb">
                                <img src="{{url($item->blog_image)}}" alt="blog-image">
                                <span class="tb-publish font-noraure-3">{{date('d-m-Y', strtotime($item->created_at))}}</span>
                            </div>
                        <div class="tb-content7">
                            <div class="blog-info">
                                <span class="author-name">
                                    <i class="fa fa-user"></i>
                                    By
                                    <a href="#">admin</a>
                                </span>
                            </div>
                            <h4 class="tb-titlel">{{$item->blog_title}}</h4>
                            <h6 class="tb-titlel">{{$item->blog_description}}</h6>
                            <hr>
                            <div class="blog-desc">
                            <pre>{!!$item->blog_content!!}</pre>
                            </div>
                            {{-- <div class="next-pre">
                                <a class="blog1" href="#"> <i class="fa fa-angle-left"></i> Previous</a>
                                <a class="blog2" href="#"><i class="fa fa-angle-right"></i> Next</a>
                            </div> --}}
                        </div>
                    </div>
                </div>
               <div class="col-xl-3 col-lg-4 col-md-5 col-12">
                    <div class="widget_searchform_content active">
                        <form action="#">
                            <input type="text" value="" name="s" placeholder="Search">
                            <input type="submit" value="Search">
                        </form>
                    </div>
                   <div class="zo-recent-posts">
                        <h3 class="wg-title">Latest Posts</h3>
                        <ul>
                            @foreach (DB::table('blogs')->where('id','!=',$item->id)->orderBy('created_at','DESC')->paginate(4)  as $key)
                            <li>
                                <div class="tb-recent-thumbb">
                                    <a href="{{url('blog/'.$key->token_number)}}">
                                        <img class="attachment" src="{{url($key->blog_image)}}" alt="blog-image">
                                    </a>
                                    <div class="recent-thumb-overlay"></div>
                                </div>
                                <div class="tb-recentb">
                                    <div class="tb-postb">
                                        <p>{{$key->blog_title}}</p>
                                    </div>
                                    <div class="tb-postd">
                                        <span>{{date('d-m-Y', strtotime($key->created_at))}}</span>
                                    </div>
                                </div>
                            </li>    
                            @endforeach
                            
                        </ul>
                   </div>
                   
                   
                </div>
            </div>
        </div>
    </section>

    @endforeach

    @include('layouts.footer')
    
</body>
</html>

