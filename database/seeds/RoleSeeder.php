<?php

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {
         $Admin =    new Role();$Admin->nombre = 'Admin';$Admin->descripcion = 'Administrador';$Admin->save();
         $FacEsc =   new Role();$FacEsc->nombre = 'FacEsc';$FacEsc->descripcion = 'Facultad o Escuela';$FacEsc->save();
         $AgUnam =   new Role();$AgUnam->nombre = 'AgUnam';$AgUnam->descripcion = 'Archivo Gral. UNAM';$AgUnam->save();
         $Jud =      new Role();$Jud->nombre = 'Jud';$Jud->descripcion = 'DCERCONDOC';$Jud->save();
         $Sria =     new Role();$Sria->nombre = 'Sria';$Sria->descripcion = 'DCERCONDOC';$Sria->save();
         $JSecc =    new Role();$JSecc->nombre = 'JSecc';$JSecc->descripcion = 'DCERCONDOC';$JSecc->save();
         $JArea =    new Role();$JArea->nombre = 'JArea';$JArea->descripcion = 'DCERCONDOC';$JArea->save();
         $Ofnista =  new Role();$Ofnista->nombre = 'Ofisi';$Ofnista->descripcion = 'DCERCONDOC';$Ofnista->save();
         $Invitado = new Role();$Invitado->nombre = 'Invit';$Invitado->descripcion = 'Invitado';$Invitado->save();     }
}
