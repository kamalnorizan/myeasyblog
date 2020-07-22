@extends('layouts.app')
@section('head')

@endsection

@section('title')
@if(isset($post))
    Update Post
@else
    Create New Post
@endif
@endsection

@section('titleaction')

@endsection

@section('content')

<div class="wrapper wrapper-content">
  <div class="row animated fadeInRightBig">
    <div class="col-md-12">
      <div class="ibox float-e-margins">
        <div class="ibox-title">
          <h5>Post Form</h5>
        </div>
        <div class="ibox-content">
          @if (isset($post))

            {!! Form::model($post, ['route' => ['post.update', $post->id], 'method' => 'PUT']) !!}

          @else

            {!! Form::open(['method' => 'POST', 'route' => 'post.store']) !!}

          @endif

          @include('post._form')

          @if (isset($post))
            <div class="btn-group pull-right">
                {!! Form::submit("Kemaskini", ['class' => 'btn btn-success']) !!}
            </div>
          @else
            <div class="btn-group pull-right">
                {!! Form::reset("Reset", ['class' => 'btn btn-warning']) !!}
                {!! Form::submit("Simpan", ['class' => 'btn btn-success']) !!}
            </div>
          @endif

          {!! Form::close() !!}
          <br><br>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('script')

@endsection
