<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
Use Spatie\Permission\Models\Permission;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user  = User::create([
            'email'=>'admin@inmobiliaria.com',
            'name'=>'Inmobiliaria Nacional',
            'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'
        ]);

       $p1 =  Permission::create(['name'=>'Agregar noticias']);
       $p2 =  Permission::create(['name'=>'Editar noticias']);
       $p3 =  Permission::create(['name'=>'Eliminar noticias']);
       $p4 =  Permission::create(['name'=>'Agregar usuarios']);
       $p5 =  Permission::create(['name'=>'Editar usuarios']);
       $p6 =  Permission::create(['name'=>'Eliminar usuarios']);
       $p7 =  Permission::create(['name'=>'Agregar banner']);
       $p8 =  Permission::create(['name'=>'Editar banner']);
       $p9 =  Permission::create(['name'=>'Eliminar banner']);
       $p10 =  Permission::create(['name'=>'Agregar empresa']);
       $p11 =  Permission::create(['name'=>'Editar empresa']);
       $p12 =  Permission::create(['name'=>'Eliminar empresa']);
       $p13 =  Permission::create(['name'=>'Agregar empresa con sello']);
       $p14 =  Permission::create(['name'=>'Editar empresa con sello']);
       $p15 =  Permission::create(['name'=>'Eliminar empresa con sello']);
       $p16 =  Permission::create(['name'=>'Agregar roles']);
       $p17 =  Permission::create(['name'=>'Editar roles']);
       $p18 =  Permission::create(['name'=>'Eliminar roles']);




        $role = Role::create(['name'=>'administrador'])->givePermissionTo([$p1,$p2,$p3,$p4,$p5,$p6,$p7,$p8,$p9,$p10,$p11,$p12,$p13,$p14,$p15,$p16,$p17,$p18]);

        $user->assignRole($role);
    }
}
