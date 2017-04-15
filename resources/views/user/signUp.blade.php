@extends('layouts.master')

@section('title')
    Sign Up
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Please fill out all fields to register</p>
            <form action="{{route('postSignUp')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username">Username:<span class="required">*</span></label>
                    <input type="text" id="username" name="username" value="{{old('username')}}" class="form-control" placeholder="5-20 characters" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:<span class="required">*</span></label>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 6 characters" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:<span class="required">*</span></label>
                    <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="5-50 characters" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:<span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Valid email address" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control" placeholder="Valid address for shipping">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Your phone number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection