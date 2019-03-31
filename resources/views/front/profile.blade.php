@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-body">
                    <h3>{{$profile->user->name}}</h3><br>
                    <hr/>
                    <img style="width: 100%" src="{{asset('/storage/' . $profile->profilePhoto)}}"
                         class="img-responsive center-block">
                </div>
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>About {{$profile->user->name}}</h4>
                </div>
                <div class="panel-body">
                    <p>{{ $profile->details }}</p>
                    
                </div>
            </div>
             <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>Reviews</h4>
                </div>
                <div class="panel-body">
                    @if($reviews->count() > 0)
                        <ul class="list-group">
                            @foreach($reviews as $review)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="" class="img-circle center-block"
                                                 height="60" width="60">
                                        </div>
                                        <div class="col-md-10">
                                            <h5>username</h5>
                                            <p>{{ $review->body }}</p>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3>No review yet</h3>
                    @endif
                </div>
            </div> 
        </div>
        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">
                @if(Auth::check())
                    <!-- Modal -->
                        <div id="myModal" class="modal fade" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                <div class="modal-content">
                                    <div class="modal-header" style="background-color: #1b6d85; color: white">
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        <h4 class="modal-title">Modal Header</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="">
                                            {{csrf_field()}}
                                            <input name="gig_id" value="" hidden>
                                            <input name="to_user_id" value="" hidden>
                                            <div class="form-group">
                                                <label for="email">Price:</label>
                                                <input type="number" required name="price" min="5" max="5000" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Total days:</label>
                                                <input type="number" required name="days" min="1" max="30" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-success btn-block">
                                                Order Now
                                            </button>
                                        </form>
                                    </div>
                                    {{--<div class="modal-footer">--}}
                                        {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close--}}
                                        {{--</button>--}}
                                    {{--</div>--}}
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                            Order Now (${{ $profile->price }})
                        </button>
                    @else
                        You need to login to order this gig!
                    @endif

                    <div style="margin-top: 30px">
                        @if($profile->user->avatar == null)
                            <img src="/storage/users/default.png" class="img-circle center-block" height="100" width="100">
                        @else
                            <img src="{{asset('/storage/' . $profile->user->avatar)}}"
                                 class="img-circle center-block" height="100" width="100">
                        @endif
                    </div>
                    <a href="">
                        <h4 class="text-center">{{ $profile->user->name }}</h4>
                    </a>
                    {{--<hr/>--}}
                    {{--{% if gig.user.profile.about %}--}}
                    {{--<p>{{ gig.user.profile.about }}</p>--}}
                    {{--{% else %}--}}
                    {{--<p>New seller</p>--}}
                    {{--{% endif %}--}}
                </div>
            </div>
        </div>
    </div>

@endsection