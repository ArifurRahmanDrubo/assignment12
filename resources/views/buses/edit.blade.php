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
        <h1>Edit Bus</h1>
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
            <form action="{{ route('buses.update', $bus->id) }}" method="post">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Bus Name:</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $bus->name }}" required>
                </div>

                <div class="form-group">
                    <label for="number">Bus Number:</label>
                    <input type="text" name="number" id="number" class="form-control" value="{{ $bus->number }}" required>
                </div>
                <div class="form-group">
                    <label for="seats">Total Seats:</label>
                    <input type="text" name="seats" id="seats" class="form-control" value="{{ $bus->seats }}" required>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Update Bus</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>
