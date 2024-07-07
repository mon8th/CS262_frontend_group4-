@extends('layouts.app')

@section('title', 'Customers')

@section('content')
    <div class="container mt-5">
        @if($tickets->count() > 0)
            <h2 class="mb-4">Customers for {{ $tickets->first()->product->name }}</h2>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Ticket Code</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tickets as $ticket)
                        <tr>
                            <td>{{ $ticket->user->name }}</td>
                            <td>{{ $ticket->quantity }}</td>
                            <td>${{ number_format($ticket->total_price, 2) }}</td>
                            <td>{{ $ticket->booking_ticket_code }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-center">
                {{ $tickets->links('pagination::bootstrap-4') }}
            </div>
        @else
            <p>No customers have purchased this product yet.</p>
        @endif
    </div>
@endsection
