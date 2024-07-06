@extends('adminlte::page')

@section('title', 'Blog')

@section('content_header')
    <h1> Blog </h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif

            @if(auth()->user()->role == 'super_admin')
                <div class="mb-3 text-right">
                    <a href="{{route('admin.blog.create')}}" class="btn btn-primary"> Create </a>
                </div>
            @endif

            @forelse($posts as $post)
                <div class="card">
                    <div class="card-header">
                        <h3> {{$post->title}} </h3>
                    </div>
                    <div class="card-body">
                        {{$post->body}}
                    </div>
                </div>
            @empty
                <div class="card">
                    <div class="card-body">
                        Posts will be here...
                    </div>
                </div>
            @endforelse
            @include('includes.pagination', ['items' => $posts])
        </div>
    </section>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
