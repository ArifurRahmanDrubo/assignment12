<!-- resources/views/buses/edit.blade.php -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bus</title>
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
        <h2>Edit Seats</h2>
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
            <form action="{{ route('seats.update', $seat->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="bus_id">Bus:</label>
         <select name="bus_id" class="form-control" required>
        @foreach ($buses as $bus)
            <option value="{{ $bus->id }}" {{ $seat->bus_id == $bus->id ? 'selected' : '' }}>{{ $bus->number }}</option>
        @endforeach
         </select>
                    
                </div>

                <div class="form-group">
                    <label for="seat_number">Seat Number:</label>
                    <input type="text" name="seat_number" id="seat_number" class="form-control" value="{{ $seat->seat_number }}" required>
                </div>
                <div class="mb-3">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="available" {{ $seat->status == 'available' ? 'selected' : '' }}>Available</option>
                        <option value="booked" {{ $seat->status == 'booked' ? 'selected' : '' }}>Booked</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Seat</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
