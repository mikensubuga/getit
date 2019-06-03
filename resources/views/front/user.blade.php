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
<br><hr/>
<div class="row">


<div class="col-md-6">


<form method="post" action="{{ route('profile.update', $profile->id) }}" enctype="multipart/form-data">
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

            <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Upload</span>
                    </div>
                    <div class="custom-file">
                        <input type="file" name="profilePhoto" class="custom-file-input" id="fileInput" aria-describedby="fileInput">
                        <label class="custom-file-label" for="fileInput">Change Job Profile Banner</label>
                    </div>
                </div>
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
    <br><br><br><hr/>
    <form method="post" action="{{ route('account.update', $user->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('PUT') }}
        
        <div class="panel panel-default">
            <div class="panel-body">
                @if($user->avatar == null)
                    <img src="/storage/users/default.png" class="img-circle" height="120" width="120">
                @else
                <img src="{{asset('/storage/' . $user->avatar)}}"
                class="img-circle" height="100" width="100">
                @endif
                <h4 class=""><b>About {{ $user->name }}'s User Account</b></h4>
                <hr/>
    
                <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Upload</span>
                        </div>
                        <div class="custom-file">
                            <input type="file" name="profilePhoto" class="custom-file-input" id="fileInput" aria-describedby="fileInput">
                            <label class="custom-file-label" for="fileInput">Set User Account Profile</label>
                        </div>
                    </div>
                Name: <input class="form-control" name="name" value="{{ $user->name }}" disabled><br>
                Email <input class="form-control" name="email" value="{{ $user->email}}" disabled><br>
                Telephone Number: <input class="form-control" name="telNo" value="{{ $user->telNo }}">
                Address: <input class="form-control" name="address" value="{{ $user->address }}"><br>
                Password: <input class="form-control" type="password" name="password" value="">
                Password Confirmation: <input class="form-control" type="password" name="password2" value="">

                
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