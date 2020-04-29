<?php

use App\Availability;
use Faker\Generator as Faker;

$factory->define(Availability::class, function (Faker $faker) {
    
    return [
        'employee_id' => \App\Employee::inRandomOrder()->first()->id,
        'fromTime' => $start_time->format('Y-m-d H') . ':00',
        'toTime' => $start_time->addHours(rand(1, 2))->format('Y-m-d H') . ':00',
        'exclusionDate' =>$start_time->format('Y-m-d'),
    ];
});
