<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Provider\Fakecar;


class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bio = 'At [Business Name], we are passionate about blending traditional craftsmanship with modern innovation to create unique, high-quality artisan products. Founded in [Year], we have proudly served the community with a dedication to perfection, sustainability, and personalized service.Our journey began with a deep love for [craft type, e.g., woodworking, metalwork, textile creation, etc.], a skill that has been passed down through generations in our family. Over the years, we’ve honed our craft, embracing both time-honored techniques and the latest advancements in design and materials. This allows us to offer products that are not only beautiful but also built to stand the test of time.';
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'created_at' => now(),
            'role_id' => 2,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'phone_no' => $this->faker->phoneNumber(),
            'work_phone_no' => $this->faker->phoneNumber(),
            'lga_id' => $this->faker->numberBetween(1, 767),
            'state_id' => $this->faker->numberBetween(1, 35),
            'service_id' => $this->faker->numberBetween(1, 9),
            'subservice_id' => $this->faker->numberBetween(2, 9),
            'yrs_of_expertise' => $this->faker->numberBetween(1, 25),
            'work_address' => $this->faker->address(),
            'bio' => $bio,
            'passport' => $this->faker->randomElement(['assets/images/users/avatar-1.jpg','assets/images/users/avatar-2.jpg', 'assets/images/users/avatar-3.jpg', 'assets/images/users/avatar-4.jpg', 'assets/images/users/avatar-5.jpg', 'assets/images/users/avatar6-.jpg', 'assets/images/users/avatar-7.jpg','assets/images/users/avatar-8.jpg']),
            'id_doc' => $this->faker->randomElement(['assets/images/users/avatar-1.jpg','assets/images/users/avatar-2.jpg', 'assets/images/users/avatar-3.jpg', 'assets/images/users/avatar-4.jpg', 'assets/images/users/avatar-5.jpg', 'assets/images/users/avatar6-.jpg', 'assets/images/users/avatar-7.jpg','assets/images/users/avatar-8.jpg']),
            'status' => 0,
            'is_profile_complete' => 1
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
