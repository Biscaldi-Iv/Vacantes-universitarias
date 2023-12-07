<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Catedra;
use App\Models\PersonalUniversidad;
use App\Models\Postulacion;
use App\Models\Universidad;
use App\Models\User;
use App\Models\Usuario;
use App\Models\Vacantes;
use App\Models\tipoPreguntas;
use App\Models\Preguntas;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {



        Universidad::factory()->create(['nombreUniversidad' => 'UTN', 'emailRRHH' => 'info@utn.edu.ar', 'sitioWeb' => 'utn.edu.ar']); //1
        Universidad::factory()->create(['nombreUniversidad' => 'UNR', 'emailRRHH' => 'info@unr.edu.ar', 'sitioWeb' => 'unr.edu.ar']); //2
        Universidad::factory()->create(['nombreUniversidad' => 'UCA', 'emailRRHH' => 'info@uca.edu.ar', 'sitioWeb' => 'uca.edu.ar']); //3
        Universidad::factory()->create(['nombreUniversidad' => 'Austral', 'emailRRHH' => 'info@austral.edu.ar', 'sitioWeb' => 'austral.edu.ar']); //4

        User::factory()->create(['email' => 'admin@admin.com', 'privilegio' => 3]); //1
        User::factory()->create(['email' => 'user@user.com','privilegio' => 1]); //2
        User::factory()->create(['email' => 'jefe@utn.edu.ar','privilegio' => 2]); //3
        User::factory()->create(['email' => 'jefe@unr.edu.ar','privilegio' => 2]); //4
        User::factory()->create(['email' => 'jefe@uca.edu.ar','privilegio' => 2]); //5

        Usuario::factory()->create(['fkiduser' => 2, 'titulos' => 'Ing. en Sistemas de Información, Profesorado de Matemáticas', 'experiencia'=> 'Universidad Austral: Impartir clases en el Departamento de Ingeniería en Sistemas a estudiantes de pregrado en asignaturas relacionadas al campo de las Matemáticas. ', 'con_asignatura' => 'Imparti clases de Cálculo I, II y III, Matemáticas Discretas, Álgebra y Geometría.', 'congresos' => 'Participación en CoNaIISI, presentación de Paper', 'publicaciones' => 'www.example.com/my-paper', 'educacion'=> 'Universidad Tecnológica Nacional (Título: Ingeniería en Sistemas), Universidad Nacional Rosario (Título: Profesorado en Matemáticas)', 'investigaciones'=> '']);

        Catedra::factory()->create(['fkIdUniversidad' => 1, 'nombreCatedra'=>'Matemática Superior', 'descripcion'=>'La cátedra de Matemática Superior se enfoca en conceptos avanzados dentro del ámbito matemático. Explora temas como álgebra abstracta, teoría de números, análisis complejo y ecuaciones diferenciales avanzadas. Se profundiza en la comprensión de estructuras matemáticas fundamentales y sus aplicaciones, preparando a los estudiantes para abordar problemas más complejos y abstractos en diversas áreas de las ciencias y la ingeniería.']);

        Catedra::factory()->create(['fkIdUniversidad' => 1, 'nombreCatedra'=>'Legislación', 'descripcion'=>'
        La cátedra de Legislación se centra en el estudio y comprensión del marco legal que rige una sociedad. Este curso abarca aspectos fundamentales del sistema legal, incluyendo la estructura del sistema judicial, la creación y aplicación de leyes, los derechos y responsabilidades legales de los individuos y entidades, así como el análisis de diferentes áreas del derecho, como civil, laboral, comercial o penal. ']);

        Catedra::factory()->create(['fkIdUniversidad' => 1, 'nombreCatedra'=>'Comunicaciones', 'descripcion'=>'La cátedra de Comunicaciones se centra en el estudio de los fundamentos teóricos y prácticos de la comunicación en sus diversas formas y contextos. Explora cómo se transmiten, reciben y procesan los mensajes en diferentes medios y plataformas, abarcando áreas como la comunicación interpersonal, la comunicación organizacional, los medios de comunicación masiva, la comunicación digital y la teoría de la comunicación.']);

        Catedra::factory()->create(['fkIdUniversidad' => 1, 'nombreCatedra'=>'Redes', 'descripcion'=>'La cátedra de Redes se enfoca en el estudio de los fundamentos teóricos y prácticos de las redes de comunicación. Esta materia explora los conceptos clave de las redes informáticas, incluyendo la arquitectura, protocolos, topologías, seguridad y tecnologías asociadas con la transmisión de datos entre dispositivos interconectados. ']);

        Catedra::factory()->create(['fkIdUniversidad' => 2, 'nombreCatedra'=>'Economía', 'descripcion'=>'La cátedra de Economía se centra en el estudio de cómo se asignan los recursos en la sociedad para producir, distribuir y consumir bienes y servicios. Explora los principios fundamentales que rigen la toma de decisiones económicas a nivel individual, empresarial y gubernamental. ']);

        Catedra::factory()->create(['fkIdUniversidad' => 2, 'nombreCatedra'=>'Probabilidad y estadística', 'descripcion'=>'La cátedra de Probabilidad y Estadística se enfoca en dos áreas fundamentales. La probabilidad se ocupa de cuantificar la incertidumbre y las posibilidades de ocurrencia de eventos. Mientras tanto, la estadística se centra en recolectar, organizar, analizar e interpretar datos para obtener conclusiones significativas. ']);

        Catedra::factory()->create(['fkIdUniversidad' => 2, 'nombreCatedra'=>'Administración de Recursos', 'descripcion'=>'La cátedra de Administración de Recursos se centra en la gestión eficiente y efectiva de los recursos disponibles en una organización. Este curso abarca la planificación, asignación, supervisión y optimización de recursos como capital humano, financiero, tecnológico y físico.']);

        Catedra::factory()->create(['fkIdUniversidad' => 2, 'nombreCatedra'=>'Redes y comunicaciones', 'descripcion'=>'La cátedra de Redes y Comunicaciones abarca el estudio interdisciplinario de los sistemas de comunicación y la infraestructura de redes. Se sumerge en los principios fundamentales de transmisión de datos, protocolos de comunicación, tecnologías de redes, seguridad informática y aplicaciones prácticas.']);

        Catedra::factory()->create(['fkIdUniversidad' => 3, 'nombreCatedra'=>'Matemática descriptiva', 'descripcion'=>'La cátedra de Matemática Descriptiva se enfoca en técnicas y métodos matemáticos aplicados para describir y representar datos. Se centra en herramientas estadísticas y gráficas que permiten resumir, organizar y visualizar información de manera comprensible.']);

        Catedra::factory()->create(['fkIdUniversidad' => 3, 'nombreCatedra'=>'Cálculo', 'descripcion'=>'La cátedra de Cálculo se enfoca en el estudio de las técnicas y conceptos matemáticos fundamentales para analizar cambios y variaciones en funciones y cantidades. Explora temas como límites, derivadas e integrales, que son herramientas esenciales para comprender el comportamiento de funciones y resolver problemas relacionados con tasas de cambio, áreas bajo curvas, optimización y modelado matemático.']);

        Catedra::factory()->create(['fkIdUniversidad' => 3, 'nombreCatedra'=>'Física', 'descripcion'=>'La cátedra de Física se enfoca en el estudio de las leyes fundamentales que rigen el universo, desde las partículas subatómicas hasta los fenómenos cósmicos. Explora principios como la mecánica, la termodinámica, la electricidad, el magnetismo, la óptica y la física cuántica.']);

        Catedra::factory()->create(['fkIdUniversidad' => 3, 'nombreCatedra'=>'Química', 'descripcion'=>'
        La cátedra de Química se enfoca en el estudio de la composición, estructura, propiedades y cambios de la materia. Explora la naturaleza de los átomos, las moléculas y las fuerzas que los unen, así como también los procesos de transformación y reacciones químicas. ']);

        PersonalUniversidad::factory()->create(['fkIdUser'=>3, 'fkIdUni' => 1, 'fkIdCatedra'=>1]);
        PersonalUniversidad::factory()->create(['fkIdUser'=>4, 'fkIdUni' => 2, 'fkIdCatedra'=>5]);
        PersonalUniversidad::factory()->create(['fkIdUser'=>5, 'fkIdUni' => 3, 'fkIdCatedra'=>10]);


        Vacantes::factory()->create(['fkIdCatedra' => 7, 'tituloVacante' => "Profesor(a) de Redes y Comunicaciones", 'descCorta' => "Se busca un(a) profesor(a) altamente calificado(a) para unirse al equipo académico de la cátedra de Redes y Comunicaciones. El candidato ideal deberá tener experiencia práctica en el diseño, implementación y gestión de redes, así como habilidades demostradas en la enseñanza a nivel universitario.", 'descCompleta' => "La Facultad invita a candidatos cualificados a postularse para la posición de Profesor(a) de Redes y Comunicaciones. El candidato seleccionado será responsable de impartir cursos teóricos y prácticos en el área de redes, abarcando temas como protocolos de red, diseño de redes, seguridad informática, y tecnologías emergentes en comunicaciones.", 'titulosRequeridos' => "Doctorado o maestría en Ingeniería de Redes, Ciencias de la Computación o un campo relacionado.", 'horarioJornada' => "Martes 7:15 a 8:45, 10:30 a 12:05 y 13:35 a 15:00,
Miércoles 15:00 a 16:45 y 21:05 a 0:10,
Jueves 7:15 a 8:45 y 11:20 a 12:50"]);

        Vacantes::factory()->create(['fkIdCatedra' => 10, 'tituloVacante' =>"Profesor de fisica" , 'descCorta' =>"Buscamos profesor de Física para dirigir las clases de física de las comisiones de 1er año" , 'descCompleta' =>"Estamos en la búsqueda de un docente apasionado y comprometido para unirse a nuestro equipo académico como responsable de impartir la asignatura de Física universitaria. Buscamos a alguien con profundos conocimientos en física y la capacidad de transmitir estos conocimientos de manera efectiva y motivadora a los estudiantes universitarios.

Responsabilidades:

    Planificación y ejecución de clases
    Facilitación del aprendizaje
    Evaluación y retroalimentación
    Mentoría y orientación

Requisitos:
    Experiencia previa impartiendo clases de física a nivel universitario será valorada positivamente.
    Conocimientos sólidos en mecánica, termodinámica, electromagnetismo, óptica y física cuántica
    Capacidad para explicar conceptos complejos de manera clara y accesible

" , 'titulosRequeridos' =>"Grado académico (licenciatura, maestría o doctorado) en Física, Ciencias Físicas, Ingeniería Física u otros campos relacionados." , 'horarioJornada' =>"Lunes a viernes 8:00 a 14:00" ]);

        Vacantes::factory()->create(['fkIdCatedra' => 5, 'tituloVacante' => 'Auxiliar de Probabilidad y Estadística', 'descCorta' => '', 'descCompleta' => 'Estamos en la búsqueda de un auxiliar de cátedra comprometido y entusiasta para unirse a nuestro equipo educativo como apoyo en la asignatura de Probabilidad y Estadística. Este rol es fundamental para brindar un sólido respaldo académico a los estudiantes y contribuir al desarrollo de sus habilidades analíticas y cuantitativas.

Responsabilidades:

    Apoyo al docente
    Tutorías y asistencia a estudiantes
    Corrección y evaluación: Revisar y evaluar tareas, exámenes y proyectos
    Facilitación del aprendizaje: Guiar a los estudiantes en el uso de herramientas y software estadísticos.

Requisitos:

    Conocimientos sólidos: Dominio de los principios fundamentales de la probabilidad y la estadística, incluyendo distribuciones de probabilidad, análisis de datos, inferencia estadística y métodos cuantitativos.
    Habilidades de enseñanza: Capacidad para explicar conceptos complejos de manera clara y comprensible, adaptándose a diferentes estilos de aprendizaje.
    Competencia técnica: Experiencia en el uso de software estadístico (como R, SPSS, Excel, entre otros) para el análisis de datos.
    Organización y compromiso: Capacidad para trabajar de manera autónoma, siendo proactivo y comprometido con la excelencia académica.

Ofrecemos:

    Desarrollo profesional
    Colaboración y aprendizaje
    Flexibilidad horaria' , 'titulosRequeridos' => 'Estudiantes avanzados o graduados en Estadística, Matemáticas, Ingeniería o disciplinas afines.', 'horarioJornada' => 'Lunes 10:45 a 13:05, Miércoles 9:00 a 10:30']);

    Vacantes::factory()->create(['fkIdCatedra' => 11, 'tituloVacante' => 'Profesor(a) de Química' , 'descCorta' =>  'Se busca un(a) profesor(a) de Química comprometido(a) para unirse a nuestro equipo académico. La posición implica la enseñanza de cursos de química a nivel universitario, así como la participación activa en actividades de investigación y desarrollo académico.' , 'descCompleta' => 'El Departamento de Química de nuestra institución está en busca de un(a) Profesor(a) de Química altamente calificado(a) para incorporarse a nuestro cuerpo docente. El candidato ideal deberá poseer un profundo conocimiento en las disciplinas de química inorgánica, química orgánica y química física, así como experiencia en la enseñanza a nivel universitario. Además de la docencia, se espera que el candidato participe en actividades de investigación, supervise proyectos estudiantiles y contribuya al desarrollo curricular del departamento.' ,'titulosRequeridos' =>  'Profesorado en Química o campo relacionado.
Experiencia demostrada en la enseñanza universitaria.' , 'horarioJornada' =>'Martes 18:35 a 20:00,
Miércoles 11:20 a 12:50,
Jueves 12:50 a 14:10,
Viernes 12:05 a 13:35 y 16:05 a 17:35 ' ]);

        tipoPreguntas::factory()->create(['descripcion'=>'Navegacion']);
        tipoPreguntas::factory()->create(['descripcion'=>'Errores']);
        tipoPreguntas::factory()->create(['descripcion'=>'Cuenta de usuario']);
        tipoPreguntas::factory()->create(['descripcion'=>'Postulaciones']);
        tipoPreguntas::factory()->create(['descripcion'=>'Vacantes']);

        Preguntas::factory()->create([
            'pregunta'=>'¿Cómo navegar a través de la página?',
            'respuesta'=>'Usted puede navegar entre las distintas secciones de esta página utilizando los botones del menú principal, situado arriba a la izquierda. Dentro de cada sección, se le indicará su ubicación en la página (Por ej: /Página Principal/Universidades), la cual también puede utilizar para navegar.',
            'fkIdTipoPregunta' => 1,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'Algunas páginas no cargan. ¿Qué debo hacer?',
            'respuesta'=>'Si la página presenta demoras al navegar o realizar determinadas operaciones, puede deberse a diversos motivos o dificultades técnicas. En cualquier caso, se sugiere que cierre su navegador y luego vuelva a iniciar sesión. Si los problemas continúan, inténtelo más tarde o contácte a los proveedores del sitio.',
            'fkIdTipoPregunta'=> 1,
        ]);

        Preguntas::factory()->create([
            'pregunta'=>'¿Qué hago si se produce un error en la página?',
            'respuesta'=>'Si la página le envía constantemente mensajes de error o funciona de forma incorrecta, se sugiere que cierre su navegador y vuelva a iniciar sesión. Si los problemas continúan, por favor contacte a los proveedores del sitio.',
            'fkIdTipoPregunta'=> 2,
        ]);

        Preguntas::factory()->create([
            'pregunta'=>'¿Cómo inicio sesión?',
            'respuesta'=>'Para iniciar sesión debe tener una cuenta registrada y dirigirse al botón “Ingresar” que se encuentra en la parte superior derecha de esta página. Al hacer click, se le redireccionará a una página de inicio de sesión donde deberá ingresar su mail de usuario y contraseña. Si no posee una cuenta, puede crearla haciendo click en el botón “Registrar” y deberá llenar los datos del formulario',
            'fkIdTipoPregunta'=> 3,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Cómo crear una cuenta?',
            'respuesta'=>'Para registrarse puede dirigirse al botón “Registrarse” que se encuentra en la parte superior derecha de esta página. Al hacer click, se le redireccionará a un formulario donde deberá ingresar sus datos de la cuenta. Se recomienda apuntar su contraseña una vez creado su usuario.',
            'fkIdTipoPregunta'=> 3,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Qué pasa si olvido mi contraseña?',
            'respuesta'=>'Si olvida su contraseña, deberá de dirigirse y hacer click en “Contacto” situado al pié de la página. Allí podrá contactar con los administradores del sitio que le pedirán sus datos de usuario para verificar que no se trate de un fraude y proporcionarle una nueva contraseña',
            'fkIdTipoPregunta'=> 3,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Cómo accedo a mi perfil?',
            'respuesta'=>'Solo se puede acceder a su perfil si usted se encuentra logueado en la página. Si lo está, diríjase a la parte superior derecha. Allí verá un menú desplegable llamado “Cuenta”. Haga click en él y luego en “Ver mi perfil”. Se redirigirá la página a su perfil profesional.',
            'fkIdTipoPregunta'=> 3,
        ]);

        Preguntas::factory()->create([
            'pregunta'=>'¿Cuáles son los requisitos para postularse?',
            'respuesta'=>'Para postularse, debe contar con una cuenta en el sistema que deberá crear primero. Para ello debe contar al menos con un email.',
            'fkIdTipoPregunta'=> 4,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Cómo realizo una postulación?',
            'respuesta'=>'Para postularse, primero deberá dirigirse al “Inicio”, donde se muestran las vacantes a las que puede postularse. Verá, además de su información, un botón a la derecha titulado “Postularse +info”. Esto lo redirigirá a la página de ducha vacante donde podrá ver su información a detalle y postularse utilizando el botón de abajo a la derecha. Si usted no está logueado en el sistema, se le pedirá que inicie sesión con su cuenta primero.',
            'fkIdTipoPregunta'=> 4,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Dónde puedo revisar el estado de mi postulación?',
            'respuesta'=>'Puede revisar el estado de sus postulaciones al pié de su perfil profesional (Ver ¿Cómo accedo a mi perfil?). Allí podrá ver también su puntuación. Si figura en cero “0”, lo más probable es que aún no se hayan evaluado sus méritos.',
            'fkIdTipoPregunta'=> 4,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Por qué no puedo ver las demás postulaciones?',
            'respuesta'=>'Para proteger la privacidad e información profesional de los postulantes y demás usuarios, usted solo está habilitado a ver sus propias postulaciones. Solo el personal universitario a cargo de la cátedra de su postulación puede revisar y cargar su puntuación.',
            'fkIdTipoPregunta'=> 4,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Cuánto tardan en evaluar mi postulación?',
            'respuesta'=>'Las postulaciones por lo general comienzan a evaluarse pasada la fecha límite para postularse en una vacante (Pueda verla en el detalle de la vacante). Pasada esa fecha, el personal universitario que administra dicha vacante se encargará de realizar las órdenes de mérito correspondientes, dependiendo de estos mismo la demora.',
            'fkIdTipoPregunta'=> 4,
        ]);

        Preguntas::factory()->create([
            'pregunta'=>'Soy personal universitario. ¿Cómo agrego una vacante?',
            'respuesta'=>'Para agregar una vacante, diríjase a la página principal del sitio. Haga click en el botón “Agregar Vacante” y se desplegará un formulario que deberá rellenar con los datos de la vacante a ingresar. Solo puede crear vacantes de la institución a la que pertenece y para las cátedras que se encuentren registradas. Sea muy cauteloso con la fecha límite de la vacante, pues pasada esa fecha el sistema prohibirá que se realicen nuevas postulaciones en la misma.',
            'fkIdTipoPregunta'=> 5,
        ]);
        Preguntas::factory()->create([
            'pregunta'=>'¿Cómo cargo las órdenes de mérito?',
            'respuesta'=>'Para realizar el registro de los méritos diríjase a la “Página Principal” y busque la vacante correspondiente. Haga click en el botón “Ver Vacante” para desplegar su información. Debajo verá un botón para “Ver Postulaciones”. Busque la postulación correspondiente y haga click en “Ver Postulación”. Esto lo redirigirá a un formulario en donde deberá cargar o editar los puntajes. Al finalizar, deberá dirigirse abajo a la derecha y hacer click en el botón “Guardar” para registrar los cambios.',
            'fkIdTipoPregunta'=> 5,
        ]);
    }
}
