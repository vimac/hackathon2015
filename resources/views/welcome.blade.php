@extends('layouts.master')

@section('title', 'Hello World')

@section('sidebar')
    @parent

    <p>边栏</p>
@stop

@section('content')
    @foreach ($posts as $post)
        <div>
            <p>post id: {{ $post->id }}</p>
            <p>post title: {{ $post->title}}</p>
            <p>post content: {{ $post->id }}</p>
        </div>
    @endforeach
@stop