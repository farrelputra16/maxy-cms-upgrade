<?php

namespace Modules\Quiz\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class QuizDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call("OthersTableSeeder");
        $count_quiz = DB::table('course_module as cm')
        ->where('cm.type', 'quiz')
        ->count();

        if($count_quiz > 0){
            $this->call(DeleteQuizSeederTableSeeder::class);
        }

    }
}
