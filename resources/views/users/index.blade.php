@extends('adminlte::page')

@section('title', 'Users')

@section('content_header')
    <h1> Users </h1>
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
                        <a href="{{route('admin.user.create')}}" class="btn btn-primary"> Create </a>
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
                                {{__('name')}}
                            </th>
                            <th>
                                {{__('email')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>
                                    {{$user->id}}
                                </td>
                                <td>
                                    {{$user->name}}
                                </td>
                                <td>
                                    {{$user->email}}
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
