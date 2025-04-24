@extends('layouts.app')

@section('content')
<div class="w-full min-h-screen bg-gray-100 py-10 px-4">
    <div class="max-w-6xl mx-auto">
        <h1 class="text-3xl font-bold mb-8 text-center text-blue-600">Daftar Event Konser</h1>

        @if($events->isEmpty())
            <p class="text-center text-gray-600">Tidak ada event konser tersedia.</p>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($events as $event)
                <div class="bg-white rounded-2xl shadow hover:shadow-lg transition">
                <img src="{{ asset('storage/' . $event->image) }}" alt="Gambar Event" class="w-full h-80 object-cover my-4">
                    <div class="p-4">
                        <h2 class="text-xl font-semibold mb-2">{{ $event->title }}</h2>
                        <p class="text-sm text-gray-600 mb-1"><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}</p>
                        <p class="text-sm text-gray-600 mb-3"><strong>Lokasi:</strong> {{ $event->location }}</p>
                        <a href="{{ route('events.show', $event->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Lihat Detail</a>
                    </div>
                </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
