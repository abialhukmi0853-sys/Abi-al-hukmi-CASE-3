<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@test.com',
            'password' => Hash::make('password123'),
        ]);

        foreach (range(1, 8) as $i) {
            Note::create([
                'user_id' => $user->id,
                'title' => "Catatan contoh $i",
                'content' => 'Ini isi catatan contoh nomor ' . $i,
                'is_pinned' => $i === 1,
                'priority' => 'sedang',
            ]);
        }
    }
}
