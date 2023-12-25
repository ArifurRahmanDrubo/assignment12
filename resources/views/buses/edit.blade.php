@extends('layouts.app')
@section('buses-edit')
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

    <div class="tiki-card">
        <h1>Edit Bus</h1>
        <form action="{{ route('buses.update', $bus->id) }}" method="post">
            @csrf
            @method('PUT')

            <div class="tiki-form-group">
                <label for="name">Bus Name:</label>
                <input type="text" name="name" id="name" class="tiki-form-control" value="{{ $bus->name }}" required>
            </div>

            <div class="tiki-form-group">
                <label for="number">Bus Number:</label>
                <input type="text" name="number" id="number" class="tiki-form-control" value="{{ $bus->number }}" required>
            </div>
            <div class="tiki-form-group">
                <label for="seats">Total Seats:</label>
                <input type="text" name="seats" id="seats" class="tiki-form-control" value="{{ $bus->seats }}" required>
            </div>

            <div class="tiki-form-group">
                <button type="submit" class="btn tiki-btn-primary">Update Bus</button>
            </div>
        </form>
    </div>
</div>
@endsection
