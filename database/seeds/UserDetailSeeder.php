<?php
use App\User;
use App\Models\UserDetail;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();

        foreach($user_ids as $id){
            $user_detail = new UserDetail();
            $user_detail->user_id = $id;
            $user_detail->first_name = $faker->firstName();
            $user_detail->last_name = $faker->lastName();
            $user_detail->phone = $faker->phoneNumber();
            $user_detail->birthyear = $faker->year();
            $user_detail->save();
        }
    }
}
