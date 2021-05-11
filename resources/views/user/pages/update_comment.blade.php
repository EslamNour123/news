@extends('user.layouts.master')

@section('content')
    
<div style='background:#fff;'class="respond">

    <h3 class="h2">Update Comment</h3>

    <form name="contactForm" id="contactForm" method="post" action="{{route('update_comment_store',$comments->id)}}">
       @csrf
        <fieldset>

            <div class="message form-field">
                <input type='hidden'name="post_id" class="full-width"value='{{$comments->post_id}}'/>
           </div>

            <div class="message form-field">
                <textarea name="content" id="cMessage" class="full-width" placeholder="content">{{$comments->content}}</textarea>
                @error('content')
                    <small class='alert alert-danger'>{{$message}}</small>
                @enderror
           </div>

            <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>

        </fieldset>
    </form> <!-- end form -->

</div> <!-- end respond -->


@endsection