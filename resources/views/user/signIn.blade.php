@extends('layouts.master')

@section('title')
    Sign In
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Please fill out all fields to login</p>
            <form action="{{route('postSignIn')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value="{{old('password')}}" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="remember_me">
                        <input type="checkbox" id="remember_me" name="remember_me"> Remember me
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                </div>
            </form>
            <br><hr>
            Dont have an account? <a href="{{route('getSignUp')}}">Register</a>
        </div>
    </div>
@endsection