<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
   /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputan['name'] = 'admin ivent';
        $inputan['email'] = 'admin@ivent.com';//ganti pake emailmu
        $inputan['password'] = Hash::make('123256');//passwordnya 123256
        $inputan['no_tlp'] = '082345362110';
        $inputan['alamat'] = 'sleman';
        $inputan['role'] = 'admin';//kita akan membuat akun atau users in dengan role admin
        User::create($inputan);

    }
}
