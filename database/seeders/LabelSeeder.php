<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Label;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labels = [
            "bug",
            "documentation",
            "duplicate",
            "enhancement"
        ];
        foreach ($labels as $label) {
            $label = new Label();
            $label->name = $label;
            $label->description;
            $label->save();
        }
    }
}
