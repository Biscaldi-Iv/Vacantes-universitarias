<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Preguntas;


class PreguntasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
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
