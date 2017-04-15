<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/" style="color: cornflowerblue">ITBookStore</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-book icon" aria-hidden="true"></i> Categories
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>
            <form class="navbar-form navbar-left hidden-sm">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search books">
                </div>
                <button type="submit" class="btn btn-default">Submit</button>
            </form>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">
                        <i class="fa fa-shopping-cart icon" aria-hidden="true"></i> Shopping cart
                    </a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        @if(Auth::check())
                            {{Auth::user()->username}}
                        @else
                            <i class="fa fa-user icon" aria-hidden="true"></i> Profile
                        @endif
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @if(Auth::check())
                            <li>
                                <a href="#"><i class="fa fa-user icon" aria-hidden="true"></i> Profile</a>
                            </li>
                            @foreach(auth()->user()->roles as $role)
                                @if($role->name == 'admin')
                                    <li>
                                        <a href="#"><i class="fa fa-book icon" aria-hidden="true"></i> Books</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-list-ul icon" aria-hidden="true"></i> Categories</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-user-circle icon" aria-hidden="true"></i> Authors</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-users icon" aria-hidden="true"></i> Users</a>
                                    </li>
                                    <li role="separator" class="divider"></li>
                                    <li>
                                        <a href=""><i class="fa fa-list-ol icon" aria-hidden="true"></i> Orders</a>
                                    </li>
                                @else
                                    <li>
                                        <a href=""><i class="fa fa-list-ol icon" aria-hidden="true"></i> Your Orders</a>
                                    </li>
                                @endif
                            @endforeach
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('logout')}}">
                                    <i class="fa fa-sign-out icon" aria-hidden="true"></i> Logout</a></li>
                        @else
                            <li><a href="{{route('getSignIn')}}">
                                    <i class="fa fa-sign-in icon" aria-hidden="true"></i> Login
                                </a></li>
                            <li><a href="{{route('getSignUp')}}">
                                    <i class="fa fa-user-plus icon" aria-hidden="true"></i> Register
                                </a></li>
                        @endif
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>