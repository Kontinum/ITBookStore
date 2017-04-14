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
                    <button type="submit" class="btn btn-primary pull-right">Login</button>
                </div>
            </form>
        </div>
    </div>
@endsection