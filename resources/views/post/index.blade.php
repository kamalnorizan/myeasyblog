@extends('layouts.app')
@section('head')

@endsection

@section('title','Post')

@section('titleaction')
<a href="{{route('post.create')}}" class="btn btn-sm btn-primary"><i class="fa fa-plus"></i> Tambah Post</a>
@endsection

@section('content')

<div class="wrapper wrapper-content">
    <div class="row animated fadeInRightBig">
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Senarai Post</h5>
                </div>
                <div class="ibox-content">
                    <table class="table">
                        <tr>
                            <td>Tajuk</td>
                            <td>Penulis</td>
                            <td>Tarikh Publish</td>
                            <td>Tindakan</td>
                        </tr>
                        @foreach ($posts as $post)
                        <tr>
                             <td>
                                 {{$post->title}}
                             </td>
                             <td>
                                 {{$post->user->name}}
                             </td>
                             <td>
                                 {{\Carbon\Carbon::parse($post->created_at)->format('d-m-Y')}}
                             </td>
                             <td>
                                <a href="{{route('post.show',['post'=>$post->id])}}" class="btn btn-xs btn-info"><i class="fa fa-eye"></i> Show</a>
                                <a href="{{route('post.edit',['post'=>$post->id])}}" class="btn btn-xs btn-primary"><i class="fa fa-edit"></i> Edit</a>
                             {{-- <a href="/post/{{$post->id}}/edit" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</a> --}}
                             </td>
                         </tr>
                         @endforeach
                     </table>
                     {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')

@endsection
