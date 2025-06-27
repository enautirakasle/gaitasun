<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Indicador;
use App\Models\CompetenciaTransversal;

class IndicadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Indicador::create([
            'nombre' => 'Ha expresado sus ideas con claridad durante una exposición oral.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha utilizado correctamente el vocabulario técnico en una presentación.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha demostrado habilidades de escucha activa durante una discusión grupal.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha redactado un informe técnico con claridad y precisión.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha enviado mensajes digitales con errores graves de expresión o sin adecuación al destinatario.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha utilizado un vocabulario inapropiado o incorrecto en una presentación.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'No ha escuchado activamente ni respetado los turnos de palabra en una discusión grupal.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha redactado informes con falta de claridad, errores o sin precisión.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha mantenido contacto visual con su interlocutor durante una conversación.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha utilizado gestos y postura adecuados para reforzar su mensaje.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha evitado el contacto visual o ha mostrado una postura corporal cerrada.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha mostrado desinterés evidente (bostezos, mirar el móvil, distraerse) durante las intervenciones de otros.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Hitzez, hitzik gabe eta modu digitalean komunikatzeko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha realizado preguntas para aclarar dudas durante la explicación.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha organizado su tiempo de trabajo en clase siguiendo un plan previo (ej. lista de tareas, agenda).',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha utilizado estrategias como subrayar, esquemas o resúmenes para sintetizar información.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha transferido un concepto aprendido a un ejemplo práctico o problema nuevo.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha revisado sus errores en ejercicios anteriores y los ha corregido de forma autónoma.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Se ha expresado con claridad al explicar cómo resolvió una tarea (metacognición).',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha colaborado con compañeros para resolver dudas, mostrando comprensión del tema.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha buscado información complementaria (libros, digital) para profundizar en un tema.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'No ha iniciado la tarea a pesar de tener instrucciones claras.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha necesitado recordatorios constantes para seguir el ritmo de la clase.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha copiado respuestas de compañeros sin intentar comprender el proceso.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Se ha distraído frecuentemente (ej. mirando el móvil, hablando de temas no académicos).',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha abandonado la tarea ante la primera dificultad, sin buscar ayuda o alternativas.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'No ha corregido errores repetidos a pesar de haber recibido retroalimentación.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Ha mostrado resistencia a usar herramientas de organización (agenda, checklist).',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);
        Indicador::create([
            'nombre' => 'Se ha expresado con frases como "no sé hacerlo" sin intentar analizar el problema.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ikasten eta pentsatzen ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha ignorado las normas acordadas del grupo durante el trabajo cooperativo.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Elkarbizitzarako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha respetado turnos de palabra y ha escuchado activamente a sus compañeros.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Elkarbizitzarako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Se ha burlado de un compañero o ha hecho comentarios despectivos en una dinámica grupal.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Elkarbizitzarako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha mediado en un conflicto proponiendo soluciones pacíficas y justas.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Elkarbizitzarako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha mostrado actitudes excluyentes o ha evitado colaborar con ciertos compañeros.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Elkarbizitzarako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha contribuido activamente al bienestar del grupo mostrando empatía y apoyo.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Elkarbizitzarako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha esperado instrucciones constantemente sin tomar la iniciativa para comenzar la tarea.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ekimenerako eta ekiteko espiriturako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha propuesto ideas creativas para mejorar el desarrollo de una actividad o proyecto.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ekimenerako eta ekiteko espiriturako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha evitado asumir responsabilidades en el grupo cuando se le ha solicitado.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ekimenerako eta ekiteko espiriturako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha iniciado una tarea o actividad sin que se lo indicaran, mostrando autonomía.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ekimenerako eta ekiteko espiriturako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha mostrado pasividad frente a problemas o situaciones que requerían acción.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ekimenerako eta ekiteko espiriturako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha organizado eficazmente los recursos y tiempos para llevar a cabo una actividad.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Ekimenerako eta ekiteko espiriturako konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha reaccionado de forma impulsiva ante una corrección, sin aceptar la crítica.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Izaten ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha mostrado seguridad al expresar su opinión, respetando a los demás.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Izaten ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha evitado asumir sus errores, culpando a otros o negando responsabilidad.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Izaten ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha reconocido sus errores y ha mostrado disposición a mejorar.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Izaten ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha mostrado actitudes de desmotivación o desprecio hacia su propio trabajo.',
            'valor' => '-1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Izaten ikasteko konpetentzia')->first()->id,
        ]);

        Indicador::create([
            'nombre' => 'Ha demostrado constancia y esfuerzo personal incluso ante dificultades.',
            'valor' => '1',
            'competencia_transversal_id' => CompetenciaTransversal::where('nombre', 'Izaten ikasteko konpetentzia')->first()->id,
        ]);
    }
}
