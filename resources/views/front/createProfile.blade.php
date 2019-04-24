@extends('layouts.base')

@section('content')

<div class="row">
    <div class="col-lg-8">

        <div class="card">
            <div class="card-header">
                    Create a Job Profile
            </div>
            <div class="card-body">
                <p class="card-text">
                Hello {{$user->name}}, Welcome to Get It, a job management portal, you can now start creating your Profile!
              </p>
            </div>
              
    
        </div><br>
         <div class="card">

    <form class="border border-light p-5" method="POST"  action="{{ route('profile.store',$user->id) }}" enctype="multipart/form-data">
        @csrf
    <p class="h4 mb-4 text-center">Create Job Profile</p>

    <label for="textarea">Profile Description</label>
    <textarea id="textarea" name ="details" class="form-control mb-4" placeholder="I can do ....."></textarea>

    <div class="input-group mb-4">
        <div class="input-group-prepend">
            <span class="input-group-text">Upload</span>
        </div>
        <div class="custom-file">
            <input type="file" name="profilePhoto" class="custom-file-input" id="fileInput" aria-describedby="fileInput">
            <label class="custom-file-label" for="fileInput">Job Profile Banner</label>
        </div>
    </div>

    <label for="select">Category</label>
    <select class="browser-default custom-select mb-4" name="category" id="select">
        <option value="" disabled="" selected="">Choose your option</option>
        @foreach($categories as $category)
    <option value="{{$category->id}}">{{$category->name}}</option>
        @endforeach
       
    </select>

    <label for="textInput">Price: (UGX)</label>
    <input type="text"  name ="price" id="textInput" class="form-control mb-4" placeholder="0.00">
<input type="hidden" name="user_id" id="textInput" class="form-control mb-4" value="{{$user->id}}">


    <button class="btn btn-info btn-block my-4" type="submit">Create</button>

    
</form>
    </div>

    </div>
    
  
  
</div>

   
@endsection
