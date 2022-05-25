<?php

namespace Modules\Game\Database\Seeders;
use Modules\Game\Entities\GameModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GameTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Model::unguard();
        //factory(GameModel::class, 6)->create();
        //$this->call("OthersTableSeeder");
        DB::table('games')->insert([
            'uuid'=>Str::uuid(),
            'description'=>str::random(15),
            'rule'=>str::random(12),
            'category_id' =>2,
            'coin'=>70,
            'version'=>'home',
            'is_home'=>1,
            'image'=>'img.png',
            'name' => str::random(8),
            'url'=>'jhh',
            'created_at' => now()->format('Y-m-d H:i:s'),
            'updated_at' => now()->format('Y-m-d H:i:s'),
            
        ]);
    }
}
