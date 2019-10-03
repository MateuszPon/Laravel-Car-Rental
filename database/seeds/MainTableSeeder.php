<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models;
class MainTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayColor = array(
            'blue', 'gold','green','silver','black',
        );

        foreach ($arrayColor as $key => $value){
            $color = new App\Models\Color();
            $color->color = $value;
            $color->save();
        }

        factory(Models\CarBrand::class, 10)->create()->each(function ($brand)use($arrayColor) {
            $brand->name= Str::random(10) . '- Brand';
            $brand->save();
            $model = new Models\CarModel();
            $model->name = Str::random(10) . '- Model';
            $model->brand_id = $brand->id;
            $model->save();

            foreach(range(1,5) as $i){
                $equipment = new Models\Equipment();
                $sizes = array(0,1);
                $years = array(2001,2002,2003,2004,2005);
                $equipment->abs = $sizes[array_rand($sizes)];
                $equipment->esp = $sizes[array_rand($sizes)];
                $equipment->park_assist  = $sizes[array_rand($sizes)];
                $equipment->ac  = $sizes[array_rand($sizes)];
                $equipment->navi  = $sizes[array_rand($sizes)];
                $equipment->save();
                $car = new App\Models\Car();
                $car->model_id = $model->id;
                $car->equipment_id = $equipment->id;
                $colorFind = $arrayColor[array_rand($arrayColor)];
                $color = App\Models\Color::where('color','=',$colorFind)->first();
                $car->color_id = $color->id;
                $car->price =rand();
                $car->year = $years[array_rand($years)];
                $car->save();
            }
        });
    }
}
