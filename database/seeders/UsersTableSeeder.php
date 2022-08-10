<?php
namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
            'name' => 'Admin Admin',
            'email' => 'admin@argon.com',
            'email_verified_at' => now(),
            'password' => Hash::make('secret'),
            'type' => 1,
            'created_at' => now(),
            'updated_at' => now()
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'User User',
                'email' => 'user@argon.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'type' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Doctor Bone',
                'email' => 'Drbone@argon.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'type' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
        );
        DB::table('users')->insert(
            [
                'name' => 'Doctor Child',
                'email' => 'Drchild@argon.com',
                'email_verified_at' => now(),
                'password' => Hash::make('secret'),
                'type' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
        );
        DB::table('sexes')->insert(
            [
                'sex_name' => 'ชาย'
            ],
        );
        DB::table('sexes')->insert(
            [
                'sex_name' => 'หญิง'
            ],
        );
        DB::table('typeusers')->insert(
            [
                'typeusersname' => 'ผู้ดูแลระบบ'
            ],
        );
        DB::table('typeusers')->insert(
            [
                'typeusersname' => 'พนักงาน'
            ],
        );
        DB::table('typeusers')->insert(
            [
                'typeusersname' => 'หมอกระดูก'
            ],
        );
        DB::table('typeusers')->insert(
            [
                'typeusersname' => 'หมอเด็ก'
            ],
        );
    }
}
