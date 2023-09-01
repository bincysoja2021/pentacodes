<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class Blogseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('blog')->insert([
            'title'         => "new posts",
            'subtitle'      => "new posts sub",
            'user_id'       => 1,
            'description'   => "User Registration.

 

                                Authentication with username and password.



                                CRUD functionality (Create / Read / Update / Delete) for  Blogs.



                                Blogs must have a title, subtitle, image, and description.



                                Use database migrations to create schemas.



                                Use MySQL database.



                                Use Laravel’s/ Codeignitor validation function, using Request classes and client-side validations also.

                                ",
            'image'           => "http://127.0.0.1:8000/assets/image/1693550618.jpg",
            'status'          => "active",
            'created_at'      => "2023-09-01 08:05:25"                    
        ]);
    }
}
