@extends('layouts.master')

@section('title')
    Change password
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <h2><i class="fa fa-key icon" aria-hidden="true"></i> <em class="search-count"> {{auth()->user()->username}}</em> change password</h2>
            <hr style="background-color: cornflowerblue;margin-top: 0" class="col-lg-12">
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2">
            <form action="{{route('postChangePassword')}}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="old_password">Old password:<span class="required">*</span></label>
                    <input type="password" id="old_password" name="old_password" class="form-control" placeholder="Old password" required>
                </div>
                <div class="form-group">
                    <label for="new_password">New password:<span class="required">*</span></label>
                    <input type="password" id="new_password" name="new_password" class="form-control" placeholder="New password - minimum 6 characters" required>
                </div>
                <div class="form-group">
                    <label for="new_password_again">New password:<span class="required">*</span></label>
                    <input type="password" id="new_password_again" name="new_password_again" class="form-control" placeholder="Repeat new password" required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Change password</button>
                </div>
            </form>
        </div>
    </div>
@endsection