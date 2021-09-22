@extends('layouts.main')

@section('content')
    
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Cities</h1>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Create new cities') }}
                            <a class="float-right" href="{{ route('cities.index')}}">Back</a>
                        </div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('cities.store') }}">
                                @csrf

                                <div class="form-group row">
                                    <label for="state_id" class="col-md-4 col-form-label text-md-right">{{ __(' State id') }}</label>
                                    <div class="col-md-6">
                                        <select name="state_id" class="form-control" aria-label="Default select example">
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name}}</option>
                                            @endforeach
                                        </select>

                                        @error('country_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                                            {{ __('Create') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection 

