@extends('adminlte::page')

@section('title', 'Create owner')

@section('content_header')
    <h1> Edit owner </h1>
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
                    <form method="POST" action="{{route('admin.owner.update', $owner->id)}}">
                        @csrf
                        @method('PUT')
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="first_name" label="First Name"
                                              fgroup-class="col-md-12" disable-feedback required value="{{$owner->first_name}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="last_name" label="Last Name"
                                              fgroup-class="col-md-12" disable-feedback required value="{{$owner->last_name}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="address" label="Address"
                                              fgroup-class="col-md-12" disable-feedback required value="{{$owner->address}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="city" label="City"
                                              fgroup-class="col-md-12" disable-feedback required value="{{$owner->city}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="email" label="Email"
                                              fgroup-class="col-md-12" disable-feedback required value="{{$owner->email}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="phone_number" label="Phone Number"
                                              fgroup-class="col-md-12" disable-feedback required value="{{$owner->phone_number}}"/>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop

@section('js')
@stop
