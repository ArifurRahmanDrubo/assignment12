@extends('layouts.app')
@section('booking-index')
<div class="tiki-container">
    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
        });
    </script>
    @endif


<div class="tiki-indexcard">
    <div class="tiki-header">
        <h2>Booking Status</h2>
    </div>
    <span class="tiki-add-button">
        <a href="{{ route('bookings.create') }}">Add Booking</a>
    </span>
    <table class="tiki-table">
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Customer Name</th>
                <th>Customer Contact</th>
                <th>Bus Number</th>
                <th>Source</th>
                <th>Destination</th>
                <th>Seat Number</th>
                <th>Cost</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
            <tr>
                <td>{{ $booking->id }}</td>
                <td>{{ $booking->customer->name }}</td>
                <td>{{ $booking->customer->contact_number }}</td>
                <td>{{ $booking->number }}</td>
                <td>{{ $booking->source }}</td>
                <td>{{ $booking->destination }}</td>
                <td>{{ $booking->seat_number }}</td>
                <td>{{ $booking->cost }}</td>
                <td>
                    <a href="{{ route('bookings.edit', $booking->id) }}">Edit</a>
                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
