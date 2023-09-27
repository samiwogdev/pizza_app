@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">Orders</li>
                    </ol>
                </nav> --}}
                <div class="card ">
                    <div class="card-header">Orders
                        <a style="float:right;" href="{{ route('frontpage') }}"><button class="bnt btn-secondary btn-sm" style="margin-left: 5px;">make order</button></a>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Date/Time</th>
                                    <th scope="col">Pizza</th>
                                    <th scope="col">S. pizza</th>
                                    <th scope="col">M. pizza</th>
                                    <th scope="col">L. pizza</th>
                                    <th scope="col">Total($)</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $key => $order)
                                <tr>
                                    <td>{{ __($key + 1 )}}</td>
                                    <td>{{ $order->date }}/{{ $order->time }}</td>
                                    <td>{{ $order->pizza->name }}</td>
                                    <td>{{ $order->small_pizza }}</td>
                                    <td>{{ $order->medium_pizza }}</td>
                                    <td>{{ $order->large_pizza }}</td>
                                    <td>{{ ($order->small_pizza * $order->pizza->small_pizza_price) +
                                           ($order->medium_pizza * $order->pizza->medium_pizza_price) +
                                           ($order->large_pizza * $order->pizza->large_pizza_price)
                                     }}</td>
                                    <td> {{ $order->description }}</td>
                                    <td>{{ $order->status}} </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
