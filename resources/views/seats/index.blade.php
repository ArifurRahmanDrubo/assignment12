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
            <a href="{{ route('seats.create') }}">Add Seats</a>
        </div>
        <h2>Seat Arrangement</h2>

        <form action="{{ route('seats.index') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="bus_number" class="form-label">Enter Bus Number:</label>
                <input type="text" class="form-control" id="bus_number" name="bus_number" required>
            </div>
            <button type="submit" class="btn btn-primary">Show Seats</button>
        </form>

        @if(isset($bus) && isset($maxSeats) && isset($seats))
            <h3>Seats for Bus Number: {{ $bus->number }}</h3>
            <p>Total Seats: {{ $maxSeats }}</p>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Seat Number</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($seats as $seat)
                        <tr>
                            <td>{{ $seat->seat_number }}</td>
                            <td>{{ $seat->status }}</td>
                            <td>
                                <a href="{{ route('seats.edit', $seat->id) }}">Edit</a>
                                <form action="{{ route('routes.destroy', $seat->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>

</body>

</html>