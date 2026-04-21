<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Guerra;
use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Asesinato;
use Illuminate\Support\Facades\File;

class GenerarBackupSeeder extends Command
{
    protected $signature = 'db:make-backup-seeder';
    protected $description = 'Genera un Seeder con todos los datos actuales de la base de datos';
    
    public function handle()
    {
        $this->info('Iniciando exportación de datos...');

        $ruta = database_path('seeders/BackupSeeder.php');
        
        $contenido = "<?php\n\nnamespace Database\Seeders;\n\nuse Illuminate\Database\Seeder;\nuse App\Models\Guerra;\nuse App\Models\Equipo;\nuse App\Models\Jugador;\nuse App\Models\Asesinato;\nuse Illuminate\Support\Facades\DB;\n\nclass BackupSeeder extends Seeder\n{\n    public function run()\n    {\n";
        
        $contenido .= "        if (DB::connection()->getDriverName() === 'sqlite') {\n";
        $contenido .= "            DB::statement('PRAGMA foreign_keys = OFF;');\n";
        $contenido .= "        } else {\n";
        $contenido .= "            DB::statement('SET FOREIGN_KEY_CHECKS=0;');\n";
        $contenido .= "        }\n\n";

        $contenido .= "        Asesinato::truncate();\n";
        $contenido .= "        Jugador::truncate();\n";
        $contenido .= "        Equipo::truncate();\n";
        $contenido .= "        Guerra::truncate();\n\n";

        //1. Exportar Guerras
        foreach (Guerra::all() as $g) {
            $nombre = addslashes($g->nombre);
            $contenido .= "        Guerra::create(['id' => {$g->id}, 'nombre' => '{$nombre}', 'estado' => '{$g->estado}', 'jugadores_equipo' => {$g->jugadores_equipo}]);\n";
        }

        //2. Exportar Equipos
        foreach (Equipo::all() as $e) {
            $nombre = addslashes($e->nombre);
            $presi = addslashes($e->presidente);
            $contenido .= "        Equipo::create(['id' => {$e->id}, 'nombre' => '{$nombre}', 'presidente' => '{$presi}', 'guerra_id' => {$e->guerra_id}]);\n";
        }

        //3. Exportar Jugadores
        foreach (Jugador::all() as $j) {
            $nombre = addslashes($j->nombre);
            $asesinado = $j->asesinadopor ?? 'null';
            $vivo = $j->vivo ? 'true' : 'false';
            $contenido .= "        Jugador::create(['nombre' => '{$nombre}', 'equipo_id' => {$j->equipo_id}, 'guerra_id' => {$j->guerra_id}, 'vivo' => {$vivo}, 'kills' => {$j->kills}, 'asesinadopor' => {$asesinado}]);\n";
        }

        //4. Exportar Asesinatos
        foreach (Asesinato::all() as $a) {
            $asesino = addslashes($a->asesino);
            $muerto = addslashes($a->muerto);
            $contenido .= "        Asesinato::create(['guerra_id' => {$a->guerra_id}, 'asesino' => '{$asesino}', 'muerto' => '{$muerto}']);\n";
        }

        $contenido .= "\n        if (DB::connection()->getDriverName() === 'sqlite') {\n";
        $contenido .= "            DB::statement('PRAGMA foreign_keys = ON;');\n";
        $contenido .= "        } else {\n";
        $contenido .= "            DB::statement('SET FOREIGN_KEY_CHECKS=1;');\n";
        $contenido .= "        }\n";

        $contenido .= "    }\n}";

        if (File::exists($ruta)) {
            File::delete($ruta);
        }
        
        File::put($ruta, $contenido);
        
        $this->info('¡Hecho! El seeder ha sido generado correctamente.');
        return 0;
    }
}