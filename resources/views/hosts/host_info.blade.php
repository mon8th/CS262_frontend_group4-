@extends('layouts.app')

@section('title', 'Become a Host')

@section('content')
    <div class="container">
        <div class="text-center mt-5">
            <h2 class="mb-4">Become a Host</h2>
            <p class="mb-4">Fill in your details to complete your registration for the {{ ucfirst($package) }} Package.</p>

            <!-- Host Registration Form -->
            <form method="POST" action="{{ route('become.host.submit') }}" class="mt-4">
                @csrf
                <div class="form-group row">
                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                    <div class="col-md-6">
                        <input id="name" type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="package" class="col-md-4 col-form-label text-md-right">Selected Package</label>
                    <div class="col-md-6">
                        <input id="package" type="text" class="form-control" name="package" value="{{ ucfirst($package) }} Package - ${{ $package == 'basic' ? '10' : '20' }}/mo" readonly>
                    </div>
                </div>

                <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
