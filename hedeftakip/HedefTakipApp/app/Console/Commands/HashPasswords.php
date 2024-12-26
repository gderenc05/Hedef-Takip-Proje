<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class HashPasswords extends Command
{
    protected $signature = 'hash:passwords';

    // Komutun açıklaması
    protected $description = 'Tüm kullanıcı şifrelerini bcrypt ile hashler.';

    /**
     * Komutun çalıştırılacağı fonksiyon.
     */
    public function handle()
    {
        $users = User::all();

        foreach ($users as $user) {
            if (!Hash::needsRehash($user->password)) {
                $user->password = Hash::make($user->password);
                $user->save();
                $this->info("{$user->email} kullanıcısının şifresi hashlenmiştir.");
            } else {
                $this->info("{$user->email} kullanıcısının şifresi zaten hashlenmiş.");
            }
        }


        $this->info('Tüm kullanıcı şifreleri başarıyla hashlenmiştir.');
    }



}
