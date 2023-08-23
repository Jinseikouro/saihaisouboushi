<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Groupe;
use App\Models\Shop;
use App\Models\User;
use App\Models\Shipment;
use App\Models\Driver;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $numberOfRoop = 5;
        $i=0;
        while($i<$numberOfRoop){
            $groupe = Groupe::factory()->create();

            $numberOfUsers = fake()->NumberBetween(1,5);
            User::factory($numberOfUsers)->create(['groupe_id' => $groupe->id]);
        
            Shop::factory()->create();

            
            $driver = Driver::factory()->create();
            $numberOfShipments = fake()->NumberBetween(1,3);
            Shipment::factory($numberOfShipments)->create([
                'driver_id' => $driver->id,
                'groupe_id' => $groupe->id
            ]);

            // 全ユーザーの'absence'が0だった場合0を代入する
            $usersInGroup = User::where('groupe_id', $groupe->id)->get();
            $absenceValues = $usersInGroup->pluck('absence')->unique();
            $groupAbsence = $absenceValues->count() === 1 && $absenceValues->first() === 0 ? 0 : 1;
            // ユーザーの状態に元づいて1か0を代入する
            $groupe->update(['absence' => $groupAbsence]);

            $i++;
        }

        for($i = 0; $i < $numberOfRoop; $i++)
        {
            $numberOfRelationBtwGroupeShop = fake()->numberBetween(1,$numberOfRoop);
            $groupeId = Groupe::get()->skip($i)->first();

            $shopIdList = Shop::inRandomOrder()->take($numberOfRelationBtwGroupeShop)->get();
                
            for($j = 0; $j < $numberOfRelationBtwGroupeShop; $j++)    
            {
                $shopId = $shopIdList[$j];

                if (!$groupeId->shops->contains($shopId->id))
                {
                    // 中間テーブルにデータを挿入し、created_at と updated_at を設定
                    DB::table('groupe_shop')->insert([
                        'groupe_id' => $groupeId->id,
                        'shop_id' => $shopId->id,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
            

        }

        

       
        
    
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
