@extends('user.layouts.master')

@section('content')

<section class="s-content">
        
    <div class="row masonry-wrap">
        <div class="masonry">

            <div class="grid-sizer"></div>


           @forelse ($posts as $post)
           <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    
            <div class="entry__thumb">
                <a href="{{route('show',$post->id)}}" class="entry__thumb-link">
                    <img src="{{asset('uploade/admin/image/'.$post->image)}}" 
                            srcset="{{asset('uploade/admin/image/'.$post->image)}}" alt="">
                </a>
            </div>

            <div class="entry__text">
                <div class="entry__header">
                    <div class="entry__date">
                        <small href="single-standard.html">{{($post->created_at)}} && Category:</small>
                    </div>
                    <h1 class="entry__title"><a href="single-standard.html">{{substr($post->title,0,100)}}</a></h1>
                </div>
                <div class="entry__excerpt">
                    <p>
                      {{substr($post->content,0,300)}}
                    </p>
                </div>

            </div>

        </article> <!-- end article -->
           @empty
               <p class='alert alert-danger'>not should posts</p>
           @endforelse

        </div> <!-- end masonry -->
    </div> <!-- end masonry-wrap -->

    {{-- <div class="container">
        <div class="col-full">
            <nav class="pgn">
                <ul>
                    <li><a>{{$posts->links()}}</a></li>
                </ul>
            </nav>
        </div>
    </div> --}}

</section> <!-- s-content -->


@endsection