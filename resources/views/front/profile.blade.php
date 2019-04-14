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
                @if(Auth::check())
                <div class="well">
                    <h4>Leave a Review:</h4>
                    {!! Form::open(['route' => 'reviews.store', 'method' => 'POST']) !!}
                    <div class="form-group">
                   
                        <input type="hidden" name="jobProfile_id" value="{{$profile->id}}">
                        <input type="hidden" name="rating" value="5">

                    {{Form::textarea('body','',['class' => 'form-control','rows'=>'3'])}}
                    </div>

                    {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                    {!! Form::close() !!}
                    {{-- <form role="form">
                        <div class="form-group">
                            <textarea class="form-control" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form> --}}
                </div>
                 @endif
                <hr>
                <div class="panel-body">
                    @if($reviews->count() > 0)
                        <ul class="list-group">
                            @foreach($reviews as $review)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <img src="{{asset('/storage/' . $review->photo)}}" class="img-circle center-block"
                                                 height="60" width="60">
                                        </div>
                                        <div class="col-md-10">
                                            <h4 class="media-heading">{{$review->author}}
                                                <small>{{$review->created_at->diffForHumans()}}</small>
                                            </h4>
                                            <p>{{ $review->body }}</p>
                                            {{-- Reply Section start --}}
                                            @forelse($review->replies as $reply)
                                            <div id="nested-comment" class="media">
                                                <a class="pull-left" href="#">
                                                        <img class="img-circle center-block" width = "64" height= "64" src="{{asset('/storage/' . $review->photo)}}" alt="">
                                                </a>
                                                <div class="media-body">
                                                    <h4 class="media-heading">Author
                                                        <small>5 mins ago</small>
                                                    </h4>
                                                           This the body
                                                </div>
                                                
                                            </div>
                                            @empty
                                            <br> No replies
                                            @endforelse
                                            {{-- Reply Section End --}}
                                            {{-- Reply Form Start Section --}}
                                            <br>
                                            <div class="comment-reply-container">
                                                <button class="toggle-reply btn btn-primary pull-right">Reply</button>
            
                                            <div class="comment-reply col-sm-6">
            
                                                {!! Form::open(['route' => 'replies.store', 'method' => 'POST']) !!}
                                                <div class="form-group">
                                               
                                                    <input type="hidden" name="review_id" value="{{$review->id}}">
                                                {{Form::textarea('body','',['class' => 'form-control','rows'=>'2'])}}
                                                </div>
                            
                                                {{ Form::submit('Submit', ['class'=>'btn btn-primary'])}}
                                                {!! Form::close() !!}
            
                                             </div>
                                        </div>
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
                                        <h4 class="modal-title">Order Details</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form method="POST" action="{{ route('order.store') }}">
                                            {{csrf_field()}}
                                           
                                            <input name="delivered" value="0" hidden>
                                            <input name="profile_id" value="{{ $profile->id }}" hidden>
                                            <input name="price" value="{{ $profile->price }}" hidden>

                                            <div class="form-group">
                                                <label for="Price">Price:</label>
                                                <input type="number" required name="price" class="form-control" value="{{ $profile->price }}" disabled>
                                            </div>
                                            <div class="form-group">
                                                <label for="Details">Details:</label>
                                            <input type="text" class="form-control input-sm" required name="details" rows ="5" class="form-control" value="{{$profile->details}}" disabled>
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
                    @if(Auth::check() && Auth::user()->name != $profile->user->name ) 
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
                        Order Now (UGX{{ $profile->price }})
                    </button>
                    @else

                    <!-- Trigger the modal with a button -->
                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#loginModal">
                            Order Now (UGX{{ $profile->price }})
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="loginModal" role="dialog">
                        <div class="modal-dialog">
                        
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <div class="modal-body">
                            <p>You need to Login to Order!.</p>
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                        
                        </div>
                    </div>
                    @endif
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
@section('scripts')
<script type="text/javascript">
    $(".comment-reply-container .toggle-reply").click(function(){
        $(this).next().slideToggle("slow");
    });
</script>
@endsection