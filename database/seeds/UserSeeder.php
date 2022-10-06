<?php
use App\User;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = "Simone";
        $user->email = "diprima.simone@virgilio.it";
        $user->password = bcrypt("simone17");
        $user->save();
        for($i=0;$i<10;$i++){
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = $faker->password();
            $user->save();
        }

    }
}
