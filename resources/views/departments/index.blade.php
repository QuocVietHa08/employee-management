@extends('layouts.main')

@section('content')
    
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Departments</h1>
        </div>
        <div>
            @if( session()->has('message'))
                <div class="alert alert-success">
                    {{session('message')}}
                </div>
            @endif
                </div>
        <div class="row">
            <div class="card mx-auto">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <form method="GET" action="{{ route('departments.index') }}">
                                <div class="form-row align-items-center">
                                    <div class="col">
                                        <input type="text" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search.." />
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary mb-2">Search</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    <div class="btn">
                    <a  class="float-right"  href="{{ route('departments.create') }}">Create</a>
                    </div>
                    </div>
                </div>
                <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">#Id</th>
                        <th scope="col">Name</th>
                        <th>Manage</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($departments as $department)
                        <tr>
                            <th scope="row">{{ $department->id }}</th>
                            <th>{{ $department->name}}</th>
                            <th>
                                <a href=" {{ route('departments.edit', $department->id) }}" class="btn btn-success" >Edit </a>
                            </th>
                        </tr>
                        @endforeach
                    </tbody>  
                  </table>
             </div>
            </div>
        </div>
@endsection 

