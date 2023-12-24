<!-- resources/views/bookings/create.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bus</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}"> <!-- Include your CSS file -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
           
            padding: 1rem;
            text-align: center;
        }

        .container {
            width: 80%;
            margin: 2rem auto;
            display: flex;
            justify-content: space-around;
        }

        .card {
            width: 40%;
            background-color: #fff;
            padding: 2rem;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
        }

        .form-control {
            width: 100%;
            padding: 0.5rem;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #df78c5;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .btn-secondary {
            background-color: #333;
            color: white;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <header>
       
    </header>

    <div class="container">
        @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
            });
        </script>
        @endif
        <div class="card">
        <h1>Create Booking</h1>
   
    <form method="post" action="{{ route('bookings.store') }}">
        @csrf

        <div class="form-group">
            <label for="customer_id">Customer ID</label>
            <select id="customer_id" name="customer_id" class="form-control" required>
                @foreach($customers as $customer)
                    <option value="{{ $customer->id }}">{{ $customer->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="name">Customer Name</label>
            <input type="text" id="name" name="name" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="contact_number">Contact Number</label>
            <input type="text" id="contact_number" name="contact_number" class="form-control" readonly>
        </div>
        <label for="number">Bus Number:</label>
        <select name="number" id="number" class="form-control" required>
            @foreach($buses as $bus)
                <option value="{{ $bus->number }}">{{ $bus->number }}</option>
            @endforeach
        </select>
        <br>

        <label for="source">Source:</label>
        <select name="source" id="source" class="form-control" required>
           
        </select>
        <br>

        <label for="destination">Destination:</label>
        <select name="destination" id="destination" class="form-control" required>
            
        </select>
        <br>

        <label for="seat_number">Seat Number:</label>
        <select name="seat_number" id="seat_number" class="form-control" required>
           
        </select>

        <div class="form-group">
            <label for="cost">Cost:</label>
           <input type="text" name="cost" id="cost" class="form-control" readonly>
        </div>
        <!-- Add other input fields for bus, source, destination, seat, and cost -->

        <button type="submit" class="btn btn-primary">Submit</button>
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
            var busNumberInput = document.getElementById('number');
            var sourceSelect = document.getElementById('source');
            var destinationSelect = document.getElementById('destination');
            var seatSelect = document.getElementById('seat_number');
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

                        
                    })
                    
            });

            // Trigger change event initially to fetch suggestions for the default bus number
           
        });
        
      

        // Add a change event listener for the source and destination selects to calculate the cost
        document.getElementById('source').addEventListener('change', calculateCost);
        document.getElementById('destination').addEventListener('change', calculateCost);

        function calculateCost() {
            var busNumber = document.getElementById('number').value;
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
</body>

</html>


