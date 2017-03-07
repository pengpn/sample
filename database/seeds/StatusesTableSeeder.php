<?php
/**
 * Created by PhpStorm.
 * User: pnpeng
 * Date: 2017/3/3
 * Time: 15:50
 */

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Status;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_ids = ['1','2','3'];
        $faker = app(Faker\Generator::class);

        $statuses = factory(Status::class)->times(100)->make()->each(function ($status) use ($faker, $user_ids) {
            $status->user_id = $faker->randomElement($user_ids);
        });

        Status::insert($statuses->toArray());
    }
}