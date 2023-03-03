<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttachmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Generate the attachment 1
        \App\Models\Attachment::factory()->create([
            'id' => 1,
            'file_name' => 'default_category.jpg',
            'file_path' => 'uploads/default_category.bin',
            'file_type' => 'image/jpeg',
            'user_id' => User::where('email', 'admin@lphegibide.com')->first()->id,
            'is_public' => true,
        ]);

        //Generate the attachment 2
        \App\Models\Attachment::factory()->create([
            'id' => 2,
            'file_name' => 'default_product.jpg',
            'file_path' => 'uploads/default_product.bin',
            'file_type' => 'image/jpeg',
            'user_id' => User::where('email', 'admin@lphegibide.com')->first()->id,
            'is_public' => true,
        ]);
    }
}
