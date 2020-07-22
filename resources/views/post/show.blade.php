@extends('layouts.app')
@section('head')

@endsection

@section('title',$post->title)

@section('titleaction')

@endsection

@section('content')
<div class="wrapper wrapper-content">
    <div class="row animated fadeInRightBig">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{$post->title}} ~ <em>{{$post->user->name}}</em></h5>
                </div>
                <div class="ibox-content">
                    {{$post->content}}
                </div>
            </div>
        </div>
    </div>
    {{-- {{$post->comments->first()->user->name ?? ''}}
     --}}
    <div class="chat-discussion">
        @foreach ($post->comments as $comment)
            <div class="chat-message">
                <div class="message">
                    <div class="message-author">{{$comment->user->name}}</div>
                    <span class="message-date"> {{\Carbon\Carbon::parse($comment->created_at)->format('d-m-Y')}} </span>
                    <span class="message-content">
                        {{$comment->comment}}
                    </span>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection

@section('script')

@endsection
