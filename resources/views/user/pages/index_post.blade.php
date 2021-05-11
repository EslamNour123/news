@extends('user.layouts.master')

@section('content')
    

    <!-- s-content
    ================================================== -->
    <section class="s-content">
        
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>


               @forelse ($posts as $post)
               <article class="masonry__brick entry format-standard" data-aos="fade-up">
                        
                <div class="entry__thumb">
                    <a href="{{route('show',$post->id)}}" class="entry__thumb-link">
                        <img src="{{asset('uploade/admin/image/'.$post->image)}}" width="100%"
                                srcset="{{asset('uploade/admin/image/'.$post->image)}}" alt="">
                    </a>
                </div>

                <div class="entry__text">
                    <div class="entry__header">
                        <div class="entry__date">
                            <small href="single-standard.html">{{($post->created_at)}} && Category: {{$post->category->name}}</small>
                        </div>
                        <h1 class="entry__title"><a href="single-standard.html">{{substr($post->title,0,100)}}</a></h1>
                    </div>
                    <div class="entry__excerpt">
                        <p>
                          {{substr($post->content,0,300)}}
                        </p>
                    </div>
                    <div class="entry__meta">
                        <span class="entry__meta-links">
                            <a href="{{route('show',$post->id)}}">Show</a>
                        </span>
                    </div>
                </div>

            </article> <!-- end article -->
               @empty
                   <p class='alert alert-danger'>not should posts</p>
               @endforelse

            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

        <div class="container">
            <div class="col-full">
                <nav class="pgn">
                    <ul>
                        <li><a>{{$posts->links()}}</a></li>
                    </ul>
                </nav>
            </div>
        </div>

    </section> <!-- s-content -->


    <!-- s-extra
    ================================================== -->
    <section class="s-extra">
     <div class='container-fluid'>
      <div class='row'>
        <div class="top col-md-6">
        
            <div class="">
                <h3>last 10 Posts</h3>
        
                <div class="block-1-2 block-m-full popular__posts">
        
                    @forelse ($posts as $post)
                    <article class="col-block popular__post">
                        <a href="#0" class="popular__thumb">
                            <img src="{{asset('uploade/admin/image/'.$post->image)}}" alt="">
                        </a>
                        <h5><a href="#0">{{$post->title}}</a></h5>
                        <section class="popular__meta">
                            <span class="popular__author"><span>By</span> <a href="#">{{$post->created_at}}</a></span>
                        </section>
                    </article>
                    @empty
                      <p class='alert alert-danger'> No Articles</p>  
                    @endforelse

                </div> <!-- end popular_posts -->
            </div> <!-- end popular -->
        </div>

      </div>
     </div>
    </section> <!-- end s-extra -->

@endsection




