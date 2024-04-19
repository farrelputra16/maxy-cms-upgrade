<?php

namespace Modules\Quiz\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DeleteQuizSeederTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // get all quiz modules
        $modules = DB::table('course_module')
        ->where('type', 'quiz')
        ->get();

        foreach ($modules as $mod){
            // get all quiz class modules
            $class_module = DB::table('course_class_module')
            ->where('course_module_id', $mod->id)
            ->get();

            foreach($class_module as $ccmod){
                // delete all quiz grades
                $grade = DB::table('course_class_member_grading')
                ->where('course_class_module_id', $ccmod->id)
                ->get();
                foreach($grade as $g){
                    $delete_grade = DB::table('course_class_member_grading')
                    ->where('id', $g->id)
                    ->delete();
                }

                // delete all quiz logs
                $log = DB::table('course_class_member_log')
                ->where('course_class_module_id', $ccmod->id)
                ->get();
                foreach($log as $l){
                    $delete_log = DB::table('course_class_member_log')
                    ->where('id', $l->id)
                    ->delete();
                }

                // delete all quiz class modules
                // dd($ccmod);
                $delete_ccmod = DB::table('course_class_module')
                ->where('id', $ccmod->id)
                ->delete();
            }

            // delete all quiz modules
            $delete_mod = DB::table('course_module')
            ->where('id', $mod->id)
            ->delete();
        }
    }
}
