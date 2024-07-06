@extends('adminlte::page')

@section('title', 'Create user')

@section('content_header')
    <h1> Create user </h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4> User Information </h4>
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
                    <form method="POST" action="{{route('admin.user.store')}}">
                        @csrf
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="name" label="Name" placeholder="John Doe"
                                              fgroup-class="col-md-12" disable-feedback required value="{{old('name')}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="email" label="Email" placeholder="example@example.com"
                                              fgroup-class="col-md-12" disable-feedback required value="{{old('email')}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-select label="Role" name="role" fgroup-class="col-md-12">
                                <x-adminlte-options :options="$roles" disabled="1"
                                                    empty-option="Select an option..."/>
                            </x-adminlte-select>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="password" label="Password"
                                              fgroup-class="col-md-12" disable-feedback type="password" required/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="confirm_password" label="Confirm password"
                                              fgroup-class="col-md-12" disable-feedback type="password" required/>
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
