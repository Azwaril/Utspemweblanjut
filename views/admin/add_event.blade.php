@extends('layouts.app')
@section('content')

<h1 class="text-3xl mb-4">Tambah Event Konser</h1>

<form action="/admin/event/store" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow w-2/3 mx-auto">
    @csrf
    <label>Judul Konser:</label>
    <input type="text" name="title" class="border p-2 w-full mb-4" required>

    <label>Deskripsi:</label>
    <textarea name="description" class="border p-2 w-full mb-4" required></textarea>

    <label>Lokasi:</label>
    <input type="text" name="location" class="border p-2 w-full mb-4" required>

    <label>Tanggal:</label>
    <input type="date" name="date" class="border p-2 w-full mb-4" required>

    <label>Gambar Konser:</label>
    <input type="file" name="image" class="border p-2 w-full mb-4" required>

    <h2 class="text-xl font-bold mt-4 mb-2">Informasi Tiket</h2>
    <label>Kategori Tiket:</label>
    <input type="text" name="ticket_category" class="border p-2 w-full mb-4" required>

    <label>Harga Tiket:</label>
    <input type="number" name="ticket_price" class="border p-2 w-full mb-4" required>

    <label>Stok Tiket:</label>
    <input type="number" name="ticket_stock" class="border p-2 w-full mb-4" required>

    <button class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700">Simpan Event</button>
</form>

@endsection
