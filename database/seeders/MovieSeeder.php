<?php

namespace Database\Seeders;

use App\Models\Movies;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [ ['movie_name' => 'Haunted Mansion', 'description' => 'A single mom named Gabbie hires a tour guide, a psychic, a priest and a historian to help exorcise her newly bought mansion after discovering it is inhabited by ghosts.', 'youtube_url' => 'https://www.youtube.com/watch?v=AjLKTz81bj8', 'image' => 'Haunted_Mansion.jpg', 'release_date' => '2023-07-28', 'slug' => 'haunted-mission', 'created_at' => '2023-08-01', 'updated_at' => '2023-08-01'],
        ['movie_name' => 'Insidious: The Red Door', 'description' => 'The Lamberts must go deeper into The Further than ever before to put their demons to rest once and for all.', 'youtube_url' => 'https://www.youtube.com/watch?v=ZuQuOnYnr3Q', 'image' => 'insidious.jpg', 'release_date' => '2023-07-07', 'slug' => 'insidious-the-red-door', 'created_at' => '2023-08-01', 'updated_at' => '2023-08-01'],
        ['movie_name' => 'Oppenheimer', 'description' => 'The story of American scientist, J. Robert Oppenheimer, and his role in the development of the atomic bomb.', 'youtube_url' => 'https://www.youtube.com/watch?v=uYPbbksJxIg', 'image' => 'oppenheimer.jpg', 'release_date' => '2023-07-21', 'slug' => 'oppenheimer', 'created_at' => '2023-08-01', 'updated_at' => '2023-08-01'],];
        Movies::insert($data);
    }
}
