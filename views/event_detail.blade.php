@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <!-- Judul Event -->
    <h1 class="text-3xl font-bold text-gray-800 mb-4">{{ $event->title }}</h1>

    <!-- Poster -->
    <img src="{{ asset('storage/' . $event->image) }}"
         alt="{{ $event->title }}"
         class="w-full max-w-md mx-auto h-[600px] object-cover rounded-lg shadow-lg mb-6" />

    <!-- Deskripsi -->
    <p class="text-gray-700 mb-6">{{ $event->description }}</p>

    <!-- Form Pemesanan Tiket -->
    <div class="border-t pt-6 mt-6">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Pilih Tiket:</h2>

        <form method="POST" action="/checkout" class="space-y-4">
            @csrf
            @foreach($event->tickets as $ticket)
                <div class="flex items-center">
                    <input type="radio" id="ticket{{ $ticket->id }}" name="ticket_id" value="{{ $ticket->id }}" class="mr-2">
                    <label for="ticket{{ $ticket->id }}" class="text-gray-700">
                        {{ $ticket->category }} - <span class="font-semibold">Rp{{ number_format($ticket->price) }}</span>
                        (Sisa: {{ $ticket->stock }})
                    </label>
                </div>
            @endforeach

            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <input type="number" name="quantity" min="1" placeholder="Jumlah Tiket"
                   class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">

            <select name="payment_method"
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                <option value="transfer_bank">Transfer Bank</option>
                <option value="e-wallet">E-Wallet</option>
            </select>

        <!-- Tombol Aksi: Di pojok kanan bawah form -->
        <div class="flex justify-end gap-3 mt-4">
            <!-- Chat Admin -->
            <a href="https://wa.me/6281234567890" target="_blank"
            class="bg-green-500 hover:bg-green-600 text-white text-sm px-4 py-2 rounded-md shadow-sm transition">
                💬 Chat
            </a>

            <!-- Masukkan Keranjang -->
            <form method="POST" action="{{ route('cart.add', $event->id) }}">
                @csrf
                <button type="submit"
                        class="bg-yellow-400 hover:bg-yellow-500 text-black text-sm px-4 py-2 rounded-md shadow-sm transition">
                    🛒 Keranjang
                </button>
            </form>

            <!-- Beli Sekarang -->
            <form method="POST" action="{{ route('order.buy', $event->id) }}">
                @csrf
                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white text-sm px-4 py-2 rounded-md shadow-sm transition">
                    ⚡ Beli
                </button>
            </form>
        </div>


    <!-- Review Section -->
    <div class="border-t pt-8 mt-10">
        <h3 class="text-xl font-semibold text-gray-800 mb-4">Review Pengguna:</h3>

        @forelse($event->reviews as $review)
            <div class="mb-4 p-4 bg-gray-100 rounded-md shadow-sm">
                <p class="text-gray-800"><strong>{{ $review->user->name }}:</strong> {{ $review->comment }}</p>
                <p class="text-yellow-500">Rating: {{ str_repeat('⭐', $review->rating) }}</p>
            </div>
        @empty
            <p class="text-gray-500 italic">Belum ada review.</p>
        @endforelse

        @if(auth()->check())
        <form action="/review" method="POST" class="space-y-4 mt-6">
            @csrf
            <input type="hidden" name="event_id" value="{{ $event->id }}">

            <textarea name="comment" placeholder="Tulis review..."
                      class="w-full p-3 border border-gray-300 rounded-md resize-none focus:outline-none focus:ring-2 focus:ring-blue-500"
                      rows="4"></textarea>

            <div class="flex items-center gap-4">
                <select name="rating"
                        class="p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option value="">Pilih Rating</option>
                    @for($i = 1; $i <= 5; $i++)
                        <option value="{{ $i }}">{{ $i }} ⭐</option>
                    @endfor
                </select>

                <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md transition duration-200">
                    Kirim
                </button>
            </div>
        </form>
        @endif
    </div>
</div>
@endsection
