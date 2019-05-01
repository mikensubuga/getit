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
        </tr>
    @forelse($ordersd as $order)
        @if($order->delivered==1)
    <tr class="table-active">
       
        {{-- <td>{{$order->orderItems->user->name}}</td> --}}
    <td>{{$order->user->name}}     
        </td>
        <td>{{$order->total}}</td>
        
        <td>{{$order->created_at->diffForHumans()}}</td>
    </tr>
        @endif
    @empty
    You don't have any Sellings

    @endforelse
    </table>
    <button type="button" class="btn btn-primary"> Withdraw Funds</button>
@endsection