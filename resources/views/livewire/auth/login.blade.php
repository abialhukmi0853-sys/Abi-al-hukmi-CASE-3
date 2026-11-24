<div class="mx-auto max-w-md">
    <flux:heading size="xl" class="mb-6">Masuk</flux:heading>
    <form wire:submit="login" class="space-y-4">
        <flux:input wire:model="email" label="Email" type="email" required autofocus />
        <flux:input wire:model="password" label="Password" type="password" required />
        <flux:checkbox wire:model="remember" label="Ingat saya" />
        <flux:button type="submit" variant="primary" class="w-full">Masuk</flux:button>
    </form>
    <p class="mt-4 text-sm">Belum punya akun? <a href="{{ route('register') }}" wire:navigate class="underline">Daftar</a></p>
</div>