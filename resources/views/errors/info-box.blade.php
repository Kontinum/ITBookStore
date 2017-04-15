<div class="row">
    <div class="col-lg-8 col-lg-offset-2 text-center">
        @if(count($errors) > 0)
            <div class="info-box alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </div>
        @endif
        @if(session()->has('error'))
            <div class="info-box alert alert-danger">
                {{session()->get('error')}}
            </div>
        @endif
        @if(session()->has('success'))
            <div class="info-box alert alert-success">
                {{session()->get('success')}}
            </div>
        @endif
    </div>
</div>