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
        $this->call(SeedFormatsTable::class);
    }
}

class SeedFormatsTable extends Seeder
{

    public function run()
    {
        //delete users table records
        DB::table('movies')->delete();
        //insert some dummy records
        DB::table('movies')->insert(array(
            array('title'=>'The Breakfast Clup'),
            array('format'=>'VHS'),
            array('length'=>'93'),
            array('release_year'=>'1985'),
            array('rating'=>'3'),
        ));
        DB::table('movies')->insert(array(
            array('title'=>'Bladerunner'),
            array('format'=>'DVD'),
            array('length'=>'117'),
            array('release_year'=>'1982'),
            array('rating'=>'5'),
        ));
        DB::table('movies')->insert(array(
            array('title'=>"Ender's Game"),
            array('format'=>'Streaming'),
            array('length'=>'114'),
            array('release_year'=>'2013'),
            array('rating'=>'5'),
        ));
    }

    public function down()
    {
        DB::table('formats')->delete();
    }

}