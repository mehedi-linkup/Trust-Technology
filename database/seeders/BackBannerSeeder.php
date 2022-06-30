<?php

namespace Database\Seeders;
use App\Models\BackBanner;
use Illuminate\Database\Seeder;

class BackBannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BackBanner::create([
            'about' => 'content/website/about.jpg',
            'product' => 'content/website/about.jpg',
            'gallery' => 'content/website/about.jpg',
            'news' => 'content/website/about.jpg',
            'contact' => 'content/website/about.jpg',
        ]);
    }
}
