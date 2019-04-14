@extends('layouts.base')

@section('content')

<div class="well">
    <h3> My Orders </h3>
</div>
    <table class="table table-bordered">
        <tr class="info">
            <th>Job Description</th>
            <th>To be done by</th>
            <th>Price</th>
            <th>Delivery status</th>
            <th> Created at</th>
        </tr>
    @forelse($orders as $order)

    <tr class="active">
        {{-- <td>{{$order->jobProfile_id}}</td> --}}
        <td>{{$order->orderItems->details}}</td>
        <td>{{$order->orderItems->user->name}}</td>
        <td>{{$order->total}}</td>
        @if ($order->delivered == 0)
            <td> Not Delivered </td>
        @else
            <td> Delivered </td>
        @endif
        
        <td>{{$order->created_at->diffForHumans()}}</td>
    </tr>
    
    @empty
    You don't have any Orders

    @endforelse
    </table>
@endsection