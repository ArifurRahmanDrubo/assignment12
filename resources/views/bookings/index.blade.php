<!-- resources/views/buses/index.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buses</title>
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
            background-color: #fff;
            padding: 2rem;
           
            border-radius: 5px;
        }

        .add-button a {
            text-decoration: none;
            background-color: #df78c5;;
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 5px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        .table th {
            background-color: #df78c5;
            color: white;
        }

        .table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table a {
            text-decoration: none;
            margin-right: 10px;
            color: #333;
        }

        .icon {
            font-size: 16px;
        }
    </style>
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <header>
        <h1>Booking Status</h1>
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

        <div class="add-button">
            <a href="{{ route('bookings.create') }}">Add Booking</a>
        </div>

        <table class="table">
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
                    <td>{{ $booking->bus->number }}</td>
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

</body>

</html>
