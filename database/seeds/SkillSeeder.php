<?php


use Illuminate\Database\Seeder;

class SkillSeeder extends Seeder
{
    private $table = 'skills';

    private $skills = [
        'SQL',
        'PHP',
        'Java',
        'HTML',
        'CSS',
        'JavaScript',
        'C++',
        'C#',
        'XML',
        'C',
        'Perl',
        'Python',
        'Objective-C',
        'Ajax',
        'ASP.NET',
        'Ruby',
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table($this->table)->truncate();
        foreach ($this->skills as $skill) {
            DB::table($this->table)->insert([
                'name' => $skill
            ]);
        }
    }
}