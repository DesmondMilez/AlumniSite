<?php


use Illuminate\Database\Seeder;

class SmerSeeder extends Seeder
{
    private $table = 'smerovi';

    private $values = [
        'Компјутерски науки и инженерство (КНИ)',
        'Примена на е-технологии (ПЕТ)',
        'Мрежни технологии (МТ)',
        'Компјутерска едукација (KE)',
        'Информатика и компјутерско инженерство (ИКИ)',
        'Академски студии по информатика (АСИ)',
        'Професионални студии по информатика (ПСИ)',
        'Професионални студии по информатички технологии (ПИТ)'
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();
        foreach ($this->values as $value) {
            DB::table($this->table)->insert([
                'name' => $value
            ]);
        }
    }
}