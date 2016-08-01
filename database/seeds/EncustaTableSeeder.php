<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

class EncustaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
    	foreach(range(1,100) as $i){
            DB::table('encuesta')->insert([
            'ver' => '1',
            'feap' => date('Y-m-d'),
            'id_deleg' => $faker->numberBetween(1,5),
            'plant' => $faker->randomElement(['3010','3020','3030','3040','3041','4012','5010','5020','5021','5022','5030','5040','5050','5060','5070','5080','5090','5100','5101','5110','5120','5130','5140','5150','5160',]),
            'id_programa' => $faker->numberBetween(1,50),
            'gene1' => $faker->numberBetween(1,6),
            'gene2' => $faker->numberBetween(1,6),
            'gene3' => $faker->numberBetween(1,6),
            'ipa1' => $faker->numberBetween(1,6),
            'ipa2' => $faker->numberBetween(1,6),
            'en1' => $faker->numberBetween(1,6),
            'en2' => $faker->numberBetween(1,6),
            'pa1' => $faker->paragraph,
            'pa2' => $faker->paragraph,
            'pa3' => $faker->paragraph,
            ]);
        }
    }
}
