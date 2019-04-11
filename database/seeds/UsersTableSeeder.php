<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users1')->insert([
    'name' => 'Renan',
    'serie' => 'Westworld'
  ]);
  DB::table('users1')->insert([
    'name' => 'Hack',
    'serie' => 'SOA'
  ]);
  DB::table('users1')->insert([
    'name' => 'Vinicius',
    'serie' => 'Westworld'
  ]);
    }

}
