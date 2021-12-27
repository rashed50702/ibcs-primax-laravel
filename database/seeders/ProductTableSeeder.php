<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = new Product();
        $data->name = "Steampunk Eye Wear Glasses";
        $data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $data->price = 1100;
        $data->qty = 55;
        $data->image = "sunglass.png";
        $data->save();

        $data = new Product();
        $data->name = "Full Sleeves Hooddies";
        $data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $data->price = 2500;
        $data->qty = 20;
        $data->image = "hoodies.png";
        $data->save();


        $data = new Product();
        $data->name = "Silver Lining Dress";
        $data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $data->price = 1100;
        $data->qty = 20;
        $data->save();
        
        $data = new Product();
        $data->name = "Cup of Joe Pillow";
        $data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $data->price = 3300;
        $data->qty = 25;
        $data->save();
        
        $data = new Product();
        $data->name = "Sunset Boulevard Pants";
        $data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $data->price = 3050;
        $data->qty = 35;
        $data->save();
        
        $data = new Product();
        $data->name = "Lovey Dovey Maxi Dress";
        $data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $data->price = 14099;
        $data->qty = 70;
        $data->save();

    }
}