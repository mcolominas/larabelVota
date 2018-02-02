<?php

use Illuminate\Database\Seeder;
use App\Permiso;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        self::seedPermiso();
        self::seedUsuario();
		$this->command->info('Tabla catálogo inicializada con datos!');
    }
    private function seedPermiso(){
    	DB::table('permisos')->delete();
    	$p = new Permiso;
    	$p ->nombre = "Invitado";
    	$p ->descripcion = "Persona invitada, aun no se ha registrado en la web";
    	$p->save();

    	$p = new Permiso;
    	$p ->nombre = "Normal";
    	$p ->descripcion = "Persona registrada, solamente puede votar a las encuestas que esta invitado";
    	$p->save();

    	$p = new Permiso;
    	$p ->nombre = "Admin";
    	$p ->descripcion = "Persona registrada, solamente puede crear encuestas e invitar a otras personas.";
    	$p->save();
    }
    private function seedUsuario(){
        DB::table('users')->delete();
    	$p = new User;
    	$p ->name = "admin";
    	$p ->email = "test@test.es";
    	$p ->password = "1234";
    	$p->save();
    	$p = new User;
    	$p ->name = "admin";
    	$p ->email = "test@test.com";
    	$p ->password = "1234";
    	$p->save();
    }
}
