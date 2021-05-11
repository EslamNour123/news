@extends('user.layouts.master')

@section('content')
    
  <!-- s-content
    ================================================== -->
    <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">

            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    {{$show_post->title}}
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date">{{$show_post->created_at}} && {{__('messages.categories')}}: {{$show_post->category->name}}</li>
                </ul>
            </div> <!-- end s-content__header -->
    
            <div class="s-content__media col-full">
                <div class="s-content__post-thumb">
                    <img src="{{asset('uploade/admin/image/'.$show_post->image)}}" 
                         srcset="{{asset('uploade/admin/image/'.$show_post->image)}}" 
                         sizes="(max-width: 2000px) 100vw, 2000px" alt="" >
                </div>
            </div> <!-- end s-content__media -->

            <div class="col-full s-content__main">

                <p class="lead">{{$show_post->content}}</p>
                
                <p>
                <img src="images/wheel-1000.jpg" 
                     srcset="images/wheel-2000.jpg 2000w, images/wheel-1000.jpg 1000w, images/wheel-500.jpg 500w" 
                     sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </p>

            </div> <!-- end s-content__main -->

        </article>


        <!-- comments
        ================================================== -->
        <div class="comments-wrap">

            <div id="comments" class="row">
                <div class="col-full">

                    <h3 class="h2">{{__('messages.comment')}}: {{count($show_post->comments)}} </h3>

                    <!-- commentlist -->
                    @forelse ($show_post->comments as $comment)
                    <ol class="commentlist">

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img width="50" height="50" class="avatar" src="{{asset('uploade/admin/user/default.png')}}" alt="">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <cite>{{$comment->user->name}}</cite>

                                    <div class="comment__meta">
                                        <small>{{$comment->created_at}}</small>
                                    </div>
                                </div>

                                <div class="comment__text">
                                <p>{{$comment->content}}</p>
                                </div>
                                
                                <div class="comment__text">
                                    @if(Auth::user()->id == $comment->user_id)
                                    <a class='btn btn-success'href="{{route('update_comment',$comment->id)}}">update</a>
                                    <a class='btn btn-danger'href="{{route('delete_comment',$comment->id)}}">delete</a>
                                    @elseif(Auth::user()->role == 'admin')
                                    <a class='btn btn-danger'href="{{route('delete_comment',$comment->id)}}">delete</a>

                                    @endif
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->


                    </ol> <!-- end commentlist -->

                    @empty
                        
                    @endforelse

                    <!-- respond
                    ================================================== -->
                    <div class="respond">

                        <h3 class="h2">{{__('messages.add_comment')}}</h3>

                        <form name="contactForm" id="contactForm" method="post" action="{{route('create_comment',$show_post->id)}}">
                           @csrf
                            <fieldset>

                                <div class="message form-field">
                                    <input type='hidden'name="post_id" class="full-width"value='{{$show_post->id}}'/>
                               </div>

                                <div class="message form-field">
                                    <textarea name="content" id="cMessage" class="full-width" placeholder="content"></textarea>
                                    @error('content')
                                        <small class='alert alert-danger'>{{$message}}</small>
                                    @enderror
                               </div>

                                <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>

                            </fieldset>
                        </form> <!-- end form -->

                    </div> <!-- end respond -->

                </div> <!-- end col-full -->

            </div> <!-- end row comments -->
        </div> <!-- end comments-wrap -->

    </section> <!-- s-content -->



@endsection