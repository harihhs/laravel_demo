<?php

use Illuminate\Database\Seeder;

class MetricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $metricsdata = [
			["metric_name" => "Digest", "img_name" => "", "enabled" => "1", "allow_multiple" => "1"],
            ["metric_name" => "Poop", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Tummy", "img_name" => "", "enabled" => "1", "allow_multiple" => "1"],
            ["metric_name" => "Weight", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Mood", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Focus", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Productivity", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Energy", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Social", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Sleep", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Cravings", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Exercise", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Daily Foods", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Healthy Eating", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Calorie Load", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Healthy Fats", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Fiber", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Sugar", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Water", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Carbonated Drinks", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
            ["metric_name" => "Fasting", "img_name" => "", "enabled" => "1", "allow_multiple" => "0"],
        ];
        DB::table('metrics')->insert($metricsdata);
    }
}
