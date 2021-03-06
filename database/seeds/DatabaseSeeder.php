<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(EntryQuizSeeder::class);
        $this->call(EntryQuestionsSeeder::class);
        $this->call(EntryAnswersSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(UserCourseSeeder::class);
        $this->call(Users_rolesSeeder::class);
    }
}
