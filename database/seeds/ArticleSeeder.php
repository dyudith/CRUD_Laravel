<?php

use Illuminate\Database\Seeder;
use App\Models\Article;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data= new Article;
        $data->title= "Alfombra";
        $data->price= 500.60;
        $data->status= true;
        $data->qty= 200;
        $data->save();

        $data= new Article;
        $data->title= "Samsung A20";
        $data->price= 33000;
        $data->status= true;
        $data->qty= 5;
        $data->save();
        
        $data= new Article;
        $data->title= "Bicicleta";
        $data->price= 11500;
        $data->status= true;
        $data->qty= 1;
        $data->save();

        $data= new Article;
        $data->title= "Laptop";
        $data->price= 68999.99;
        $data->status= true;
        $data->qty= 5;
        $data->save();

        $data= new Article;
        $data->title= "Tamagotchi";
        $data->price= 1000;
        $data->status= false;
        $data->qty= 2;
        $data->save();
        
    }
}
