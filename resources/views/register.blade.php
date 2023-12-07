@extends('master')

@section('content')
    <div style="height: 80vh;" class="d-flex justify-content-center align-items-center">
        <div class="col-md-6 col-lg-5">
            <div class="bg-light p-4 p-md-5 border border-info rounded border-1">
                <h3 class="text-center mb-4">Register</h3>
                <form action="{{ route('auth.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                            required>
                            @if ($errors->has('name'))
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                        @endif

                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email"
                            required aria-describedby="emailHelp">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
                        @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif

                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" required
                            id="password">
                            @if ($errors->has('password'))
                            <span class="text-danger">{{ $errors->first('password') }}</span>
                        @endif

                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Password confirm</label>
                        <input type="password" name="password_confirmation" type="password @error('password_confirmation') is-invalid @enderror" class="form-control" required
                            id="password_confirmation">
                            @if ($errors->has('password_confirmation'))
                            <span class="text-danger">{{ $errors->first('password_confirmation') }}</span>
                        @endif

                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
