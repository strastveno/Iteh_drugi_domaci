<?php

namespace Database\Seeders;
use App\Models\Lopte;
use App\Models\Type;
use App\Models\User;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Type::truncate();
        Lopte::truncate();
        User::truncate();

        $user1=User::factory()->create();
        $user2=User::factory()->create();
        

        $type1=Type::create(['name'=>"Kosarkaska lopta"]);
        $type2=Type::create(['name'=>"Fudbalska lopta"]);
        $type3=Type::create(['name'=>"Odbojkaska lopta"]);


        $lopte1=Lopte::create([
            'name'=>'adidas UCL LGE IS',
            'description'=>'Fudbalska lopta za Ligu Sampiona',
            'price'=>120,
            'user_id'=>$user1->id,
            'type_id'=>$type2->id
        ]);

        $lopte2=Lopte::create([
            'name'=>'Molten B7G3800',
            'description'=>'Kosarkaska lopta Molten vrhunskog kvaliteta',
            'price'=>50,
            'user_id'=>$user2->id,
            'type_id'=>$type1->id
        ]);

        $lopte3=Lopte::create([
            'name'=>'TS LOPTA HMLENERGIZER VB-205072-9107',
            'description'=>'Odbojkaska Hummel lopta na akciji',
            'price'=>40,
            'user_id'=>$user1->id,
            'type_id'=>$type3->id
        ]);

        $lopte4=Lopte::create([
            'name'=>'Nike LFC ACADEMY',
            'description'=>'Fudbalska lopta za navijace Liverpoola',
            'price'=>30,
            'user_id'=>$user2->id,
            'type_id'=>$type2->id
        ]);

        $lopte5=Lopte::create([
            'name'=>'Wilson NIKOLA JOKIĆ',
            'description'=>'Kosarkaska lopta za potpisom Nikole Jokica',
            'price'=>90,
            'user_id'=>$user1->id,
            'type_id'=>$type1->id
        ]);


    }
}
