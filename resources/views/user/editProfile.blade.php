@extends('layouts.master')

@section('title')
    Edit profile
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><i class="fa fa-pencil-square-o icon" aria-hidden="true"></i> <em class="search-count"> {{auth()->user()->username}}</em> edit profile</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form action="{{route('postEditProfile')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="username">Username:<span class="required">*</span></label>
                    <input type="text" id="username" name="username" value="{{auth()->user()->username}}" class="form-control" placeholder="5-20 characters" required>
                </div>
                <div class="form-group">
                    <label for="name">Name:<span class="required">*</span></label>
                    <input type="text" id="name" name="name" value="{{auth()->user()->name}}" class="form-control" placeholder="5-50 characters" required>
                </div>
                <div class="form-group">
                    <label for="email">Email:<span class="required">*</span></label>
                    <input type="email" id="email" name="email" value="{{auth()->user()->email}}" class="form-control" placeholder="Valid email address" required>
                </div>
                <div class="form-group">
                    <label for="address">Address:</label>
                    <input type="text" id="address" name="address" value="{{auth()->user()->address}}" class="form-control" placeholder="Valid address for shipping">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" id="phone" name="phone" value="{{auth()->user()->phone}}" class="form-control" placeholder="Your phone number">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection

