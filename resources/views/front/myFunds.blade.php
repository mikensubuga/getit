

@extends('layouts.base')

@section('content')

<div class="card-header">
    <h3> My Funds </h3>
</div>
    <table class="table table-hover">
        <tr class="table-info">
           
            <th>Client was</th>
            <th>Price</th>
            <th> Created at</th>
            <th> Delivery Status</th>
            <th> </th>
        </tr>
        
    @forelse($ordersd as $order)
    <tr class="table-active">
       
        {{-- <td>{{$order->orderItems->user->name}}</td> --}}
    <td>{{$order->user->name}}     
        </td>
        <td>{{$order->total}}</td>
        
        <td>{{$order->created_at->diffForHumans()}}</td>

        @if ($order->delivered == 0)
            <td> Not Delivered </td>
        @else
            <td> Delivered </td>
        @endif

        <td> 
            @if($order->delivered == 1)
            <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal">
                Withdraw Funds</button>
                @else
                <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#myModal" disabled>
                        Withdraw Funds</button>
                @endif
        </td>





        
    </tr>
     
    @empty
    You don't have any Sellings

    @endforelse
    </table>
    
    
        
   




       <!-- Modal -->
       <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background-color: #1b6d85; color: white">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Withdraw Details</h4>
                </div>
                <div class="modal-body">
                  

                    
                    <form method="POST" action="{{ route('funds.withdraw') }}">
                        {{csrf_field()}}
                       
                        <div class="form-group">
                            <label for="Number">Amount:</label>
                            <input type="number" required name="amount" class="form-control" value="{{$order->total}}">
                        </div>
                        <div class="form-group">
                            <label for="Number">Mobile Money Number:</label>
                            <input type="number" required name="mmnumber" class="form-control" value="256">
                        </div>

                        <button type="submit" class="btn btn-success btn-block">
                            Order Now
                        </button>
                        <button type="button" class="btn btn-primary btn-lg" data-dismiss="modal">
                                Cancel
                            </button>
                    </form>
                
                </div>

            </div>
        </div>
    </div>
   
@endsection