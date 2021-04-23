<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $role_super_admin = Role::where('name','super-admin')->get();
        $role_admin = Role::where('name','admin')->get();
        $role_user = Role::where('name','user')->get();
        $com = "Overall Heuristic";
        $com1 = $this->faker->company;


        $user= User::create([
            'name' => $this->faker->name,
            'email' => 'dplumptre@yahoo.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone'=> '08023377447',
            'broker_name'=> $com,
            'member'=> "OHAPP",
            'broker_slug'=> Str::slug($com, '-'),
        ]);

        $user->roles()->attach($role_super_admin);


        $user= User::create([
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone'=> '08183373547',
            'broker_name'=> $com1,
            'member'=> "UBAS",
            'broker_slug'=> Str::slug($com1, '-'),
        ]);

        $user->roles()->attach($role_admin);


        return [
            // 'name' => $this->faker->name,
            // 'email' => $this->faker->unique()->safeEmail,
            // 'email_verified_at' => now(),
            // 'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            // 'remember_token' => Str::random(10),
            // 'vendor_id'=> $this->faker->numberBetween($min = 1, $max = 4),
            // 'vendor_role'=> 'admin'

        ];

        
    }
}
