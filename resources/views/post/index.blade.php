@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Senarai Post</div>
                <div class="card-body">
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

                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

