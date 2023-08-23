<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ShipmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $shipment_hight = fake()->randomNumber($nbDigits=2);
        $shipment_width = fake()->randomNumber($nbDigits=2);
        $shipment_size = $shipment_hight*$shipment_width;
        $scheduled_date =  now()->addDay(rand(1,7))->setHour(8);
        $scheduled_date_time = $scheduled_date->addMinutes(rand(0,720));
        return [
            'delivery_start_time'=>$scheduled_date_time->format('Y-m-d H'),
            'delivery_end_time'=>$scheduled_date_time->modify('+2hour')->format('Y-m-d H'),
            'shipment_size'=>$shipment_size,
            'shipment_hight'=>$shipment_hight,
            'shipment_width'=>$shipment_width,
            'stateOfDelivery'=>fake()->boolean()
        ];
    }
}
