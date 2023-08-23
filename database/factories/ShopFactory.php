<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Http\Controllers\ShopController;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShopFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shop_hight_limit = fake()->randomNumber($nbDigits = 3);
        $shop_width_limit = fake()->randomNumber($nbDigits = 3);
        $shop_capacity = $shop_hight_limit*$shop_width_limit;
        return [
            'name'=>fake()->company(),
            'post_code'=>fake()->postcode(),
            'address'=>fake()->address(),
            'email'=>fake()->unique()->safeEmail(),
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'shop_capacity'=>$shop_capacity,
            'shop_hight_limit'=>$shop_hight_limit,
            'shop_width_limit'=>$shop_width_limit
        ];
    }
}
