<!DOCTYPE html>
<html lang="en">
<head>

    @php $pageTitle = "All Blogs " @endphp

    @include('layouts.app')

</head>
<body>

    @include('layouts.header')

    <section class="contact-img-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="con-text">
                        <h2 class="page-title">All Blogs</h2>
                        <p><a href="{{url('')}}">Home</a> | All Blogs</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="blog-area">
        <div class="container">
            <div class="row">
               <div class="col-xl-9 col-lg-8 col-md-7 col-12">
                    @foreach ($blogs as $blog)
                    <div class="tb-post-item">
                        <a href="{{url('blog/'.$blog->token_number)}}">
                            <div class="tb-thumb">
                                <img src="{{url($blog->blog_image)}}" alt="blog-img">
                                <span class="tb-publish font-noraure-3">{{date('d-m-Y',strtotime($blog->created_at))}}</span>
                            </div>
                        </a>
                        <div class="tb-content7">
                            <a href="{{url('blog/'.$blog->token_number)}}"><h4 class="tb-titlel">{{$blog->blog_title}}</h4></a>
                            <div class="blog-info">
                                <span class="author-name">
                                    <i class="fa fa-user"></i>
                                    By <a>admin</a>
                                </span>
                                <span class="categories">
                                    <i class="fa fa-calendar"></i>
                                    <a>{{date('d-m-Y',strtotime($blog->created_at))}}</a>
                                </span>
                            </div>
                            <div class="tb-excerpt"> {{$blog->blog_description}} </div>
                            <a class="blog7" href="{{url('blog/'.$blog->token_number)}}">READ MORE</a>
                        </div>
                    </div>   
                    @endforeach
                </div>
               <div class="col-xl-3 col-lg-4 col-md-5 col-12">
                    {{-- <div class="widget_searchform_content active">
                        <form action="#">
                            <input type="text" value="" name="s" placeholder="Search">
                            <input type="submit" value="Search">
                        </form>
                    </div> --}}
                   <div class="zo-recent-posts">
                        <h3 class="wg-title">Latest Posts</h3>
                       <ul>
                        @foreach (DB::table('blogs')->orderBy('created_at','DESC')->paginate(4)  as $key)
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
                   </div>
                   
                </div>
            </div>
        </div>
    </section>

    @include('layouts.footer')
    <script>
        $(document).ready(function(){
            $('#demo').pagination({
                dataSource: [1, 2, 3, 4, 5, 6, 7, ... , 195],
                callback: function(data, pagination) {
                    var html = template(data);
                    dataContainer.html(html);
                }
            })
        });
    </script>
    
</body>
</html>