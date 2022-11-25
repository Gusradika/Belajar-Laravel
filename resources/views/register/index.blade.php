@extends('layouts/main')

@section('container')
    <div class="row justify-content-center">
        <div class="col-lg-5 ">
            <main class="form-registration w-100 m-auto">

                {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
                <h1 class="h3 mb-3 fw-normal text-center">Registration Form</h1>

                <form action="/register" method="post">
                    @csrf

                    <div class="form-floating">
                        <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror"
                            name="name" id="name" placeholder="Name" required value="{{ old('name') }}">
                        <label for="name">Name</label>

                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                            id="Username" placeholder="Username" required value="{{ old('username') }}">
                        <label for="Username">Username</label>

                        @error('username')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                            id="Email" placeholder="Email" required value="{{ old('email') }}">
                        <label for="Email">Email</label>

                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-floating">
                        <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror"
                            name="password" id="floatingPassword" placeholder="Password" required>
                        <label for="floatingPassword">Password</label>

                        @error('password')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit" name="submit">Register</button>

                </form>
                <small class="d-block text-center mt-3">Already have an Account? <a href="/login">Login
                        Now!</a></small>
            </main>
        </div>
    </div>
@endsection
