<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Call seeders in order: PermissionSeeder -> RoleSeeder -> UserSeeder -> CategorySeeder -> ProductSeeder -> AuthorSeeder -> ArticleSeeder -> AudienceSeeder -> SubscriptionSeeder -> CommentSeeder
        $this->call([
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            CategorySeeder::class,
            ProductSeeder::class,
            AuthorSeeder::class,
            ArticleSeeder::class,
            AudienceSeeder::class,
            SubscriptionSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
