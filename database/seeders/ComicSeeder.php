<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Comic;
use App\Functions\Helper;


class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $comics = config('comics');
        foreach ($comics as $comic) {
            $new_comic = new Comic();
            $new_comic->thumb = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->slug = Helper::generateSlug($new_comic->series, Comic::class);
            $new_comic->type = $comic['type'];
            $new_comic->save();
        }
    }
}
