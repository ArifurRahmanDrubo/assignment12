
@extends('layouts.app')
@section('buses-create')
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
        <form action="{{ route('buses.store') }}" method="post">
            @csrf

            <div class="tiki-form-group">
                <label for="name">Bus Name:</label>
                <input type="text" name="name" id="name" class="tiki-form-control" required>
            </div>

            <div class="tiki-form-group">
                <label for="number">Bus Number:</label>
                <input type="text" name="number" id="number" class="tiki-form-control" required>
            </div>
            <div class="tiki-form-group">
                <label for="seats">Total Seats:</label>
                <input type="text" name="seats" id="number" class="tiki-form-control" required>
            </div>

            <div class="tiki-form-group">
                <button type="submit" class="btn tiki-btn-primary">Add Bus</button>
            </div>
        </form>
    </div>
</div>   
@endsection

