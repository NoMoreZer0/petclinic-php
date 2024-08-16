@extends('adminlte::page')


@section('title', 'Create pet')

@section('content_header')
    <h1> Create pet </h1>
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
                    <form class="mt-3" method="POST" action="{{route('admin.pet.store')}}">
                        @csrf
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="name" label="Name"
                                              fgroup-class="col-md-12" disable-feedback required
                                              value="{{old('name')}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-input name="birth_date" label="Birth Date"
                                              fgroup-class="col-md-12" disable-feedback required
                                              type="date"
                                              value="{{old('birth_date')}}"/>
                        </div>
                        <div class="mb-2 col-lg-18">
                            <x-adminlte-select name="type" label="Type" fgroup-class="col-md-12">
                                <x-adminlte-options :options="$types"
                                                    empty-option="Select an option..."/>
                            </x-adminlte-select>
                        </div>
                        <div class="mb-2 col-lg-18 d-flex align-items-end">
                            <div class="col-md-10">
                                <x-adminlte-input name="owner" label="Owner"
                                                  fgroup-class="col-md-12" required
                                                  value="{{ old('owner') }}"/>
                            </div>
                            <div class="col-md-2">
                                <a type="button" class="btn btn-primary mb-3" data-toggle="modal"
                                   data-target="#SelectOwner"> Select </a>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    {{-- Owner selection modal --}}
    <div class="modal fade w-100" id="SelectOwner">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    Select owner
                </div>
                <div class="modal-body">
                    <table class="table table-striped projects">
                        <thead>
                        <tr>
                            <th>
                                ID
                            </th>
                            <th>
                                First name
                            </th>
                            <th>
                                Last name
                            </th>
                            <th>
                                Address
                            </th>
                            <th>
                                City
                            </th>
                            <th>
                                Email
                            </th>
                            <th>
                                Phone number
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($owners as $owner)
                            <tr>
                                <td>
                                    {{$owner->id}}
                                </td>
                                <td>
                                    {{$owner->first_name}}
                                </td>
                                <td>
                                    {{$owner->last_name}}
                                </td>
                                <td>
                                    {{$owner->address}}
                                </td>
                                <td>
                                    {{$owner->city}}
                                </td>
                                <td>
                                    {{$owner->email}}
                                </td>
                                <td>
                                    {{$owner->phone_number}}
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary btn-sm select-owner"
                                            data-owner-id="{{$owner->id}}"
                                            data-owner-name="{{$owner->first_name}} {{$owner->last_name}}">
                                        Select
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('includes.select_script')
@stop
