<div class="space-y-4">
    <flux:heading size="xl">Dashboard</flux:heading>
    <p>Halo, {{ auth()->user()->name }}!</p>

    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
        <flux:card><flux:text>Total catatan</flux:text><flux:heading size="xl">{{ $stats['total'] }}</flux:heading></flux:card>
        <flux:card><flux:text>Dipin</flux:text><flux:heading size="xl">{{ $stats['pinned'] }}</flux:heading></flux:card>
        <flux:card><flux:text>Di tong sampah</flux:text><flux:heading size="xl">{{ $stats['trashed'] }}</flux:heading></flux:card>
    </div>
</div>