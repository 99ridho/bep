<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);

        $type = [
            ['type' => 'Admin'],
            ['type' => 'Team'],
            ['type' => 'Athlete'],
            ['type' => 'Organizer']
        ];

        //DB::table('type')->insert($type);
        foreach ($type as $e) {
            \App\Type::create($e);
        }

        Model::reguard();
    }
}
