@extends('layouts.app')
@section('customer-create')
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
        <form action="{{ route('customers.store') }}" method="post">
            @csrf

            <div class="tiki-form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="tiki-form-control" required>
            </div>

            <div class="tiki-form-group">
                <label for="contact_number">Contact Number:</label>
                <input type="text" name="contact_number" id="contact_number" class="tiki-form-control" required>
            </div>
            

            <div class="tiki-form-group">
                <button type="submit" class="btn tiki-btn-primary">Add Customer</button>
            </div>
        </form>
    </div>
</div>
@endsection