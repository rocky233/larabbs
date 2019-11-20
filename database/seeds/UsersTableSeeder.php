<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 获取实例
        $faker = app(Faker\Generator::class);

        // 头像数据
        $avatars = [
            'http://file.qqtouxiang.com/nvsheng/2019-09-12/9648a13f6ddb46c7608aef4ba70c2cc4.jpeg',
            'http://file.qqtouxiang.com/nvsheng/2019-09-12/489ebb5ef31708935399a290bd24fdb2.jpeg',
            'http://file.qqtouxiang.com/nvsheng/2019-09-12/0e1a38002170adb489b688d1de831e1f.jpeg',
            'http://file.qqtouxiang.com/qinglv/2019-09-10/77ac78cffe768c6739c9ca9b6d06b0cd.jpg',
            'http://file.qqtouxiang.com/qinglv/2019-09-10/d0b32f43226188d8ed65ceb19178011d.jpg',
            'http://file.qqtouxiang.com/qinglv/2019-09-10/77ac78cffe768c6739c9ca9b6d06b0cd.jpg',
        ];

        // 生成数据合集
        $users = factory(User::class)->times(10)->make()->each(function ($user, $index) use ($faker, $avatars) {
            $user->avatar = $faker->randomElement($avatars);
        });

        // 数据隐藏
        $user_array = $users->makeVisible(['password', 'remember_token'])->toArray();

        // 插入到数据库中
        User::insert($user_array);

        $user = User::find(1);
        $user->name = 'admin';
        $user->email = "admin@qq.com";
        $user->password = Hash::make(123456);
        $user->setRememberToken(Str::random(60));
        $user->save();


        $user->assignRole('Founder');
        $user = User::find(2);
        $user->assignRole('Maintainer');
    }
}
