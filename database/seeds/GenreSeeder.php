<?php

use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre1 = new \App\Genre;
        $genre1->name = "Action";
        $genre1->save();

        $genre2 = new \App\Genre;
        $genre2->name = "Adventure";
        $genre2->save();

        $genre3 = new \App\Genre;
        $genre3->name = "Comedy";
        $genre3->save();

        $genre4 = new \App\Genre;
        $genre4->name = "Crime";
        $genre4->save();

        $genre5 = new \App\Genre;
        $genre5->name = "Drama";
        $genre5->save();

        $genre6 = new \App\Genre;
        $genre6->name = "Fantasy";
        $genre6->save();

        $genre7 = new \App\Genre;
        $genre7->name = "Game";
        $genre7->save();

        $genre8 = new \App\Genre;
        $genre8->name = "gore";
        $genre8->save();

        $genre9 = new \App\Genre;
        $genre9->name = "Historical";
        $genre9->save();

        $genre10 = new \App\Genre;
        $genre10->name = "Horror";
        $genre10->save();

        $genre11 = new \App\Genre;
        $genre11->name = "Magic";
        $genre11->save();

        $genre12 = new \App\Genre;
        $genre12->name = "Martial Arts";
        $genre12->save();

        $genre13 = new \App\Genre;
        $genre13->name = "Medical";
        $genre13->save();

        $genre14 = new \App\Genre;
        $genre14->name = "Mistery";
        $genre14->save();

        $genre15 = new \App\Genre;
        $genre15->name = "Music";
        $genre15->save();

        $this->command->info("Genre berhasil di tambahkan");
    }
}
