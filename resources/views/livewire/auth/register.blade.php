<div class="mx-auto max-w-md">
    <flux:heading size="xl" class="mb-6">Daftar Akun</flux:heading>
    <form wire:submit="register" class="space-y-4">
        <flux:input wire:model="name" label="Nama" required />
        <flux:input wire:model="email" label="Email" type="email" required />
        <flux:input wire:model="password" label="Password" type="password" required />
        <flux:input wire:model="password_confirmation" label="Ulangi Password" type="password" required />
        <flux:button type="submit" variant="primary" class="w-full">Daftar</flux:button>
    </form>
    <p class="mt-4 text-sm">Sudah punya akun? <a href="{{ route('login') }}" wire:navigate class="underline">Masuk</a></p>
</div>