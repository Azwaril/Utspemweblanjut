<h2 class="text-xl font-bold mb-4">Daftar Pengguna</h2>

@foreach($users as $user)
    <div class="flex items-center justify-between border-b py-2">
        <span>{{ $user->name }} ({{ $user->email }})</span>
        <form action="/admin/users/{{ $user->id }}/make-admin" method="POST">
            @csrf
            <button class="bg-blue-600 text-white px-4 py-1 rounded hover:bg-blue-700">Jadikan Admin</button>
        </form>
    </div>
@endforeach
