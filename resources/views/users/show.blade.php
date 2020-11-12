@extends('layouts.app')

@section('content')
    <div class="row">
        <aside class="col-sm-4">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->name }}</h3>
                </div>
                <div class="card-body">
                    <img class="rounded img-fluid" src="{{ str_replace( "_normal.", ".", $user->avatar) }}" alt="" width='200' height='200'>
                </div>
            </div>
        </aside>
        <h2 class='text-center mt-5 bg-light'>メッセージを送る</h2>
                    {!! Form::open(['route' => 'posts.store']) !!}
                        <div class="form-group mt-3">
                            {!! Form::textarea('content', old('content'), ['class' => 'form-control', 'rows' => '5']) !!}
                            {{ Form::hidden('receive_id',$user->id) }}
                            {!! Form::submit('投稿', ['class' => 'btn btn-primary btn-block mx-auto col-3 mt-1']) !!}
                        </div>
                    {!! Form::close() !!}
    </div>
@endsection