<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $role1 = [
        //     [
        //         'slug'=>'hola','name' => 'PROFESOR',
        //         'guard_name' => 'web',
        //     ],
        //     [
        //         'slug'=>'hola','name' => 'ESTUDIANTE',
        //         'guard_name' => 'web',
        //     ],
        //     [
        //         'slug'=>'hola','name' => 'ADMINISTRADOR',
        //         'guard_name' => 'web',
        //     ],
        // ];
      
        // foreach($role1 as $rol)
        // {
        //     DB::table('roles')->insert($rol);
        // }

        $role1=Role::create(['slug'=>'adnub','name'=>'ADMINISTRADOR']);
        $role2=Role::create(['slug'=>'profesor','name'=>'PROFESOR']);
        $role3=Role::create(['slug'=>'estudiante','name'=>'ESTUDIANTE']);

      //  Permission::create(['slug'=>'hola','name' => 'home.page', 'description'=>'Ver la página principal'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['slug'=>'hola','name' => 'teacher.request', 'description'=>'Solicitar ser profesor'])->syncRoles([$role3]);
        Permission::create(['slug'=>'hola','name' => 'admin.home', 'description'=>'Ver el panel de administración'])->syncRoles([$role1]);

        Permission::create(['slug'=>'hola','name' => 'admin.admins.index', 'description'=>'Ver la lista de administradores'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.admins.create', 'description'=>'Crear administradores'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.admins.edit', 'description'=>'Editar administrador'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.admins.destroy', 'description'=>'Eliminar administrador'])->assignRole($role1);

        Permission::create(['slug'=>'hola','name' => 'admin.users.index', 'description'=>'Ver la lista de usuarios'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.users.create', 'description'=>'Crear usuarios'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.users.edit', 'description'=>'Editar usuario'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.users.destroy', 'description'=>'Eliminar usuario'])->assignRole($role1);

        Permission::create(['slug'=>'hola','name' => 'admin.courses.index', 'description'=>'Ver la lista de formaciones'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.courses.create', 'description'=>'Crear formación'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.courses.edit', 'description'=>'Editar formación'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.courses.destroy', 'description'=>'Eliminar formación'])->syncRoles([$role1]);

        Permission::create(['slug'=>'hola','name' => 'admin.lesson.create.course', 'description'=>'Crear clase de curso'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.lessons.index', 'description'=>'Ver la lista de clases'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.lessons.create', 'description'=>'Crear clases'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.lessons.edit', 'description'=>'Editar clase'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.lessons.destroy', 'description'=>'Eliminar clase'])->syncRoles([$role1]);

        Permission::create(['slug'=>'hola','name' => 'admin.students.index', 'description'=>'Ver la lista de estudiantes'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.students.create', 'description'=>'Crear estudiantes'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.students.edit', 'description'=>'Editar estudiante'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.students.destroy', 'description'=>'Eliminar estudiante'])->assignRole($role1);

        Permission::create(['slug'=>'hola','name' => 'admin.teachers.index', 'description'=>'Ver la lista de instructores'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.teachers.create', 'description'=>'Crear instructores'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.teachers.edit', 'description'=>'Editar instructor'])->assignRole($role1);
        Permission::create(['slug'=>'hola','name' => 'admin.teachers.destroy', 'description'=>'Eliminar instructor'])->assignRole($role1);
        
        Permission::create(['slug'=>'hola','name' => 'admin.experience.index', 'description'=>'Ver la lista de experiences'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.experience.create', 'description'=>'Crear experiences'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.experience.edit', 'description'=>'Editar experiences'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.experience.destroy', 'description'=>'Eliminar experiences'])->syncRoles([$role1]);

        Permission::create(['slug'=>'hola','name' => 'admin.tags.index', 'description'=>'Ver la lista de categorías'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.tags.create', 'description'=>'Crear categoría'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.tags.edit', 'description'=>'Editar categorías'])->syncRoles([$role1]);
        Permission::create(['slug'=>'hola','name' => 'admin.tags.destroy', 'description'=>'Eliminar categorías'])->syncRoles([$role1]);

        
    }
}