<?php

use Illuminate\Database\Seeder;

use App\Model\Category;
class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'sport',
        ]);
        Category::create([
            'name' => 'police',
        ]);
        Category::create([
            'name' => 'Econonmie',
        ]);

    }
}
