<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>
        @yield('title')
    </title>
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,400i,700" rel="stylesheet">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Font Awesome CDN -->
    <script src="https://use.fontawesome.com/ddc4ec2a27.js"></script>
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{url()->to('css/styles.css')}}">
    @yield('styles')
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- jQuery CDN -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <!-- Bootstrap JS CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Custom scripts -->
    <script src="{{url()->to('js/scripts.js')}}"></script>
    @yield('scripts')
</body>
</html>