<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\History;
use App\Models\HistoryBlock;
use App\Models\HistoryFavorite;
use App\Models\Review;
use App\Models\User;
use App\Models\Info;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Пользователи
        foreach (range(1, 2) as $i) {
            User::query()->create([
                'step' => 4,
                'first_name' => "Сейтмурат",
                'last_name' => "Калмурат",
                'country_code' => "+7",
                'phone_number' => "7064301045",
                'subdomain' => "seia{$i}",
                'about_me' => 'Путешественник, блогер и фотограф.',
                'avatar' => 'https://dummyimage.com/400x400',
                'remember_token' => Str::random(60),
                'email' => "seia{$i}@example.com",
                'password' => Hash::make('asdasdasd'),
            ]);
        }
    }
}
