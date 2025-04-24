@extends('layouts.app')

@section('content')
<div class="bg-gray-100 min-h-screen py-10 px-4 sm:px-8 lg:px-20">
    <div class="max-w-7xl mx-auto">
        <h1 class="text-3xl md:text-4xl font-bold text-center text-blue-600 mb-8">Hubungi Kami</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 bg-white p-6 md:p-10 rounded-2xl shadow">
            <!-- Info Kontak -->
            <div>
                <p class="text-lg text-gray-700 mb-4">
                    Jika ada pertanyaan seputar pembelian tiket, acara, atau kerja sama, silakan hubungi kami:
                </p>
                <ul class="space-y-3 text-gray-700">
                    <li><strong>Email:</strong> <a href="mailto:support@tiketkonser.com" class="text-blue-600 hover:underline">support@tiketkonser.com</a></li>
                    <li><strong>Telepon:</strong> 0812-3456-7890</li>
                    <li><strong>Alamat:</strong> Jl. Musik Raya No. 123, Jakarta</li>
                </ul>
            </div>

            <!-- Form Kontak -->
            <div>
                <h2 class="text-xl font-semibold text-gray-800 mb-4">Form Kontak</h2>
                <form action="#" method="POST" class="space-y-4">
                    <input type="text" placeholder="Nama Anda" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <input type="email" placeholder="Email Anda" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500" />
                    <textarea rows="5" placeholder="Pesan Anda" class="w-full p-3 border border-gray-300 rounded-xl focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                    <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-xl hover:bg-blue-700 transition">Kirim</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
