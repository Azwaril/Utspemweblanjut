@extends('layouts.app')

@section('content')

<!-- Hero Banner -->
<div class="bg-blue-600 text-white text-center py-10 rounded-xl mb-8 shadow-md">
    <h1 class="text-4xl font-bold">Temukan Konser Favoritmu!</h1>
    <p class="mt-2 text-lg">Mudah, Cepat, dan Aman hanya di TiketKonser.com</p>
</div>

<!-- Carousel / Slider -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />

<section class="max-w-6xl mx-auto py-8">
    <div class="swiper mySwiper rounded-xl overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <img src="{{ asset('images/konser1.jpg') }}" alt="Konser 1" class="w-full h-[500px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/konser2.jpg') }}" alt="Konser 2" class="w-full h-[500px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/konser3.jpg') }}" alt="Konser 3" class="w-full h-[500px] object-cover">
            </div>
            <div class="swiper-slide">
                <img src="{{ asset('images/konser4.jpg') }}" alt="Konser 4" class="w-full h-[500px] object-cover">
            </div>
        </div>
        <div class="swiper-pagination"></div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
<script>
    const swiper = new Swiper(".mySwiper", {
        loop: true,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
</script>

<!-- Event Cards Modern -->
<div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8 max-w-6xl mx-auto mt-12 mb-20 px-4">
    @foreach($events as $event)
    <div class="bg-white rounded-2xl shadow-md hover:shadow-xl hover:scale-[1.02] transition-all duration-300 overflow-hidden group">
        <div class="relative">
            <img src="{{ asset('storage/' . $event->image) }}" alt="Gambar Event" class="w-full h-64 object-cover group-hover:brightness-90 transition duration-300">
            <div class="absolute top-4 left-4 bg-blue-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-lg">
                {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
            </div>
        </div>
        <div class="p-5">
            <h3 class="text-xl font-bold text-gray-800 mb-1 group-hover:text-blue-700 transition duration-300">
                {{ $event->title }}
            </h3>
            <p class="text-sm text-gray-500 mb-4">{{ $event->location }}</p>
            <a href="/event/{{ $event->id }}"
               class="inline-block bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium py-2 px-5 rounded-full transition duration-300">
                🎟️ Lihat Detail
            </a>
        </div>
    </div>
    @endforeach
</div>

<!-- Footer -->
<footer class="w-full bg-white text-gray-600 text-center py-6 border-t mt-16">
    <div class="px-4 sm:px-6 lg:px-8">
        <p class="text-sm">&copy; {{ date('Y') }} TiketKonser.com. All rights reserved.</p>
        <div class="mt-2">
            <a href="/" class="hover:underline mx-2">Home</a> |
            <a href="/events" class="hover:underline mx-2">Event</a> |
            <a href="/contact" class="hover:underline mx-2">Contact</a>
        </div>
    </div>
</footer>

@endsection
