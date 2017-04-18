@extends('layouts.master')

@section('title')
    Users panel
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <p>Users: <i class="search-count">{{count($users)}}</i></p>
            <hr>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    Add new user
                </div>
                <div class="panel-body">
                    <form action="{{route('addUser')}}" method="post">
                        {{csrf_field()}}
                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="username">Username:<span class="required">*</span></label>
                            <input type="text" id="username" name="username" value="{{old('username')}}" class="form-control" placeholder="5-20 characters" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="password">Password:<span class="required">*</span></label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Minimum 6 characters" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="name">Name:<span class="required">*</span></label>
                            <input type="text" id="name" name="name" value="{{old('name')}}" class="form-control" placeholder="5-50 characters" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="email">Email:<span class="required">*</span></label>
                            <input type="email" id="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Valid email address" required>
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" value="{{old('address')}}" class="form-control" placeholder="Valid address for shipping">
                        </div>
                        <div class="form-group col-lg-4 col-md-6 col-sm-6">
                            <label for="phone">Phone:</label>
                            <input type="text" id="phone" name="phone" value="{{old('phone')}}" class="form-control" placeholder="Your phone number">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Add user</button>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
        </div>
        <div class="col-lg-12">
            <ul class="list-group">
                @foreach($users as $user)
                    <li class="list-group-item list-group-item-success col-lg-3 col-md-4 col-sm-6">
                        {{$user->username}}
                        <a href="{{route('deleteUser',['userId' => $user->id])}}" class="pull-right list-icon" title="Delete user">
                            <i class="fa fa-trash icon" aria-hidden="true"></i>
                        </a>
                        @foreach($user->roles as $role)
                            @if($role->name == 'regular')
                                <a href="{{route('promoteToAdmin',['userId' => $user->id])}}" class="pull-right" title="Promote to admin">
                                    <i class="fa fa-hand-o-up icon" aria-hidden="true"></i>
                                </a>
                            @else
                                <a href="{{route('backToRegular',['userId' => $user->id])}}" class="pull-right" title="Back to regular">
                                    <i class="fa fa-hand-o-down icon" aria-hidden="true"></i>
                                </a>
                            @endif
                        @endforeach
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection