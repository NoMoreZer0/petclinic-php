@extends('adminlte::page')

@section('title', 'Pet types')

@section('content_header')
    <h1> Types </h1>
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
                        <a href="{{route('admin.type.create')}}" class="btn btn-primary"> Create </a>
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
                                {{__('color')}}
                            </th>
                            <th>

                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($types as $type)
                            <tr>
                                <td>
                                    {{$type->id}}
                                </td>
                                <td>
                                    {{$type->name}}
                                </td>
                                <td>
                                    {{$type->color}}
                                </td>
                                <td>
                                    @include('includes.delete_button', ['route' => 'admin.type.destroy', 'item_id' => $type->id])
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
