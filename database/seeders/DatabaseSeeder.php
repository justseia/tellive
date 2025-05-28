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
        foreach (range(1, 5) as $i) {
            User::query()->create([
                'step' => $i,
                'first_name' => "Сейтмурат{$i}",
                'last_name' => "Калмурат{$i}",
                'country_code' => "+7",
                'phone_number' => "706430104{$i}",
                'subdomain' => "seia{$i}",
                'about_me' => 'Путешественник, блогер и фотограф.',
                'avatar' => 'https://dummyimage.com/400x400',
                'remember_token' => Str::random(60),
                'email' => "seia{$i}@example.com",
                'password' => Hash::make('asdasdasd'),
            ]);
        }

        // Истории
        foreach (range(1, 5) as $i) {
            History::query()->create([
                'type' => 'публичная',
                'views' => rand(50, 500),
                'title' => "Путешествие по Европе {$i}",
                'date' => now()->subDays($i * 2)->format('Y-m-d'),
                'image_url' => 'https://dummyimage.com/600x400',
                'type_of_history' => 'europe_trip',
                'user_id' => User::query()->first()->id,
            ]);
        }

        foreach (range(1, 5) as $i) {
            Info::query()->create([
                'value' => (string)(2020 + $i),
                'type' => 'год регистрации',
            ]);
        }

        // Клиенты
        foreach (range(1, 5) as $i) {
            Client::query()->create([
                'full_name' => "Клиент {$i}",
                'type' => 'B2B',
                'tariff' => ['Basic', 'Standard', 'Premium'][rand(0, 2)],
                'phone_number' => '7706111223' . $i,
                'curator' => "Куратор {$i}",
                'city' => ['Алматы', 'Астана', 'Шымкент', 'Караганда'][rand(0, 3)],
                'last_payment_date' => now()->subDays(rand(5, 30))->format('Y-m-d'),
                'last_payment_partnership' => now()->subDays(rand(5, 30))->format('Y-m-d'),
                'user_id' => User::query()->first()->id,
            ]);
        }

        // Видео
        foreach (range(1, 5) as $i) {
            Video::query()->create([
                'title' => "Влог о Таиланде {$i}",
                'image_url' => 'https://dummyimage.com/600x400',
                'youtube_url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ?vid=' . $i,
                'user_id' => User::query()->first()->id,
            ]);
        }

        // Отзывы
        foreach (range(1, 5) as $i) {
            Review::query()->create([
                'title' => "Отзыв о поездке {$i}",
                'description' => "Это была незабываемая поездка номер {$i}!",
                'image_url' => 'https://dummyimage.com/600x400',
                'type_of_travel' => ['автобусный тур', 'авиаперелёт', 'круиз'][rand(0, 2)],
                'youtube_url' => "https://www.youtube.com/embed/dQw4w9WgXcQ?review={$i}",
                'user_id' => User::query()->first()->id,
            ]);
        }

        // Блоки истории
        foreach (range(1, 5) as $i) {
            HistoryBlock::query()->create([
                'text' => "Описание впечатлений из раздела {$i}.",
                'images_url' => 'https://dummyimage.com/600x400',
                'youtube_url' => "https://www.youtube.com/embed/dQw4w9WgXcQ?block={$i}",
                'history_id' => History::query()->inRandomOrder()->first()->id,
            ]);
        }

        // Избранное
        foreach (range(1, 5) as $i) {
            HistoryFavorite::query()->create([
                'user_id' => User::query()->inRandomOrder()->first()->id,
                'history_id' => History::query()->inRandomOrder()->first()->id,
            ]);
        }
    }
}
