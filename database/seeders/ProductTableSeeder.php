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
        $data->name = "Lenovo 82AW0065IN Legion 5P";
        $data->description = "Lenovo 82AW0065IN Legion 5P 15.6 FHD 144Hz 10th Gen I7 16GB RAM 1TB SSD Nvidia RTX2060 GFX Gaming Laptop Win10 Black";
        $data->price = 1100;
        $data->qty = 20;
        $data->image = "lenevo.png";
        $data->save();
        
        $data = new Product();
        $data->name = "Vivo Y53s 8GB 128GB Deep Sea Blue";
        $data->description = "Scene Modes: Night (front & rear), Portrait, Photo, Video, Pano, Live Photo, Slo-Mo, Time-Lapse,Pro, DOC, AI 64MP";
        $data->price = 3300;
        $data->qty = 25;
        $data->image = "vivo.png";
        $data->save();
        
        $data = new Product();
        $data->name = "Sunset Boulevard Pants";
        $data->description = "Lorem Ipsum is simply dummy text of the printing and typesetting industry.";
        $data->price = 3050;
        $data->qty = 35;
        $data->image = "pant.png";
        $data->save();
        
        $data = new Product();
        $data->name = "Lifan K19";
        $data->description = "Lifan K19 is a product of Lifan. Its price is Tk 260,000.00. Lifan is the brand of China. K19 is Assemble/Made in China.";
        $data->price = 14099;
        $data->qty = 70;
        $data->image = "watch.png";
        $data->save();

    }
}