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
        DB::table('formats')->delete();
        //insert some dummy records
        DB::table('formats')->insert(array(
            array('format'=>'VHS'),
            array('format'=>'DVD'),
            array('format'=>'Streaming'),
        ));
    }

    public function down()
    {
        DB::table('formats')->delete();
    }

}