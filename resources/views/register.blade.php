@extends('layout.base')

@section('main')
    <div class="container mt-4">
        <form action="{{ route('registersubmit') }}" method="POST" class="form mt-4 m-auto d-block col-10 mt-5">
            @csrf
            <div class="mb-3 ">
                <label for="name" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Please Enter Name">
                </div>
            </div>
            <div class="mb-3 ">
                <div class="mb-3 ">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Please Enter Email">
                    </div>
                </div>
                <div class="mb-3 ">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Password" id="password" name="password">
                    </div>
                </div>
                <div class="mb-3 ">
                    <label for="password_confirmation" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" placeholder="Password" id="password_confirmation"
                            name="password_confirmation">
                    </div>
                </div>
                <div class="row d-flex">
                    <div class="mb-3 col-1 ">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                    <div class="mb-3 col-1">
                        <a class="btn btn-primary" href="{{ route('login') }}">Login</a>
                    </div>
                </div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger" role="alert">
                            {{ $error }}
                        </div>
                    @endforeach
                @endif

        </form>
    </div>
@endsection
