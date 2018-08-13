<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $author = \App\Role::create([
      'name'        => 'administrador',
      'permissions' => json_encode([
          'crear-rz' => true,
          'modificar-rz'  => true
      ]),
  ]);
  $empleado = \App\Role::create([
      'name'        => 'empleado',
      'permissions' => json_encode([
          'crear-rz'  => true
          //'publish-vj' => true
      ]),
  ]);

    }
}
