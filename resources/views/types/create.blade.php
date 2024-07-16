@extends('adminlte::page')

@section('title', 'Create user')

@section('content_header')
    <h1> Create user </h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
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
                    <form class="mt-3" method="POST" action="{{route('admin.type.store')}}">
                        @csrf
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="name" label="Name"
                                              fgroup-class="col-md-12" disable-feedback required value="{{old('name')}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="color" label="Color" placeholder="Color of the Pet Type as HEX color code."
                                              fgroup-class="col-md-12" disable-feedback required value="{{old('color')}}"/>
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
