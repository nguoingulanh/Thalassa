@if(Session::has('error'))
    <p class="alert alert-danger text-center">{{Session::get('error')}}</p>
@endif

@foreach($errors->all() as $error)
    <p class="alert alert-danger text-center">{{$error}}</p>
@endforeach
