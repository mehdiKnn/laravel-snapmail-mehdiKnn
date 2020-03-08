<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Message;
use Illuminate\Support\Str;

class MessagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $faker->addProvider(new Bluemmb\Faker\PicsumPhotosProvider($faker));
        for ($i=0; $i<10;$i++){
            $message = new Message();
            $message->message = $faker->paragraph(5);
            $message->photo_url = $faker->imageUrl(500, 500, true);
            $message->token = Str::random(60);
            $message->save();
        }
    }
}
