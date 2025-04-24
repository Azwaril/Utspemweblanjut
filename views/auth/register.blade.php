@extends('layouts.app')
@section('content')
<h1 class="text-3xl mb-4">Register</h1>

@if ($errors->any())
    <div class="bg-red-200 p-3 rounded mb-4">
        {{ $errors->first() }}
    </div>
@endif

<form action="/register" method="POST" class="bg-white p-6 rounded shadow w-1/3 mx-auto">
    @csrf
    <label>Nama:</label>
    <input type="text" name="name" class="border p-2 w-full" required>

    <label class="mt-4">Email:</label>
    <input type="email" name="email" class="border p-2 w-full" required>

    <label class="mt-4">Password:</label>
    <input type="password" name="password" class="border p-2 w-full" required>

    <label class="mt-4">Konfirmasi Password:</label>
    <input type="password" name="password_confirmation" class="border p-2 w-full" required>

    <button type="submit" class="bg-blue-500 text-white p-2 rounded w-full mt-6">Register</button>
</form>
@endsection
