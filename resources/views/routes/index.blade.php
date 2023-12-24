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
        <h1>Route Status</h1>
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
            <a href="{{ route('routes.create') }}">Add Route</a>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Bus Number</th>
                    <th>Source</th>
                    <th>Destination</th>
                    <th>Departure Date</th>
                    <th>Departure Time</th>
                    <th>Cost</th>
                    
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                <tr>
                    <td>{{ $route->id }}</td>
                    <td>{{ $route->bus->number }}</td>
                    <td>{{ $route->source }}</td>
                    <td>{{ $route->destination }}</td>
                    <td>{{ $route->departure_date }}</td>
                    <td>{{ $route->departure_time }}</td>
                    <td>{{ $route->cost }}</td>
                    <td>
                        <a href="{{ route('routes.edit', $route->id) }}">Edit</a>
                        <form action="{{ route('routes.destroy', $route->id) }}" method="post">
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

