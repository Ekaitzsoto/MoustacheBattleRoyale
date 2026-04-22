<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Guerra;
use App\Models\Equipo;
use App\Models\Jugador;
use App\Models\Actividad;
use Illuminate\Support\Facades\DB;

class BackupSeeder extends Seeder
{
    public function run()
    {
        if (DB::connection()->getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = OFF;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        }

        Actividad::truncate();
        Jugador::truncate();
        Equipo::truncate();
        Guerra::truncate();

        Guerra::create(['id' => 1, 'nombre' => 'WAR 7 septimus mortis', 'estado' => 'Creado', 'jugadores_equipo' => 10, 'max_eventos' => 5]);
        Equipo::create(['id' => 1, 'nombre' => 'Ibarrako Piparrak', 'presidente' => 'Guindi', 'guerra_id' => 1]);
        Equipo::create(['id' => 2, 'nombre' => 'Maduritos, limpios y discretos', 'presidente' => 'ALVARE', 'guerra_id' => 1]);
        Equipo::create(['id' => 3, 'nombre' => 'Todo tiene una explicación', 'presidente' => 'Don Mikel Malagón Azpeitia', 'guerra_id' => 1]);
        Equipo::create(['id' => 4, 'nombre' => 'la cienaga', 'presidente' => 'maese', 'guerra_id' => 1]);
        Equipo::create(['id' => 5, 'nombre' => 'Veleziraptor FC 🦖', 'presidente' => 'Velexxx 🔪🔪', 'guerra_id' => 1]);
        Equipo::create(['id' => 6, 'nombre' => 'GANADORES', 'presidente' => 'Todes', 'guerra_id' => 1]);
        Equipo::create(['id' => 7, 'nombre' => 'Todo bajo el cielo', 'presidente' => 'Martin', 'guerra_id' => 1]);
        Equipo::create(['id' => 8, 'nombre' => 'Looks Maxers', 'presidente' => 'Jorge', 'guerra_id' => 1]);
        Equipo::create(['id' => 9, 'nombre' => 'La generación del 98', 'presidente' => 'El Fary', 'guerra_id' => 1]);
        Equipo::create(['id' => 10, 'nombre' => 'Mujeres, os quiero😉', 'presidente' => 'Torrente', 'guerra_id' => 1]);
        Equipo::create(['id' => 11, 'nombre' => 'Olvidados', 'presidente' => 'Imprescindibles', 'guerra_id' => 1]);
        Equipo::create(['id' => 12, 'nombre' => 'Los granjeros del aura', 'presidente' => 'Danel', 'guerra_id' => 1]);
        Equipo::create(['id' => 13, 'nombre' => 'Alguien da más?', 'presidente' => 'Acoplaos', 'guerra_id' => 1]);
        Jugador::create(['nombre' => 'Álvaro', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => '🇧🇾🇧🇾Lukashenko🇧🇾🇧🇾', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'UKAN birusa', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Soto', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Punk picnic', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Menú del día', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Xi jinping🇨🇳', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'hood shrek', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'felipe colillas 🦍🦍', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Asier Esteban Sauce (AES🇪🇸🇪🇦)', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'colicos menstruales🩸(180 btw👀)', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'David Goggings 💪💪💪⛓️⛓️', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Catalina de erauso ✝️⚔️', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Andoni Brun 🎤', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Kakusain💩', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Karlos Argiñano 🔪', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'HustleHard304🐬', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'MarioVidal👔', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Olasagasti 🪓', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'SiroAntonio🚧', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Pitbull 🧑‍🦲', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Raul Carrique🚌', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Nigganyahu 🇮🇱✡️', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Carlos Kirk 🔫', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Velez ☠️', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Pepa la cerda 🐷', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Rayo Mcqueen 👑', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'jesus g maese 🗡️🛡️📜🇪🇸✅🇬🇧❌', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'nico(pitsonlypits)maduro🇻🇪free', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Mariano Albañil🧱', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Mbappe el futbolista PSOE🌹', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'The Xoukas (DAGUASEPIK) 🤓🫡', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Trombón txamp 🎺🎶🎵', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Simsimi 🌝', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Miss Spider🕷', 'equipo_id' => 6, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Cao de Benos ☭🇰🇵', 'equipo_id' => 6, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Mikel mago🧙‍♂️', 'equipo_id' => 6, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Rupolla🏳️‍🌈', 'equipo_id' => 6, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'El miedo al exito de Esteban🦝', 'equipo_id' => 6, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Qin Shi Huan🇨🇳', 'equipo_id' => 6, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Fresh 🌱🥔🍝🧟', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Solarpunk ☀️🤘🎸', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Mikel (múltiple)🪂🪄🥋🎸', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Martin', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Lobo estepario 🐺💪🌅', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => '✨𝓑 arbara✨', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Donal Tromp 🇺🇲🦅🍊', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'El padre de Jorge 🦖🦕🗺️', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Antxon Jostuna Errota 🔫👮‍♂️🪑', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Polla común 🍆🍌🥒', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Ábalos el incomprendido🤟🏼😔', 'equipo_id' => 1, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Jorge', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'La polla de Osane 🍆🤤', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Pablo Motos 🏍', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Netanyahunium 🇮🇱🔺️', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => '✨️🧜‍♂️Sissy Male 🧜‍♂️✨️', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Ke carlista ⛪🤴❤️', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'alvarito piscinas 🏊‍♂️🏊‍♂️', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Transición de Tigre Chen ☯️🚪🎞️', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Puigdemont 💋🇪🇸🎗️', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Antagonista de Zhang Yimou ⚔️', 'equipo_id' => 7, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'David VARA', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Asier esclavo creador de web', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Oihan y el Maruf iceClimbers', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Gabi de la maza', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'LOMO', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Mikel La(boa)*Víbora', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'RAFA NADAL (se deja la piel)', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Arnaldo otegUi', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'El amigo inoportuno', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Abderramán 3º Chicote', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'NonServium (SomosSkinhead)', 'equipo_id' => 3, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Marcos AKA el Espía', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'EKAIN (larra)', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Osane (sin polla)', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'La Raka', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Ainize la Sugar Mami', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Izargi/Garpi/Isargüi/etc', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => '🌈✨️🐬Chupapollas 🐬✨️🌈', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Júlia 朱莉娅', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'La pobre mujer de IPman', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'ME HA LLAMADO PALMERA🌴', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'el bebe askatasuna👶🦅', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => '🕺ji-ji Auuh (Mijael Jason)', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'jovani vazquez skrrrr', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Ayuso🔪👵🏼👴🏼', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Jordi wild 🤘🎙️🥵', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Mauricio Colmenero 👨🏻🇪🇸🥘', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Kabuto 🪲🚬🍁', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'QuieroSerNegro 🖤🍗🍉🗽', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Hormiga independentzia 🇵🇲🐜', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Chuck Norris 🤠🧔👊🎬', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Alex del ethereum (amigo pipo)', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Danel👑', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Las huntrx💃🏹👩🏻‍🎤', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Quien tiene arrazon? 👩‍⚖️🧑‍⚖️', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Sabrina la carpentera 🎤🪓', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'El meteorólogo adivino ☯️🐓💨', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Leticia sabater 🎤', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Hombgres aleghres ⚔️🥖', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Lord farquad 👉🏼👑👈🏼', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'jeff (yearchallenge) 🥸', 'equipo_id' => 4, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Pernando Alontxo 🏁🏎️', 'equipo_id' => 5, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Nicolae Ceaucescu 👞🇷🇴', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Lynnspirit', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'El fantasma de guadalajara👻👻', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Takolo (Mamu bertsioa)👻', 'equipo_id' => 11, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'El hombre blandengue🏳️‍🌈', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Ken🐎👱🏻‍♂️🤠', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Gitano esotérico ✝️💨🇮🇳', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Yoshitsugu Yamamoto🍺🇯🇵🇯🇵', 'equipo_id' => 13, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Don quijote de la marcha 🪶📜', 'equipo_id' => 13, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'El pequeño Nicolás 📸🤳💸', 'equipo_id' => 13, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Los reyes magos 💫🎁🐫', 'equipo_id' => 2, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Esnal 🤓☝️', 'equipo_id' => 9, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'La costurera veloz🪡🏎️', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Dumbell burpie over the head..', 'equipo_id' => 12, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'MOCTEZUMA 🦚🇲🇽😡', 'equipo_id' => 13, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'Te gusta el cachopo? 🥩', 'equipo_id' => 8, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);
        Jugador::create(['nombre' => 'LARAÑA 🕷️🫦 (enamoro a todas)', 'equipo_id' => 10, 'guerra_id' => 1, 'vivo' => true, 'kills' => 0, 'asesinadopor' => null]);

        if (DB::connection()->getDriverName() === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        } else {
            DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        }
    }
}