<?php

namespace Database\Factories;

use App\Models\DictionaryTerm;
use App\Models\Dictionary;
use Illuminate\Database\Eloquent\Factories\Factory;

class DictionaryTermFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DictionaryTerm::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'value' => $this->faker
                ->unique()
                ->city(),
            'dictionary_id' => Dictionary::all()
                ->random()
                ->id
        ];
    }
}
