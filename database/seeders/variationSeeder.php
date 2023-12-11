<?php

namespace Database\Seeders;

use App\Models\Variation;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class variationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10 ; $i++) { 
            Variation::insert([
                'size' => Str::random(1),
                'category_id' => rand(24, 27),
                'created_at' => Carbon::now()
            ]);
        }
    }
}
