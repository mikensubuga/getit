@extends('layouts.base')

@section('content')

<div class="card-header">
    <h3> My Jobs </h3>
</div>
    <table class="table table-hover">
        <tr class="table-info">
           
            <th>Requested By</th>
            <th>Price</th>
            <th> Created at</th>
        </tr>
    @forelse($ordersd as $order)

    <tr class="table-active">
       
        {{-- <td>{{$order->orderItems->user->name}}</td> --}}
    <td>{{$order->user->name}}     <button type="button" class="btn btn-success btn-md" href ="{{route('chat')}}"> Message</button>
        </td>
        <td>{{$order->total}}</td>
        
        <td>{{$order->created_at->diffForHumans()}}</td>
    </tr>
    
    @empty
    You don't have any Sellings

    @endforelse
    </table>
    <button type="button" class="btn btn-primary"> Withdraw Funds</button>
@endsection