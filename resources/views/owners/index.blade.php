@extends('adminlte::page')

@section('title', 'Owners')

@section('content_header')
    <h1> Owners </h1>
@stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    @if(session()->has('success'))
                        <div class="alert alert-success">
                            {{ session()->get('success') }}
                        </div>
                    @endif
                    <div class="d-flex justify-content-end">
                        <a href="{{route('admin.owner.create')}}" class="btn btn-primary"> Create </a>
                    </div>
                </div>
                <div class="card-body p-0">
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
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
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
