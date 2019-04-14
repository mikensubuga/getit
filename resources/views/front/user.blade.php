@extends('layouts.base')

@section('content')
<div class="well">  
    <h4>My Profile </h4>
</div>

<div class="row">
    <div class="col-sm-8">
            <div class="jumbotron text-center">
                    <h4><b>{{ $profile->details }}</b></h4>
            </div>
    </div>
    <div class="col-sm-4">
        <div class="panel-heading">
           <h5> Job Profile Photo</h5>
        </div>
            <a> <img src="{{asset('/storage/' . $profile->profilePhoto)}}" height="200" width="345"> </a>
    </div>
   
</div>
<form method="post" action="{{ route('profile.update', $profile->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    
    <div class="panel panel-default">
        <div class="panel-body">
            @if($profile->user->avatar == null)
                <img src="/storage/users/default.png" class="img-circle" height="120" width="120">
            @else
            <img src="{{asset('/storage/' . $profile->user->avatar)}}"
            class="img-circle center-block" height="100" width="100">
            @endif
            <h3 class="text-uppercase"><b>About {{ $profile->user->name }}</b></h3>
            <hr/>

            @if($profile->details)
            Profile Details:    <input class="form-control" name="details" value="{{ $profile->details }}"><br>
            Price: <input class="form-control" name="price" value="{{ $profile->price }}">

            @else
                Profile Details <input class="form-control" name="details" placeholder="Enter you profile information"><br>
               Profile Details <input class="form-control" name="price" placeholder="Enter your price">

            @endif
            <br/>
            <button class="btn btn-success" type="submit">Update</button>
        </div>
    </div>
</form>

@endsection()

{{-- {{$user}}
{{$profile}} --}}