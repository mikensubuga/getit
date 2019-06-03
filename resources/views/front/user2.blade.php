@extends('layouts.base')

@section('content')

    

<div class="card">
        <div class="card-header">My Profile </div>
    </div>
<div class="row">
    <div class="col-sm-12">
            <div class="jumbotron text-center">
                    <h3>Hello {{$user->name}}, Welcome to Get It Done  </h3>
                    <h4><b>Go to My Profile page first to create a new Job Profile</b></h4>
            </div>
    </div>
   
</div>




@endsection

{{-- {{$user}}
{{$profile}} --}}