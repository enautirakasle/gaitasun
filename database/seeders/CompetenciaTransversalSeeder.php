<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompetenciaTransversalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //bigarren hezkuntzako konpetentzia transbersalak
        \App\Models\CompetenciaTransversal::create([
            'nombre' => 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia',
            'descripcion' => 'Hitzezko eta hitzik gabeko komunikazioa eta komunikazio digitala modu osagarrian erabiltzea, ganoraz eta egoki komunikatu ahal izateko egoera pertsonal, sozial eta akademikoetan.',
        ]);

        \App\Models\CompetenciaTransversal::create([
            'nombre' => 'Ikasten eta pentsatzen ikasteko konpetentzia',
            'descripcion' => 'Ikasteko eta lan egiteko ohiturak, ikasteko estrategiak eta pentsamendu zorrotza izatea, eta ikasitakoa mobilizatzea eta beste testuinguru eta egoera batzuetara eramatea, norberaren ikaskuntza modu autonomoan antolatzeko.',
        ]);

        \App\Models\CompetenciaTransversal::create([
            'nombre' => 'Elkarbizitzarako konpetentzia',
            'descripcion' => 'Pertsonen arteko, taldeko eta komunitateko egoeretan elkarrekikotasunez parte hartzea, eta norberari aitortutako eskubideak eta betebeharrak besteri aitortzea, norberaren zein guztion ongirako.',
        ]);

        \App\Models\CompetenciaTransversal::create([
            'nombre' => 'Ekimenerako eta ekiteko espiriturako konpetentzia',
            'descripcion' => 'Ekimena izatea eta ekite-prozesua erabakitasunez eta eraginkortasunez kudeatzea testuinguru eta egoera pertsonal, sozial, akademiko eta lanekoetan, ideiak ekintza bihurtzeko.',
        ]);

        \App\Models\CompetenciaTransversal::create([
            'nombre' => 'Izaten ikasteko konpetentzia',
            'descripcion' => 'Bizitzan zehar agertzen diren sentimendu, pentsamendu eta ekintza pertsonalez gogoeta egitea eta haiek sendotzea edo egokitzea, haien gaineko balorazioaren arabera, bere burua etengabe hobetuz pertsona osorik errealizatzeko. ',
        ]);

        // //lanbide heziketako konpetentzia transbersalak
        //  \App\Models\CompetenciaTransversal::create([
        //     'nombre' => 'Pertsonala',
        //     'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);

        //  \App\Models\CompetenciaTransversal::create([
        //     'nombre' => 'Ekintzailea',
        //     'descripcion' => 'Ekimena izatea eta ekite-prozesua erabakitasunez eta eraginkortasunez kudeatzea testuinguru eta egoera pertsonal, sozial, akademiko eta lanekoetan, ideiak ekintza bihurtzeko.',
        // ]);

        //  \App\Models\CompetenciaTransversal::create([
        //     'nombre' => 'Komunikazioa',
        //     'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);

        //  \App\Models\CompetenciaTransversal::create([
        //     'nombre' => 'Elkarlanekoa',
        //     'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);

        //  \App\Models\CompetenciaTransversal::create([
        //     'nombre' => 'Digitala',
        //     'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);


        //  \App\Models\CompetenciaTransversal::create([
        //     'nombre' => 'Jasangarritasuna',
        //     'descripcion' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.',
        // ]);

        


    }
}
