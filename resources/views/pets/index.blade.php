@extends('adminlte::page')

@section('title', 'Pet types')

@section('content_header')
    <h1> Pets </h1>
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
                        <a href="{{route('admin.pet.create')}}" class="btn btn-primary"> Create </a>
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
                                {{__('Name')}}
                            </th>
                            <th>
                                {{__('Birthdate')}}
                            </th>
                            <th>
                                {{__('Type')}}
                            </th>
                            <th>
                                {{__('Owner')}}
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pets as $pet)
                            <tr>
                                <td>
                                    {{$pet->id}}
                                </td>
                                <td>
                                    {{$pet->name}}
                                </td>
                                <td>
                                    {{$pet->birth_date}}
                                </td>
                                <td>
                                    {{$pet->type->name}}
                                </td>
                                <td>
                                    {{$pet->owner->first_name}} {{$pet->owner->last_name}}
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
@stop

@section('js')
@stop
