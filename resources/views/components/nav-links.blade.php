@auth
    <a href="{{ route('dashboard') }}" wire:navigate class="text-sm hover:underline">Dashboard</a>
    <a href="{{ route('notes.index') }}" wire:navigate class="text-sm hover:underline">Catatan</a>
    <a href="{{ route('notes.trash') }}" wire:navigate class="text-sm hover:underline">Sampah</a>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="text-sm text-red-500 hover:underline">Keluar</button>
    </form>
@else
    <a href="{{ route('login') }}" wire:navigate class="text-sm hover:underline">Masuk</a>
    <a href="{{ route('register') }}" wire:navigate class="text-sm hover:underline">Daftar</a>
@endauth
