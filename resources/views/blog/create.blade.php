@extends('adminlte::page')

@section('title', 'Create post')

@section('content_header')
    <h1> Create post </h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> Post information </h4>
                </div>
                <div class="card-body p-2">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{route('admin.blog.store')}}">
                        @csrf
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="title"
                                              label="Title"
                                              fgroup-class="col-md-12"
                                              disable-feedback
                                              required
                                              value="{{old('title')}}"
                            />
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-textarea
                                name="body"
                                label="Body"
                                fgroup-class="col-md-12"
                                disable-feedback
                                rows=9
                                required
                                value="{{old('body')}}"
                            />
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
