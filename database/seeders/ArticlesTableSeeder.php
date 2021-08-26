<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach(range(1,3) as $num){
        DB::table('articles')->insert([
            'title'=>"タイトル {$num}",
            'body'=>"内容 {$num}",
        ]);
        }
    }
}
