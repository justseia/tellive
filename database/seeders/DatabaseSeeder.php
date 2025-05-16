<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\History;
use App\Models\HistoryBlock;
use App\Models\HistoryFavorite;
use App\Models\Review;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\UserInfo;
use App\Models\Video;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        foreach (range(1, 5) as $index) {
            User::query()->create([
                'first_name' => 'Seia' . $index,
                'last_name' => 'Seia' . $index,
                'subdomain' => 'seia' . $index,
                'about_me' => 'lorem ipsum dolor sit amet',
                'remember_token' => 'KoN2MSWPTjfcF7vUoqT8sLz4HP5cjaPGVjm2ZlDhbWPhmt5fZK7V6n1sRLeK',
                'email' => 'test@example.com' . $index,
                'password' => Hash::make('asdasdasd'),
            ]);
        }

        foreach (range(1, 5) as $index) {
            History::query()->create([
                'type' => 'public' . $index,
                'views' => 100,
                'title' => 'Title',
                'date' => '2025-05-06',
                'image_url' => 'https://via.placeholder.com/100x100',
                'type_of_history' => 'theme',
                'user_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }

        foreach (range(1, 5) as $index) {
            UserInfo::query()->create([
                'value' => '2026',
                'type' => 'public' . $index,
                'user_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }

        foreach (range(1, 5) as $index) {
            Client::query()->create([
                'full_name' => 'public' . $index,
                'type' => 'qwe',
                'tariff' => 'Premium',
                'phone_number' => '77064301045',
                'curator' => 'qwe wqe',
                'city' => 'asd',
                'last_payment_date' => '2025-05-06',
                'last_payment_partnership' => '2025-05-06',
                'user_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }

        foreach (range(1, 5) as $index) {
            Video::query()->create([
                'title' => 'public' . $index,
                'image_url' => 'https://via.placeholder.com/100x100',
                'youtube_url' => 'https://www.youtube.com/embed/public' . $index,
                'user_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }

        foreach (range(1, 5) as $index) {
            Review::query()->create([
                'title' => 'public' . $index,
                'description' => 'public' . $index,
                'image_url' => 'https://via.placeholder.com/100x100',
                'type_of_travel' => 'public' . $index,
                'youtube_url' => 'https://www.youtube.com/embed/public' . $index,
                'user_id' => User::query()->inRandomOrder()->first()->id,
            ]);
        }

        foreach (range(1, 5) as $index) {
            HistoryBlock::query()->create([
                'text' => 'public' . $index,
                'images_url' => 'https://via.placeholder.com/100x100',
                'youtube_url' => 'https://www.youtube.com/embed/public' . $index,
                'history_id' => History::query()->inRandomOrder()->first()->id,
            ]);
        }

        foreach (range(1, 5) as $index) {
            HistoryFavorite::query()->create([
                'user_id' => User::query()->inRandomOrder()->first()->id,
                'history_id' => History::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
