<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'home',
            'home navbar',
            'home welcome',
            'home about us',
            'profile',
            'profile navbar',
            'update profile information',
            'update profile password',
            'delete profile',
            'login',
            'register',
            'categories',
            'show category',
            'add category',
            'update category',
            'delete category',
            'foods',
            'show food',
            'add food',
            'update food',
            'delete food',
            'chiefs',
            'show chief',
            'add chief',
            'update chief',
            'delete chief',
            'users',
            'add user',
            'edit user',
            'show',
            'show users',
            'roles index',
            'roles create',
            'roles show permission',
            'roles edit',
            'reservations',
            'reservations date',
            'reservations time',
            'reservations party size',
            'reservations book btn',
            'delicious food menu',
            'show food menu',
            'order now food menu',
            'contact us',
            'contact info',
            'opening hours',
            'map',
            'contact name',
            'contact email',
            'contact subject',
            'contact message',
            'contact send message btn',
            'contact page',
            'online order page',
            'online order cart',
            'online order checkout btn',
            'online order checkout form',
            'online order placeorder btn',
            'footer',


        ];
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
