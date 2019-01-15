<?php

use Illuminate\Database\Seeder;
use App\People;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        People::create([
            'first_name' => 'Bob',
            'last_name' => 'Saget',
            'email' => 'bob@aol.com'
        ]);
    }
}
