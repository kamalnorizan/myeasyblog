<div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
    {!! Form::label('title', 'Tajuk') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('title') }}</small>
</div>
<div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
    {!! Form::label('content', 'Pengisian') !!}
    {!! Form::textarea('content', null, ['class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('content') }}</small>
</div>
{{-- {!! Form::hidden('user_id', Auth::user()->id, ['id'=>'user_id']) !!} --}}

<div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
    {!! Form::label('user_id', 'Writer') !!}
    {!! Form::select('user_id',$users, null, ['id' => 'user_id', 'class' => 'form-control', 'required' => 'required']) !!}
    <small class="text-danger">{{ $errors->first('user_id') }}</small>
</div>


