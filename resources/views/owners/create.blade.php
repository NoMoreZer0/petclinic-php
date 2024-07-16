@extends('adminlte::page')

@section('title', 'Create owner')

@section('content_header')
    <h1> Create owner </h1>
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
                    <ul class="nav nav-tabs" id="ownerTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="owner-info-tab" data-toggle="tab" href="#owner-info" role="tab" aria-controls="owner-info" aria-selected="true">Owner Info</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pets-tab" data-toggle="tab" href="#pets" role="tab" aria-controls="pets" aria-selected="false">Pets</a>
                        </li>
                    </ul>
                    <div class="tab-content" id="ownerTabContent">
                        <div class="tab-pane fade show active mt-3" id="owner-info" role="tabpanel" aria-labelledby="owner-info-tab">
                            <form method="POST" action="{{route('admin.owner.store')}}">
                                @csrf
                                <div class="mb-2 col-lg-18">
                                    <x-adminlte-input name="first_name" label="First Name"
                                                      fgroup-class="col-md-12" disable-feedback required value="{{old('first_name')}}"/>
                                </div>
                                <div class="mb-2 col-lg-18">
                                    <x-adminlte-input name="last_name" label="Last Name"
                                                      fgroup-class="col-md-12" disable-feedback required value="{{old('last_name')}}"/>
                                </div>
                                <div class="mb-2 col-lg-18">
                                    <x-adminlte-input name="address" label="Address"
                                                      fgroup-class="col-md-12" disable-feedback required value="{{old('address')}}"/>
                                </div>
                                <div class="mb-2 col-lg-18">
                                    <x-adminlte-input name="city" label="City"
                                                      fgroup-class="col-md-12" disable-feedback required value="{{old('city')}}"/>
                                </div>
                                <div class="mb-2 col-lg-18">
                                    <x-adminlte-input name="email" label="Email"
                                                      fgroup-class="col-md-12" disable-feedback required value="{{old('email')}}"/>
                                </div>
                                <div class="mb-2 col-lg-18">
                                    <x-adminlte-input name="phone_number" label="Phone Number"
                                                      fgroup-class="col-md-12" disable-feedback required value="{{old('phone_number')}}"/>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pets" role="tabpanel" aria-labelledby="pets-tab">
                            <table class="table table-striped projects">

                            </table>
                        </div>
                    </div>
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
