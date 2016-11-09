<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // $this->call(UsersTableSeeder::class);
        $this->call(SeedMoviesTable::class);
    }
}

class SeedMoviesTable extends Seeder
{

    public function run()
    {
        //delete users table records
        DB::table('movies')->delete();
        //insert some dummy records
        DB::table('movies')->insert(array(
            'title'=>'The Breakfast Club',
            'format'=>'VHS',
            'length'=>'93',
            'release_year'=>'1985',
            'rating'=>'3',
        ));
        DB::table('movies')->insert(array(
            'title'=>'Bladerunner',
            'format'=>'DVD',
            'length'=>'117',
            'release_year'=>'1982',
            'rating'=>'5',
        ));
        DB::table('movies')->insert(array(
            'title'=>"Ender's Game",
            'format'=>'Streaming',
            'length'=>'114',
            'release_year'=>'2013',
            'rating'=>'5',
        ));
    }

    public function down()
    {
        DB::table('formats')->delete();
    }

}