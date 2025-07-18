<?php

use App\Brand;
use App\Caso;
use App\College;
use App\Cycle;
use App\Edition;
use App\GroupsByCase;
use App\Question;
use App\Section;
use App\Student;
use App\Teacher;
use App\Traits\DatabaseTrait;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    use DatabaseTrait;

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->generateDataSql('sql/colleges.sql');

        College::where('id', 1)->update([
            'name' => 'Universidad de Lima (UL)',
        ]);

        College::where('id', 8)->update([
            'name' => 'Universidad del Pacífico (UP)',
        ]);

        College::where('id', 9)->update([
            'name' => 'Universidad Católica de Santa María (UCSM)',
        ]);

        College::where('id', 5)->update([
            'name' => 'Instituto Toulouse Lautrec (TLS)',
        ]);

        College::create([
            'name' => 'Universidad Tecnológica del Perú (UTP)',
        ]);

        College::create([
            'name' => 'Universidad Nacional Mayor de San Marcos (UNMSM)',
        ]);

        $collegeIds = [4, 35, 38];

        College::withTrashed()->whereIn('id', $collegeIds)->update([
            'is_active' => false,
        ]);

        $this->generateDataSql('sql/brands.sql');

        $brands = [
            ['Agora', 'images/2023/logo-agora.png', ''],
            ['Amarás', 'images/2023/logo-amaras.png', 'Amarás nació inspirada en la mujer peruana, hecha para resaltar y empoderar su mejor estilo natural y acompañarla en la exploración de su belleza única; sin embargo, recientemente se viralizaron algunos videos con mitos acerca del cuidado del cabello que fueron asociados a la marca. El desafío es desarrollar una estrategia de comunicación digital con el objetivo de recuperar la confianza de las consumidoras.'],
            ['Perú21', 'images/2023/logo-peru21.png', 'Perú21 ha lanzado su ePaper, un diario digital con tecnología multimedia muy superior al de su competencia. El desafío es crear una estrategia que permita incrementar las suscripciones a Perú21ePaper usando sus plataformas Perú21.pe, Perú21TV, el diario impreso y sus redes sociales. El reto es hacerlo sin publicidad pagada.'],
            ['APU', 'images/2023/logo-apu.png', ''],
            ['Sapolio', 'images/2023/logo-sapolio.png', 'Sapolio es la marca líder en limpieza del hogar en el país, pero nació cómo una marca barata y, a pesar de que sus fórmulas están en igualdad que sus competidores más caros en cuanto a su performance, no le es fácil generar credibilidad en los consumidores. El desafío es diseñar una estrategia de comunicación para ganar usuarios que compran marcas más caras y proteger su participación de mercado.'],
        ];

        foreach ($brands as $brand) {
            Brand::create([
                'name' => $brand[0],
                'image' => $brand[1],
                'description' => $brand[2],
            ]);
        }

        Brand::where('id', 1)->update([
            'image' => 'images/2023/logo-entel.png',
            'description' => 'Desarrollar una idea que promueva la responsabilidad digital, entendiéndose que el espacio digital es tan real como el físico y presenta los mismos riesgos, incluso maximizados por la tecnología.',
        ]);

        Brand::where('id', 12)->update([
            'image' => 'images/2023/logo-alacena.png',
            'description' => 'AlaCena es la marca líder de salsas de mesa en el Perú; sin embargo, aún hay una amplia oportunidad de incrementar el consumo per cápita. El desafío es diseñar una estrategia de comunicación que fomente el consumo en diferentes ocasiones y formas de uso, aportando más sabor a la vida de los peruanos.',
        ]);


        $this->generateDataSql('sql/careers.sql');
        $this->generateDataSql('sql/cycles.sql');

        $cycles = [
            [1, 'Penúltimo ciclo'],
            [2, 'Último ciclo'],
            [3, 'Acabé en 2023-I'],
        ];

        foreach ($cycles as $cycle) {
            Cycle::where('id', $cycle[0])->update([
                'name' => $cycle[1],
            ]);
        }

        $this->generateDataSql('sql/editions.sql');

        $edition = Edition::create([
            'name' => 2023,
        ]);

        $this->generateDataSql('sql/casos.sql');

        $casos = [
            [16, 'https://app.agora.pe/'],
            [12, 'https://www.alicorp.com.pe/pe/es/productos/salsas/alacena/'],
            [17, 'https://www.alicorp.com.pe/pe/es/noticias/amaras-nueva-marca-de-alicorp-para-el-cuidado-del-cabello/'],
            [18, 'https://peru21.pe/'],
            [19, 'https://cementoapu.com/'],
            [1, 'https://www.entel.pe/'],
            [20, 'https://www.alicorp.com.pe/pe/es/productos/cuidado-de-la-ropa/sapolio/'],
        ];

        foreach ($casos as $caso) {
            Caso::create([
                'edition_id' => $edition->id,
                'brand_id' => $caso[0],
                'description' => $caso[1],
                'brief' => '',
                'audio' => '',
                'visual' => '',
                'whole' => '',
            ]);
        }

        $this->generateDataSql('sql/document_types.sql');
        $this->generateDataSql('sql/students.sql');
        $this->generateDataSql('sql/teachers.sql');
        $this->generateDataSql('sql/users.sql');
        $this->generateDataSql('sql/student_user.sql');
        $this->generateDataSql('sql/sections.sql');
        $this->generateDataSql('sql/questions.sql');

        $sections = [
            [
                'SECCIÓN 1: DESAFÍO, CONTEXTO Y OBJETIVOS (25% DEL PUNTAJE TOTAL)',
                'Esta sección proporciona a los jueces los antecedentes de su desafío y objetivos. Evalúan si capturaron claramente el desafío planteado por la marca y si supieron plantear los objetivos más relevantes. Así mismo, se evalúa si han ido más allá de la información proporcionada en el brief.',
                [
                    [
                        'S1A',
                        'CONTEXTO Y DESAFÍO DE LA MARCA',
                        '¿Cuál es el desafío al que se enfrenta la marca? ¿Cuál es el contexto sobre la categoría/mercado, la marca, el entorno competitivo o de consumo que creó este desafío para la marca?',
                        '(Máximo: 300 palabras)',
                        300,
                        0,
                    ],
                    [
                        'S1B',
                        'OBJETIVOS E INDICADORES CLAVE',
                        '¿Cuáles son los objetivos que esperan alcanzar? Los objetivos deben ser medibles. Indicar por qué estos objetivos son importantes para la marca. Indicar el objetivo principal de negocio y otros objetivos específicos (sugerencia: no más de 4 objetivos). ¿Cuáles son los indicadores clave (KPI) para medir dichos objetivos y cuál es la meta para dicho KPI?',
                        '(Máximo: 150 palabras)',
                        150,
                        0,
                    ],
                    [
                        'S1C',
                        'FUENTES UTILIZADAS EN ESTA SECCIÓN',
                        'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario. Indique si la información fue proporcionada por la marca patrocinadora o si es una fuente propia (primaria o secundaria) IMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información. No inserte enlaces web, sino que debe citar el articulo o información.',
                        '(Máximo: 300 palabras)',
                        300,
                        0,
                    ],
                ],
            ],
            [
                'SECCIÓN 2: INSIGHT E IDEA ESTRATÉGICA (25% DEL PUNTAJE TOTAL)',
                'Se pide que expliquen su proceso de pensamiento e insight que formó la idea estratégica de su propuesta y su conocimiento del público objetivo. Los jueces evaluarán como enlazan el insight y la idea estratégica con el público objetivo y el desafío de la marca.',
                [
                    [
                        'S2A',
                        'POBLACIÓN OBJETIVO',
                        'Definan el público al que se intentan llegar. Hablen sobre las actitudes y comportamientos de su audiencia. Descríbanlos usando datos demográficos, hábitos de consumo, uso de medios, etc., toda la información relevante que esté relacionada con el desafío planteado y la propuesta frente a este.',
                        '(Máximo: 150 palabras)',
                        150,
                        0,
                    ],
                    [
                        'S2B',
                        'INSIGHT',
                        '¿Cuál es el Insight en base al cual están desarrollando su idea estratégica? ¿De qué manera llegaron a identificar este insight? Expliquen cómo la investigación del público objetivo, la oportunidad del mercado o las tendencias, los llevaron a este.',
                        '(Máximo: 200 palabras)',
                        200,
                        0,
                    ],
                    [
                        'S2C',
                        'IDEA ESTRATÉGICA',
                        '¿Cuál es la idea estratégica que impulsará su propuesta?',
                        '(Máximo 20 palabras)',
                        20,
                        0,
                    ],
                    [
                        'S2D',
                        'FUENTES UTILIZADAS EN ESTA SECCIÓN',
                        'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario. Indique si la información fue proporcionada por la marca patrocinadora o si es una fuente propia (primaria o secundaria) IMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información. No inserte enlaces web, sino que debe citar el articulo o información.',
                        '(Máximo: 300 palabras)',
                        300,
                        0,
                    ],
                ],
            ],
            [
                'SECCIÓN 3: DAR VIDA A LA IDEA (25% DEL PUNTAJE TOTAL)',
                'En esta sección deben brindar los detalles de cómo llevarán la idea a la vida, incluidas las estrategias creativas de comunicación y de medios; es decir, la ejecución en sí.  Los jueces buscan entender por qué eligieron tales medios y cómo se relaciona la estrategia, objetivos y audiencia con la creatividad y la elección de medios. Con las respuestas de esta sección y el video creativo, los jueces deben tener una comprensión clara de los elementos creativos que experimentaría su audiencia y cómo dichos elementos trabajaran juntos para lograr sus objetivos.',
                [
                    [
                        'S3A',
                        'EJECUCIÓN DE LA IDEA ESTRATÉGICA',
                        'Expliquen como su idea estratégica se llevará a cabo: ejecuciones, medios, acciones, etc. Proporcionar razones para tal diseño y la selección de los medios. Demuestre cómo sus ejecuciones creativas abordan el desafío, cómo funcionan juntas las estrategias creativas y de medios para llegar a su público objetivo.',
                        '(Máximo: 400 palabras)',
                        400,
                        0,
                    ],
                    [
                        'S3B',
                        'ASIGNACIÓN PRESUPUESTARIA',
                        'Enumeren los principales puntos de contacto para su propuesta y calculen el porcentaje (%) del presupuesto total que se asignará a cada uno. Justifique esta asignación. No incluye gastos de producción o de agencias.',
                        '(Máximo: 100 palabras)',
                        100,
                        0,
                    ],
                    [
                        'S3C',
                        'FUENTES UTILIZADAS EN ESTA SECCIÓN',
                        'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario. Indique si la información fue proporcionada por la marca patrocinadora o si es una fuente propia (primaria o secundaria) IMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información. No inserte enlaces web, sino que debe citar el articulo o información.',
                        '(Máximo: 300 palabras)',
                        300,
                        0,
                    ],
                ],
            ],
            [
                'SECCIÓN 4: MEDICIÓN DE RESULTADOS (25% DEL PUNTAJE TOTAL)',
                'Esta sección está directamente relacionada con la Sección 1, es decir con los objetivos y sus respectivos KPI’s. Deben explicar claramente cómo planean medir el logro de sus objetivos.',
                [
                    [
                        'S4A',
                        'METODOLOGÍA DE MEDICIÓN',
                        'Identificar la metodología que utilizarán para medir los resultados. Asegúrense de abordar la medición de todos los objetivos planteados en 1B. Sustentar las razones para utilizar dichas metodologías.',
                        '(Máximo: 200 palabras)',
                        200,
                        0,
                    ],
                    [
                        'S4B',
                        'RESULTADOS POTENCIALES',
                        '¿Cuáles son los posibles resultados de cada objetivo? ¿Tienen diversos escenarios para los resultados? ¿en qué basan sus proyecciones? Es importante que mencionen variables internas o externas que podrían impactar en estos resultados positiva o negativamente. ',
                        '(Máximo: 100 palabras)',
                        100,
                        0,
                    ],
                    [
                        'S4C',
                        'FUENTES UTILIZADAS EN ESTA SECCIÓN',
                        'Debe proporcionar la fuente de todos los datos y hechos presentados en cualquier parte del formulario. Indique si la información fue proporcionada por la marca patrocinadora o si es una fuente propia (primaria o secundaria) IMPORTANTE: Este espacio es SOLO para citar las fuentes utilizadas en la sección, no es para agregar más información. No inserte enlaces web, sino que debe citar el articulo o información.',
                        '(Máximo: 300 palabras)',
                        300,
                        0,
                    ],
                ],
            ],
            [
                'SECCIÓN 5: REEL Y FORMULARIO DE AUTORIZACIÓN',
                'REEL CREATIVO: Los participantes deben presentar una compilación que muestre la creatividad que da vida a la gran idea.  Los elementos creativos y de comunicación deben relacionarse directamente con sus objetivos estratégicos. No incluya música, vídeos o imágenes sin licencia. Se permiten las imágenes/músicas libres/en stock. El trabajo creativo se revisa como parte de la Sección 3: Ejecución, junto con sus respuestas a las preguntas 3A y 3B. OTROS ARCHIVOS: Formulario de Autorización, Confidencialidad y Cesión de derechos firmado por el tutor del equipo.',
                [
                    [
                        'S5A',
                        'INSTRUCCIONES PARA CARGAR ARCHIVOS',
                        '',
                        '',
                        0,
                        0,
                    ],
                    [
                        'TTL',
                        'TITULO DE LA PROPUESTA',
                        'Proporcione a su campaña un título que se utilizará con fines publicitarios si su caso es finalista o ganador.',
                        '(Máximo 100 caracteres)',
                        100,
                        0,
                    ],
                ],
            ],
        ];

        $year = now()->year;

        foreach ($sections as $index => $section) {
            $number = $index + 1;

            /** @var Section $sectionModel */
            $sectionModel = Section::create([
                'code' => "{$year}S{$number}",
                'title' => $section[0],
                'description' => $section[1],
                'edition_id' => $edition->id,
            ]);

            $questions = $section[2];

            foreach ($questions as $question) {
                Question::create([
                    'code' => "Q{$year}{$question[0]}",
                    'title' => $question[1],
                    'detail' => $question[2],
                    'remark' => $question[3],
                    'maxwrd' => $question[4],
                    'maxgrp' => $question[5],
                    'section_id' => $sectionModel->id,
                ]);
            }
        }

        GroupsByCase::create([
            'quantity' => 10,
        ]);

        $this->generateDataSql('sql/answers.sql');

        $teacherId = 468;

        $users = DB::table('users')->where('teacher_id', $teacherId)->get();

        $studentUser = DB::table('student_user')->whereIn('user_id', $users->pluck('id')->toArray())->get();

        $studentUserIds = $studentUser->pluck('id')->toArray();
        $userIds = $users->pluck('id')->toArray();
        $studentIds = $studentUser->pluck('student_id')->toArray();

        DB::table('student_user')->whereIn('id', $studentUserIds)->delete();
        DB::table('users')->whereIn('id', $userIds)->delete();
        DB::table('teachers')->where('id', $teacherId)->delete();
        DB::table('students')->whereIn('id', $studentIds)->delete();

        $this->generateDataSql('sql/files.sql');
        $this->generateDataSql('sql/reviews.sql');
    }
}
