@extends('layouts.base')

@section('content')

<div class="card">
        <div class="card-header">My Profile </div>
<div class="row">
    <div class="col-sm-8">
            
                    <p>{{ $profile->longDesc }}</p>
            
    </div>
    <div class="col-sm-4">
        
            <a> <img  class="card-img " src="{{asset('/storage/' . $profile->profilePhoto)}}" height="200" width="345"> </a>
    </div>
   
</div>
</div>

<div class="row">


<div class="col-md-6">


<form method="post" action="{{ route('profile.update', $profile->id) }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    
    <div class="panel panel-default">
        <div class="panel-body">
            @if($profile->profilePhoto == null)
            No Photo! Please Set a Photo
            @else
            <img src="{{asset('/storage/' . $profile->profilePhoto)}}"
            class="" height="200" width="345">
            @endif
            <h4 class=""><b>About {{ $profile->user->name }}'s Job Profile</b></h4>
            <hr/>

           
            Short Profile Description:    <input class="form-control" name="shortDesc" value="{{ $profile->shortDesc }}"><br>
            Long Profile Description:    <input class="form-control" name="longDesc" value="{{ $profile->longDesc }}"><br>
            Unit Price of Service: <input class="form-control" name="price" value="{{ $profile->price }}">

            
            <br/>
            <button class="btn btn-success" type="submit">Update your Job Profile</button>
        </div>
    </div>
</form>
</div>
<div class="col-md-6">
    <form method="post" action="{{ route('account.update', $user->id) }}">
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
                <h4 class=""><b>About {{ $profile->user->name }}'s User Account</b></h4>
                <hr/>
    
               
                Name: <input class="form-control" name="name" value="{{ $user->name }}"><br>
                Email <input class="form-control" name="email" value="{{ $user->email}}" disabled><br>
                Telephone Number: <input class="form-control" name="telNo" value="{{ $user->telNo }}">
                Address: <input class="form-control" name="address" value="{{ $user->address }}"><br>

                
                <br/>
                <button class="btn btn-success" type="submit">Update User Profile</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection

{{-- {{$user}}
{{$profile}} --}}