@extends('layouts.app')
@section('content')
<div style= "float: right" class="input-group-btn pt-2">
<form action="" method="post">
@csrf
<a class="btn btn-primary"href="http://127.0.0.1:8000/posts/create">Add post</a>
<button formaction="/deleteall" type="submit" style="width: 90px" class="btn btn-danger">Delete</button> 
</div>
<h1>Posts</h1>  
<hr>
<div class="pt-2">
@if(count($posts) > 0)
<div class="row"> 
    @foreach($posts as $post)
    <div class='col-3 mb-3'>
        <div class='card text-center'>
        <div class='card-body'>
                <div class='row'>
                <div class='col-1'>
                <input type='checkbox'class="selectbox" name ='delid[]' id="check" value="{{ $post->id }}">
                </div>
                    {{$a = ""}}
                    <div class='col-11'>{{ $post->SKU }}<br>{{ $post->Name }}<br>${{ $post->Price }}<br>@if($post->Type == "DVD-disc") {{$a = "Size ".$post->Attribute}} @elseif($post->Type == "Book"){{$a = "Weight ".$post->Attribute}} @else{{$a = "Dimension ".$post->Attribute}} @endif</div>
                </div>
        </div>
        </div>
    </div>
    @endforeach
    </form>
    @else
        <p>No posts found</p>
    @endif
    </div>
</div>
<footer>
    <hr>
    <p style="text-align: center">Work in progress</p>
</footer>
@endsection

