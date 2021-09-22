@extends('layouts.main')

@section('content')
    
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> City</h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            {{ __('Update city') }}
                            <a href="{{ route('cities.index') }}" class="float-right">Back</a>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('cities.update', $city->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="form-group row">
                                    <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __('State id') }} 

                                    </label>
                                    <div class="col-md-6">
                                        <select class="form-control" name="state_id" aria-label="Default select example">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id}}" {{ $state->id == $city->state_id? 'selected' : ''}}   >{{ $state->name }} </option>
                                            @endforeach
                                        </select>

                                        @error('state_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $state->name)}}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="m-2 p-2">
                    <form method="POST"  action="{{ route('cities.destroy', $city->id) }}">
                        @csrf
                        @method('Delete')
                        <button class="btn-danger btn">Delete {{ $city->name}}</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
@endsection 

