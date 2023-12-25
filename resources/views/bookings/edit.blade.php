@extends('layouts.app')
@section('booking-edit')
    
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
    <h1>Edit Booking</h1>
    <div class="tiki-card">
        
        <form method="post" action="{{ route('bookings.update', $booking->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="customer_id">Customer ID</label>
                <select id="customer_id" name="customer_id" class="tiki-form-control" required>
                    @foreach($customers as $customer)
                        <option value="{{ $customer->id }}" @if($customer->id == $booking->customer_id) selected @endif>{{ $customer->id }}</option>
                    @endforeach
                </select>
            </div>

            <div class="tiki-form-group">
                <label for="name">Customer Name</label>
                <input type="text" id="name" name="name" class="tiki-form-control" value="{{ $booking->customer->name }}" readonly>
            </div>

            <div class="tiki-form-group">
                <label for="contact_number">Contact Number</label>
                <input type="text" id="contact_number" name="contact_number" class="tiki-form-control" value="{{ $booking->customer->contact_number }}" readonly>
            </div>

            <label for="bus_number">Bus Number:</label>
            <select name="bus_number" id="bus_number" class="tiki-form-control" required>
                @foreach($buses as $bus)
                    <option value="{{ $bus->number }}" @if($bus->number == $booking->number) selected @endif>{{ $bus->number }}</option>
                @endforeach
            </select>
            <br>

            <label for="source">Source:</label>
            <select name="source" id="source" class="tiki-form-control" required>
                <option value="{{ $booking->source }}" selected>{{ $booking->source }}</option>
                <!-- Sources will be dynamically populated using JavaScript -->
            </select>
            <br>

            <label for="destination">Destination:</label>
            <select name="destination" id="destination" class="tiki-form-control" required>
                <option value="{{ $booking->destination }}" selected>{{ $booking->destination }}</option>
                <!-- Destinations will be dynamically populated using JavaScript -->
            </select>
            <br>

            <label for="seat_id">Seat Number:</label>
            <select name="seat_id" id="seat_id" class="tiki-form-control" required>
                <option value="{{ $booking->seat_id }}" selected>{{ $booking->seat_number }}</option>
                <!-- Seats will be dynamically populated using JavaScript -->
            </select>

            <div class="tiki-form-group">
                <label for="cost">Cost:</label>
                <input type="text" name="cost" id="cost" class="tiki-form-control" value="{{ $booking->cost }}" readonly>
            </div>

            <button type="submit" class="btn tiki-btn-primary">Update</button>
        </form>
    </div>
</div>

<script>
    // Fetch customer info when selecting a customer
    document.getElementById('customer_id').addEventListener('change', function() {
        var customerId = this.value;

        fetch('/bookings/get-customer-info/' + customerId)
            .then(response => response.json())
            .then(data => {
                document.getElementById('name').value = data.name;
                document.getElementById('contact_number').value = data.contact_number;
            });
    });

    // Fetch seat suggestions based on bus, source, and destination
    document.addEventListener('DOMContentLoaded', function () {
        var busNumberInput = document.getElementById('bus_number');
        var sourceSelect = document.getElementById('source');
        var destinationSelect = document.getElementById('destination');
        var seatSelect = document.getElementById('seat_id');
        var costInput = document.getElementById('cost');

        busNumberInput.addEventListener('change', function () {
            var busNumber = busNumberInput.value;

            fetch('/bookings/get-suggestions/' + busNumber)
                .then(response => response.json())
                .then(data => {
                    // Populate source dropdown
                    sourceSelect.innerHTML = '';
                    data.sources.forEach(function (value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.text = value;
                        sourceSelect.appendChild(option);
                    });

                    // Populate destination dropdown
                    destinationSelect.innerHTML = '';
                    data.destinations.forEach(function (value) {
                        var option = document.createElement('option');
                        option.value = value;
                        option.text = value;
                        destinationSelect.appendChild(option);
                    });

                    // Populate seat dropdown
                    seatSelect.innerHTML = '';
                    data.seats.forEach(function (value) {
                        var option = document.createElement('option');
                        option.value = value.id;
                        option.text = value.seat_number;
                        seatSelect.appendChild(option);
                    });

                });
        });

        // Trigger change event initially to fetch suggestions for the default bus number
        busNumberInput.dispatchEvent(new Event('change'));
    });

    // Add a change event listener for the source and destination selects to calculate the cost
    document.getElementById('source').addEventListener('change', calculateCost);
    document.getElementById('destination').addEventListener('change', calculateCost);

    function calculateCost() {
        var busNumber = document.getElementById('bus_number').value;
        var source = document.getElementById('source').value;
        var destination = document.getElementById('destination').value;

        // Fetch the cost based on the selected bus number, source, and destination
        fetch(`/bookings/calculate-cost/${busNumber}/${source}/${destination}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('cost').value = data.cost;
            })
            .catch(error => {
                console.error('Error calculating cost:', error);
                alert('Error calculating cost');
            });
    }
</script>
@endsection