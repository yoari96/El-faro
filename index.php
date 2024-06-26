<?php
// Incluir el archivo de configuración
require_once 'config.php';

// Crear una instancia de la clase mysqli para la conexión a la base de datos
$conexion = new mysqli($servername, $username, $password, $database);

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>

<?php
require_once 'Conexion.php';
require_once 'Usuario.php';

// Crear una instancia de la clase de conexión
$conexion = new Conexion();

// Crear una instancia de la clase de entidad Usuario
$usuario = new Usuario($conexion);

// Ejemplo de uso: obtener todos los usuarios
$resultado = $usuario->obtenerUsuarios();
if ($resultado->num_rows > 0) {
    // Procesar resultados...
}
?>

<!DOCTYPE html>
<html lang="es">
<mysql class="connector"></mysql>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>El Faro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.10.5/css/bulma.min.css">
    <style>
        body {
            background-color: black;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
        }

        header,
        nav {
            background-color: #f9fbfc;
            color: #e04e22;
            padding: 20px;
            text-align: center;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
        }

        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            text-decoration: underline;
            color: #fff;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul li a:hover {
            color: #ffd54f;
        }

        main {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            padding: 20px;
        }

        section {
            background-color: #51cad3;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        section:hover {
            background-color: black;
            color: white;
        }

        section h2 {
            margin-top: 0;
            font-size: 20px;
            margin-bottom: 10px;
        }

        section p {
            margin-bottom: 15px;
            line-height: 1.5;
        }

        footer {
            background-color: #51cad3;
            color: #e04e22;
            padding: 20px;
            text-align: center;
        }

        #form-contacto {
            margin-top: 20px;
        }

        .input-field {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
        }

        .submit-button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #45a049;
        }


        #fecha-hora {
            font-size: 16px;
            font-weight: bold;
            color: #e04e22;
        }

        form {
            margin-bottom: 20px;
        }

        form input[type="text"] {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
        }

        form button {
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form button:hover {
            background-color: #45a049;
        }

        .contador-articulos {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .navbar-item.custom-text-color {
            color: #e04e22;
            /* Color de texto personalizado */
        }

        .avisos {
            background-color: #ffd700;
            /* Color de fondo amarillo */
            color: #333;
            /* Color de texto oscuro */
            padding: 10px 0;
            /* Espaciado interno */
            text-align: center;
            /* Alineación centrada */
            font-weight: bold;
            /* Texto en negrita */
        }

        img {
            width: 200px;
            height: auto;
            margin-top: 20px;
        }

        .centrar-imagen {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        .articulo {
            background-color: #51cad3;
        }
        .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-control {
        margin-bottom: 20px;
        }
        input[type="text"],
        input[type="email"],
        textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        }
        #mensajeRespuesta {
        margin-top: 20px;
        text-align: center;
        font-weight: bold;
        }
    </style>
</head>

<div class="avisos">
    ¡Oferta! Nueva promoción disponible - ¡No te lo pierdas!
</div>
<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="#">
            <img src="logotipo.jpeg" alt="Logo">
            <h1 style="color: #e04e22;">El Faro</h1>
            <div id="fecha-hora"></div> <!-- Elemento para mostrar la fecha y hora -->

<script>
    const fechaHoraElemento = document.getElementById('fecha-hora');
    function actualizarFechaHora() {
        const ahora = new Date();
        const fecha = ahora.toLocaleDateString('es-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });
        const hora = ahora.toLocaleTimeString('es-ES', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });
        fechaHoraElemento.textContent = `${fecha} - ${hora}`;
    }
    actualizarFechaHora();
    setInterval(actualizarFechaHora, 1000); // Actualizar cada segundo
</script>

        </a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
            data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
        
    </div>
    <?php
include 'Coneccion.php';
$conexion = new ConexionBD();
?>
    <body>
    <div class="container">
        <h1>Registro de Cuenta</h1>
        <form id="formularioRegistro" action="procesar_registro.php" method="post">
            <div class="form-control">
                <label for="nombreUsuario">Nombre de Usuario:</label>
                <input type="text" id="nombreUsuario" name="nombreUsuario" required>
            </div>
            <div class="form-control">
                <label for="correoRegistro">Correo electrónico:</label>
                <input type="email" id="correoRegistro" name="correoRegistro" required>
            </div>
            <div class="form-control">
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" required>
            </div>
            <button type="submit">Registrarse</button>
        </form>
        <div id="mensajeRespuesta"></div>
    </div>
    
    <script src="script.js"></script>
</body>


</html>

<nav class="navbar" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item custom-text-color" href="#inicio">Inicio</a>
        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarMenu">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarMenu" class="navbar-menu">
        <div class="navbar-end">
            <a class="navbar-item custom-text-color" href="#Deporte">Deporte</a>
            <a class="navbar-item custom-text-color" href="#negocios">Negocios</a>
            <hr class="navbar-divider">
            <a class="navbar-item custom-text-color" href="#form-contacto">Otras secciones</a>
            <a class="navbar-item custom-text-color" href="#articulos-recientes">Artículos Recientes</a>
            <a class="navbar-item custom-text-color" href="#otros-articulos">Otros Artículos</a>
        </div>
    </div>
</nav>



<main id="contenedor-articulos">
    <section id="inicio">
        <h2>Inicio</h2>
        <div class="contador-articulos"></div>
        <h2 class="titulo-noticia">LEYENDA: Esta es la historia y el legado de Akira Toriyama</h2>
        
        <p>Categoría: Noticia General</p>
        <td>El creador de Dragon Ball pasó por varias etapas en su carrera antes de volverse el mejor mangaka.</td>
        <img class="centrar-imagen" src="akira.jpg" alt="Imagen de Akira Toriyama" height="500">
        <td>El 1 de marzo de 2024 falleció una de las mayores leyendas del manga y el anime, no referimos al inigualable
            Akira Toriyama.
            Este mangaka fue el autor de icónicas obras que se popularizaron a lo largo de su carrera, siendo Dragon
            Ball la más destacada.</td>
        <p>Su muerte fue causa de millones de mensajes de admiración y tristeza por parte de fanáticos y colegas. Estos
            demostraron la importancia que tuvo el autor
            en las personas, siendo la principal referencia de otros mangakas para crear obras como One Piece y Naruto.
        </p>
        El legado de esta mangaka será uno de los que difícilmente se pueda igualar algún día, es por ello que en este
        pequeño articulo queremos hacer breve un recorrido
        por toda la carrera de Akira Toriyama.
        <p>El 5 de abril de 1955 en Nagoya, Japón, nació uno de los mayores genios de la historia. Akira Toriyama fue un
            niño que desarrolló su amor por los dibujos, siendo sus primeras referencias la película de '101 dalmatas'
            que se estrenó en 1966 y 'Astro Boy',
            la obra creada por Osamu Tezuka. Ambos trabajos llamaron inmediatamente la atención de Akira por la
            perfección de los dibujos</p>
        <p>Rápidamente creció un amor en Akira Toriyama, quien empezó a dibujar desde pequeño. Esto lo llevó a ser el
            centro de muchas burlas por parte de sus compañeros de clase, quienes lo molestaban por pasarse todo el día
            dibujando. A esto, se le sumó su admiración
            por las películas de acción, particularmente las cintas donde participaba Bruce Lee.</p>
        <p>El dibujo y la acción fueron haciendo que Toriyama fuera teniendo cada vez más creatividad, hasta el punto de
            tomar una difícil decisión, dejar la escuela. Después de esto empezó
            a participar en concursos de dibujo, siendo rechazado muchas veces.
            Todo cambió cuando recibió una llamada de Kazuhiko Torishima, un importante ejecutivo de la Shonen Jump,
            quien le dio una oportunidad de debutar como dibujante.</p>
        <p>En 1978, Akira Toriyama tuvo la oportunidad de lanzar su primera obra en el número 58 de la Shonen Jump, la
            cual se llamó 'Wonder Island'. Esta historia de un piloto de avión que quedó varado en una isla le gustó
            bastante a los lectores,
            abriendo paso a los mayores éxitos del mangaka. Antes de esto también lanzó las historias de Awawa World
            (1977) y Mysterious Rain Jack (1977).</p>
        <p>Su primer gran éxito fue nada más y nada menos que 'Dr. Slump', una increíble obra lanzada en 1981. Esta dejó
            a icónicos personajes como Arale, Gatchan y el mismo Dr. Slump, quien también era conocido como Senbei
            Norimaki.</p>
        <p>En este punto, Akira pensaba que estaba en la cima de su carrera, pero no sabía lo que vendría en el futuro.
            Su próxima obra fue 'Dragon Boy', una historia que nos recuerda rápidamente a Dragon Ball.
            Esta era una versión mucho más infantil que nos presentó a Tangtong, un niño que muy parecido a Goku.</p>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Centrar Imagen - image1</title>
        </head>

        <body>
            <img class="centrar-imagen" src="image1.jpg">
        </body>

        </html>
        <p>Poco tiempo después, Akira Toriyama lanzó su mayor éxito, Dragon Ball. Esta recogía lo visto en 'Dragon Boy',
            con unas claras referencias en los personajes, pero en una historia diferente que agradó rápidamente a los
            lectores.
            Este mundo que conectaba las artes marciales, la mitología y la magia en un mismo lugar fueron los factores
            que hicieron el éxito de la serie.</p>
        <p>El manga empezó en 1984, siendo una de las obras más populares en Japón. La popularidad de la obra hizo que
            llegara a el resto del mundo, pero en formato anime. A partir de 1986 inició el anime de Dragon Ball
            que contó con 153 episodios.</p>
        <p>Todas las enseñanzas, acción y aventura de Dragon Ball hicieron que los fanáticos quisieran más de la
            historia, la cual terminó después de la boda entre Goku y Milk. En este punto, Akira dio por hecho que ese
            sería el final de la serie,
            pero Toei Animation no estaba de acuerdo, pidiéndole al mangaka que siguiera con la historia. Esto fue
            rechazado por el autor, quien solo quería darle un final feliz.
            Esto llevó a la empresa de animación, quienes contaban con parte de los derechos, a seguir la serie por su
            parte. Esto preocupó a Toriyama, quien desistió ante el temor de que
            arruinaran su obra</p>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Centrar Imagen - dragon</title>
            <style>
                .centrar-imagen {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }
            </style>
        </head>

        <body>
            <img class="centrar-imagen" src="dragon.jpg">
        </body>

        </html>

        <audio controls>
            <source src="dragonball.mp3" type="audio/mp3">
            Tu navegador no es compatible con el audio de HTML5
        </audio>
        <p>Gracias a esta discusión nació la obra que inicialmente se llamaba 'Dragon Ball 2', pero que en Toei
            Animation confundieron el "2" con una "Z", lo que llevó al conocido nombre de 'Dragon Ball Z'. Iniciando
            esta secuela de la serie en 1989,
            finalizando en 1996.</p>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Centrar Imagen - dragon2</title>
            <style>
                .centrar-imagen {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }
            </style>
        </head>

        <body>
            <img class="centrar-imagen" src="dragon2.jpg">
        </body>

        </html>
        <p>Esta historia era mucho más madura y relataba la vida adulta de Goku, una vez casado y con su primer hijo.
            Acá conocimos a Gohan, quien tendría mucho protagonismo durante la obra y que rápidamente se vería en
            peligro ante la aparición de
            peligrosos villanos conocidos como "Saiyajin"</p>
        <p>Acá supimos el verdadero origen de Goku, quien realmente se llamaba Kakaroto. Además, aparecieron villanos
            cada vez más amenazantes y personajes que se fueron sumando a un selecto grupo denominado como los
            "Guerreros Z". La serie fue sumando prestigio,
            volviéndose en un fenómeno que mundialmente se popularizó, siendo una inspiración para otras obras exitosas.
        </p>
        <p>l trato inicial que hizo Akira con Toei llegaría hasta el final de la saga de Freezer, donde debía concluir
            la serie. Sin embargo, tanto Toei como los fanáticos querían seguir viendo Dragon Ball, por lo que siguieron
            con la Saga de los androides
            y la de Majin Boo.</p>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Centrar Imagen - El Faro</title>
            <style>
                .centrar-imagen {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }
            </style>
        </head>

        <body>
            <img class="centrar-imagen" src="todos.jpg">
        </body>

        </html>

        <h2 class="titulo-noticia">Trump dice que los estadounidenses judíos que votan por Biden no aman a Israel y que
            "deberían hablar con ellos"</h2>
        <p>Categoría: Noticia General</p>

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Centrar Imagen - El Faro</title>
        </head>

        <body>
            <img class="centrar-imagen" src="trump.webp">
        </body>

        </html>
        <td>El expresidente Donald Trump volvió a criticar el lunes a los estadounidenses judíos que no lo apoyan y dijo
            que cualquier persona judía que vote por el presidente Joe Biden no ama a Israel y "deberían hablar con
            ellos".
            <p>Es el último ejemplo del presunto candidato del Partido Republicano jugando con un tópico antisemita de
                que los estadounidenses judíos tienen doble lealtad a Estados Unidos y a Israel.</p>
            <p>"Cualquier judío que vote a Biden no ama a Israel y, francamente, se debería hablar con ellos", dijo
                Trump en una entrevista emitida el lunes por la noche en Real America's Voice.</p>
            <p>Trump argumentó que Biden estaba "totalmente del lado de los palestinos" en medio de la guerra de Israel
                contra Hamas en Gaza. Biden se ha mantenido en gran medida firme en su apoyo al derecho de Israel a
                defenderse, y la semana pasada amenazó seriamente al primer ministro de Israel, Benjamin Netanyahu, con
                consecuencias si Israel no cambiaba la forma en que estaba librando su guerra.
                La semana pasada, Trump dijo que Israel tenía que "terminar lo que había empezado" y "acabar rápido", al
                tiempo que afirmaba que Israel estaba "perdiendo la guerra de las relaciones públicas" por las imágenes
                que salían de Gaza.</p>
            <p>Trump también argumentó el lunes que los estadounidenses judíos y negros votan a los demócratas "por
                costumbre".</p>
            <p>"Mucho de eso es hábito. Los judíos, por costumbre, votan a los demócratas y los negros, por costumbre,
                votan a los demócratas", dijo Trump.</p>
            <p>Sus últimos comentarios se hacen eco de unas declaraciones que hizo el mes pasado y que le valieron una
                rápida condena por parte de la administración y la campaña de reelección de Biden. En un podcast
                presentado por su antiguo ayudante en la Casa Blanca Sebastian Gorka,
                Trump dijo que cualquier judío que vote a los demócratas "odia su religión" y odia "todo lo relacionado
                con Israel".</p>
            <p>Trump lleva mucho tiempo utilizando tópicos antisemitas, arremetiendo contra los estadounidenses judíos
                que, según él, no le apoyan lo suficiente. Durante su primera campaña presidencial, pronunció un
                discurso ante la Coalición Judía Republicana plagado de estereotipos antisemitas, y poco después de
                dejar el cargo en 2021,
                dijo a los periodistas que los judíos estadounidenses habían dado la espalda a Israel.</p>
            <p>Un año después, dijo que los judíos estadounidenses no elogiaban lo suficiente las políticas de su
                administración hacia Israel: "Los evangélicos las aprecian mucho más que la gente de fe judía,
                especialmente los que viven en Estados Unidos". Y el año pasado, durante las celebraciones del Año Nuevo
                judío, Trump compartió un post en las
                redes sociales en el que decía que los judíos liberales que no le apoyaban "votaron para destruir
                América e Israel".</p>
            <p>Al menos el 63% de los judíos estadounidenses dijeron que su lugar en la sociedad estadounidense es menos
                seguro que hace un año, según un informe publicado el mes pasado por el Comité Judío Estadounidense. La
                Liga Antidifamación registró un total de 3.283 incidentes antisemitas en los tres meses siguientes a los
                ataques de Hamas contra Israel el 7 de octubre, según informó anteriormente CNN,
                lo que supone un aumento del 361% en comparación con el mismo período del año anterior.</p>
            <p>Los judíos estadounidenses han sido durante décadas un grupo mayoritariamente demócrata y políticamente
                liberal, identificándose con los demócratas frente a los republicanos por un amplio margen, según la
                encuesta 2020 del Centro de Investigación Pew. Mientras que los judíos ortodoxos se inclinan
                mayoritariamente por los republicanos, los judíos estadounidenses de otras confesiones, incluidas
                las ramas reformista y conservadora, se han identificado con el partido demócrata o se han inclinado por
                él.</p>

        </td>


        <h2 class="titulo-noticia">Condenan a entre 10 y 15 años de prisión a James y Jennifer Crumbley, los padres del
            atacante del tiroteo escolar en Michigan</h2>
        <p>Categoría: Noticia General</p>
        <td>James y Jennifer Crumbley, los padres del adolescente que mató a cuatro estudiantes en un tiroteo escolar en
            2021 en Oxford, Michigan, fueron sentenciados el martes a entre 10 y 15 años de prisión, respectivamente,
            semanas después de ser declarados culpables de
            homicidio involuntario.
            <p>Recibirán crédito por 858 días ya cumplidos.</p>
            La jueza que presidió la sentencia de James y Jennifer Crumbley dijo que la sentencia debería ser un
            elemento disuasivo para intentar detener los tiroteos escolares en el futuro.
            <p>"La oportunidad golpeó una y otra vez, cada vez más fuerte, y fue ignorada", dijo la jueza Cheryl
                Matthews. "Nadie respondió y estas dos personas deberían haberlo hecho y seguro que no lo hicieron".</p>
            "Estas condenas confirman actos repetidos o falta de actos que podrían haber detenido un tren fuera de
            control que se aproximaba", añadió.
            <p>Dijo ser "consciente de mi trabajo en esta situación" y prometió no dejarse "influir por la opinión
                pública" a la hora de dictar sentencia.</p>
            Hablando con las familias en la sala del tribunal, Matthews dijo que nunca podrá entender el dolor que
            sufren, pero les aseguró: “Vi lo que ustedes vieron y escuché lo que ustedes escucharon” durante los
            juicios.
            <p>Los familiares de los cuatro estudiantes asesinados en el tiroteo de 2021 se dirigieron a los Crumbley
                durante la audiencia de sentencia y un padre le dijo a la pareja: "La sangre de nuestros hijos está en
                sus manos".</p>
            El caso de los Crumbley es una prueba de los límites sobre quién es responsable luego del tiroteo en una
            escuela. Se trata de la primera vez que el padre de un atacante en una escuela es considerado directamente
            responsable de tales homicidios.
            <h2>Los Crumbley pidieron disculpas a las víctimas</h2>
            James Crumbley, el padre del atacante de la escuela de Michigan, Ethan Crumbley, se dirigió a la sala del
            tribunal y comenzó su declaración disculpándose ante las víctimas, algo que dijo que aún no había podido
            hacer.

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Centrar Imagen - El Faro</title>
                <style>
                    .centrar-imagen {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
            </head>

            <body>
                <img class="centrar-imagen" src="crumbley.webp">
            </body>

            </html>
            <p>"Quiero decir que no puedo imaginar el dolor y la agonía... para las familias que han perdido a sus hijos
                y lo que están experimentando y por lo que están pasando. Como padres, nuestro mayor temor es perder a
                nuestro hijo o a nuestros hijos, y perder un hijo es inimaginable. Mi corazón está realmente roto por
                todos los involucrados", dijo.</p>
            "Realmente quiero que las familias de Madisyn Baldwin, Hana St Juliana, Tate Myre y Justin Shilling sepan lo
            mucho que lo siento y lo devastado que me sentí cuando escuché lo que les pasó", dijo Crumbley.

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Centrar Imagen - El Faro</title>
                <style>
                    .centrar-imagen {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
            </head>

            <body>
                <img class="centrar-imagen" src="sra.webp">
            </body>

            </html>
            <p>Por su parte, Jennifer Crumbley, también empezó su declaración ante el tribunal expresando sus
                condolencias a las víctimas y sus familias.</p>
            "Me siento aquí hoy para expresar mi más profundo pesar por las familias de Hana, Tate, Madisyn, Justin y
            por todos los afectados el 30 de noviembre de 2021", dijo.
        </td>
    </section>
    <section id="Deporte">
        <h2>Deporte</h2>
        <div class="contador-articulos"></div>
        <h2 class="titulo-noticia">Medel se encuentra con los dirigentes de Colo Colo en Brasil y esto pasa: "¿Cómo te
            verías...?"</h2>
        <p>Categoría: Deporte</p>
        <td>Deporte</td>
        <td>Durante esta jornada, Gary Medel visitó la concentración de Colo Colo en Río de Janeiro, la ciudad donde él
            reside, a raíz de su presencia en Vasco de Gama.
            El defensor llegó al Hotel Windsor, situado en Barra de Tijuca, y se encontró con Alfredo Stöhwing y Anibal
            Mosa, dirigentes de Blanco y Negro. Este
            último abrazó con efusividad al "Pitbull" y le dijo, en tono de broma, "¿Cómo te verías un año acá?".

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Centrar Imagen - El Faro</title>
                <style>
                    .centrar-imagen {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
            </head>

            <body>
                <img class="centrar-imagen" src="deporte1.png">
            </body>

            </html>
            <p>
                Medel, además compartió con Fernando Felicevich, su agente, quien está hospedándose en dicho lugar, y
                con Brayan Cortés, Esteban Pavez y Arturo Vidal.
                Pablo Galdames, el otro chileno de Vasco, también estuvo en la reunión.
        </td>
        </p>

        <h2 class="titulo-noticia">Extreman medidas de seguridad en Madrid ante amenaza de atentado en los cuartos de
            final de la Champions</h2>
        <p>Categoría: Deporte</p>
        <td>Las fuerzas de seguridad españolas han reforzado las medidas de seguridad tras la amenaza lanzada por ISIS
            que apunta a los estadios en los que se celebrarán
            los cuartos de final de la Champions League, señalaron a CNN fuentes policiales.<p>
                La amenaza fue compartida en redes sociales a través de medios afines al grupo terrorista, e incluiría
                los estadios Santiago Bernabéu y Civitas Metropolitano
                de Madrid, donde se jugarán este martes y miércoles los partidos de ida del torneo. </p>
            <p>

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Centrar Imagen - El Faro</title>
                    <style>
                        .centrar-imagen {
                            display: block;
                            margin-left: auto;
                            margin-right: auto;
                        }
                    </style>
                </head>

                <body>
                    <img class="centrar-imagen" src="champions.jpg">
                </body>

                </html>
                En concreto, este martes se enfrentarán el Real Madrid y el Manchester City en el Santiago Bernabéu; y
                el miércoles, el Atlético de Madrid y el Borussia
                Dortmund en el Civitas Metropolitano.
            </p>
            <p>
                Las fuentes policiales consultadas por CNN señalan que esto no es algo excepcional, dado que entre los
                planes de lucha de las fuerzas de seguridad
                españolas contra el terrorismo se incluye el monitoreo constante de este tipo de amenazas, y ya han
                encontrado en otras ocasiones que los eventos
                que concentran a una gran cantidad de personas suelen ser un objetivo.</p>
            <p>
                Además, comentan que desde el atentado perpetrado en Moscú el 22 de marzo, los terroristas están
                intentando mantener un clima de alarma y miedo.</p>
        </td>

        <h2 class="titulo-noticia">Tarjeta roja para Cristiano Ronaldo tras darle un codazo a su rival durante la
            derrota en la Supercopa de Arabia Saudita</h2>
        <p>Categoría: Deporte</p>
        <td>Deporte</td>
        <td>Cristiano Ronaldo recibió una tarjeta roja por darle un codazo a un rival durante la derrota del Al-Nassr
            ante el Al-Hilal en la semifinal de la Supercopa de
            Arabia Saudita.<p>
                El incidente ocurrió a última hora del partido del lunes en Abu Dabi, cuando el delantero portugués se
                peleó con Ali Al-Bulayhi del Al-Hilal durante el tiempo
                de descuento de la segunda mitad. </p>

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Centrar Imagen - El Faro</title>
                <style>
                    .centrar-imagen {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
            </head>

            <body>
                <img class="centrar-imagen" src="ronaldo.webp">
            </body>

            </html>
            Cristiano Ronaldo recibió la tarjeta roja por un codazo en la semifinal de la Supercopa de Arabia Saudita.
            Stringer/Reuters </p>
            <p>
                Le dieron una tarjeta roja directa por empujar su codo en el pecho y la garganta del defensa central
                Al-Bulayhi, y luego pareció levantar el puño
                hacia el árbitro.</p>
            <p>
                Sadio Mané anotó para Al-Nassr tras la partida de Ronaldo, pero los goles anteriores de Salem Al-Dawsari
                y Malcom le dieron al Al-Hilal una victoria por 2-1.</p>
            <p>
                Fue la victoria número 33 consecutiva del Al-Hilal mientras el club continúa su racha histórica bajo el
                mando de Jorge Jesús, habiendo logrado el récord de más
                victorias consecutivas en el fútbol masculino el mes pasado.
            </p>
            <p>
                Otávio parecía haberle dado la ventaja a Al-Hilal al final de la primera parte antes de que su disparo
                fuera anulado por fuera de juego, y Al-Dawsari tardó hasta
                el minuto 61 en poner el 1-0.
            </p>

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Centrar Imagen - El Faro</title>
                <style>
                    .centrar-imagen {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
            </head>

            <body>
                <img class="centrar-imagen" src="ronaldo2.webp">
            </body>

            </html>
            <p>
                Ronaldo protesta con el juez de línea. Stringer/Reuters
            </p>
            <p>
                Malcom, que minutos antes había pegado al poste con un disparo lejano, pronto anotó el segundo de su
                equipo más tarde en la mitad con un cabezazo al suelo.
            </p>
            <p>
                A partir de ahí, Al-Nassr no tuvo vuelta atrás, a pesar del gol de consolación de Mané tras la tarjeta
                roja de Ronaldo.
            </p>
            <p>No es la primera vez que el hombre de 39 años tiene problemas disciplinarios desde que se mudó a Arabia
                Saudita. A principios de este año, fue suspendido por un
                partido y multado después de hacer un gesto con la ingle hacia los espectadores durante un partido de la
                Saudi Pro League (SPL).</p>

            <p>La derrota del lunes significa que es probable que Ronaldo y Al-Nassr terminen esta temporada sin trofeo.
                También eliminado de la Liga de Campeones asiática,
                el equipo está a 12 puntos del rival de Riad, el Al-Hilal, en la SPL.</p>

            <p>Al-Hilal se enfrentará ahora al Al-Ittihad en la final de la Supercopa de Arabia Saudita el jueves en Abu
                Dabi.</p>
        </td>

        </table>
    </section>

    <section id="negocios">
        <h2>Negocios</h2>
        <div class="contador-articulos"></div>
        <h2 class="titulo-noticia">Dirigentes de Huachipato valoran reunión con Gobierno, pero advierten que estarán
            pendientes a la Comisión Antidistorsiones</h2>
        <p>Categoría: Negocios</p>
        <td>

            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Centrar Video - El Faro</title>
                <style>
                    .centrar-video {
                        display: block;
                        margin-left: auto;
                        margin-right: auto;
                    }
                </style>
            </head>

            <body>
                <video class="centrar-video" width="300" height="350" controls>
                    <source src="Huachipato.mp4" type="video/mp4">
                    Tu navegador no soporta el elemento de video.
                </video>
                <p>
                </p>
                Dirigentes de los sindicatos de trabajadores de la Siderúrgica Huachipato se reunieron con los ministros
                Jeannette Jara (Trabajo) y Nicolás Grau (Economía)
                para abordar la crisis que afecta a la compañía del Grupo CAP debido al dumping chino por barras de
                acero. El gobernador Rodrigo Díaz (Biobío) y los alcaldes
                Henry Campos (Talcahuano) y Antonio Rivas (Chiguayante) también participaron en el encuentro que se
                realizó en paralelo a manifestaciones de funcionarios
                afuera de La Moneda.<p>
                    Al término, Felipe Orellana, presidente del Sindicato Número 2 de Planta Huachipato expresó que en
                    la conversación “se ve que ha cambiado el diálogo.
                    Les hemos dado a entender lo que sería perder una industria estratégica como Huachipato (…).
                    Emparejar la cancha, es el único que necesitamos para poder
                    competir con cualquier acero que llegue del extranjero. Nos vamos a un poquito tranquilos”. No
                    obstante, indicó que estarán pendientes a la reunión de la
                    Comisión Antidistorsiones del jueves 11 de abril. </p>
        </td>

        <h2 class="titulo-noticia">Podrías recibir hasta $25 millones si eres emprendedor: ¿Cómo postular a los fondos
            semilla?</h2>
        <p>Categoría: Negocios</p>

        <head>
            <title>Centrar Imagen - El Faro</title>
            <style>
                .centrar-imagen {
                    display: block;
                    margin-left: auto;
                    margin-right: auto;
                }
            </style>
        </head>

        <body>
            <img class="centrar-imagen" src="fondos-semillas.jpg">
        </body>

        </html>

        <td>La Corporación de Fomento a la Producción (CORFO) abrió el primer proceso de postulación, este 2024, para
            sus programas Semilla Expande y Semilla Inicia Sostenible.
            <p>Estos beneficios tienen como objetivo ayudar monetariamente a emprendimientos nacionales con potencial de
                crecimiento a futuro. </p>
            Ambas programas cuenta con alcance nacional, permitiendo postular a personas de todo el país.
            <h2>Semilla Inicia Sostenible</h2>
            A diferencia de los años anteriores, la iniciativa de Semilla Inicia, tendrá un carácter sustentable,
            dirigiéndose a proyectos que presenten ideas innovadoras de sostenibilidad,
            desde alguna de las líneas señaladas en el programa de Desarrollo Productivo Sostenible (DPS).
            <p>De acuerdo a CORFO, este beneficio busca cofinanciar proyectos que se encuentren en su etapa inicial, ya
                sea una idea o un prototipo funcional desarrollado, que aún no presenten ventas. </p>
            En este caso se cofinancia hasta en un 75% de su costo total, con un tope de $15 millones.
            <p>Se indica que cuando los emprendimientos seleccionados sean liderados por mujeres, se otorgará un 10%
                adicional de cofinanciamiento.</p>
            <h2>Semilla Expande</h2>
            Este aporte monetario considera como candidatos a emprendimientos que tengas ideas nuevas con base en la
            sostenibilidad y que ya cuenten con ventas.
            <p>Este beneficio ofrece un cofinanciamiento de hasta un 75% del costo total del proyecto, con un tope de
                hasta $25 millones, el cual se puede prologar durante una segunda etapa con un subsidio de hasta $20
                millones.</p>
            En este caso, CORFO también otorgará un 10% adicional de cofinanciamiento a emprendimientos que tenga a
            mujeres como líderes.
            <h2>¿Cómo postular?</h2>
            Para solicitar los beneficios ingresa al siguiente link <a
                href="https://www.corfo.cl/sites/cpp/programasyconvocatorias" target="_blank">presiona aquí</a>. Al
            ingresar selecciona el programa al que quieres postular, aprendo el botón que dice "Más Información".
            Esto te llevará a la página donde se describe la iniciativa y sus requisitos principales. Al descender
            podrás ver un ítem que indica "Pasos de postulación".
            <p>Debes apretar la opción número 1 que te da la posibilidad de registrarte, proceso que puedes realizar con
                tu mail, cuenta Google o LinkedIn.</p>
            Posteriormente, aparecerá el inicio de la página de postulación, donde deberás hacer clic en el botón verde
            de la parte superior de la pantalla que dice "Postula ahora"
            <p>A continuación debes rellenar el formulario con tu información personal y responder algunas preguntas
                sobre el emprendimiento que deseas postular.</p>
            Después debes dar información sobre los antecedentes de tu empresa como, su admisibilidad, innovación,
            escalabilidad, el quipo que la conforma, datos estadísticos, entre otros.
            <p>Finalmente, debes firmar una declaración y guardar tus datos, quedando registrado en el proceso de
                postulación.</p>


        </td>


        <h2 class="titulo-noticia">¿La IA va a mejorar la productividad? Las empresas apuestan a que sí</h2>
        <p>Categoría: Negocios</p>

        <td>Los economistas dudan que el impacto de esta tecnología ya sea visible en las cifras de productividad. Pero
            las grandes compañías dicen que la están adoptando en aras de la eficiencia.

            <head>
                <title>Centrar Imagen - El Faro</title>
            </head>

            <body>
                <img class="centrar-imagen" src="ia.png">
            </body>

            </html>
            Las pantallas con el menú de Wendy’s. Los congeladores de Ben & Jerry’s para las tiendas. La mercadotecnia
            de Abercrombie & Fitch. Muchos pilares de la experiencia del cliente en Estados Unidos se basan cada vez más
            en la inteligencia artificial.
            <p>La pregunta es si la tecnología logrará que las empresas sean más eficientes.</p>
            Una rápida mejora en la productividad es el sueño de las empresas y de los encargados de formular las
            políticas económicas. Si la producción por hora se mantiene estable, las firmas deben sacrificar beneficios
            o subir los precios para pagar los aumentos salariales o los proyectos de inversión. Sin embargo, cuando las
            empresas descubren cómo producir más por hora de trabajo pueden mantener o aumentar sus ganancias, incluso
            cuando pagan o invierten más. Las economías que experimentan auges de productividad pueden experimentar
            rápidos aumentos salariales y un veloz crecimiento sin tanto riesgo de una inflación rápida.
            <p>Sin embargo, muchos economistas y autoridades parecen dudar de que la inteligencia artificial —sobre todo
                la generativa, que sigue en pañales— se haya extendido tanto como para figurar en los datos de
                productividad.</p>
            Jerome Powell, presidente de la Reserva Federal, sugirió hace poco que la inteligencia artificial “puede”
            tener el potencial de aumentar el crecimiento de la productividad, “pero es probable que no sea a corto
            plazo”. John Williams, presidente de la Reserva Federal de Nueva York, ha hecho comentarios similares al
            citar el trabajo del economista de la Universidad Northwestern Robert Gordon.
            <p>Gordon ha argumentado que es probable que las nuevas tecnologías, aunque importantes, no hayan sido tan
                transformadoras como para dar un impulso duradero al crecimiento de la productividad.</p>
            “Ha sido un poco exagerado el entusiasmo por los grandes modelos de lenguaje y ChatGPT”, opinó en una
            entrevista.
            <p>La última vez que la productividad aumentó de manera significativa, en la década de 1990, la fabricación
                de computadoras se volvió mucho más eficiente al mismo tiempo que las computadoras lograban que todo lo
                demás fuese mucho más eficiente, lo que permitió un aumento de la productividad en todo el sector. Según
                Gordon, las ganancias actuales pueden ser menos amplias.</p>
            Otros economistas son más optimistas. Erik Brynjolfsson, de la Universidad de Stanford, apostó 400 dólares
            con Gordon por la posibilidad de que la productividad despegará esta década. En parte, su optimismo se basa
            en la inteligencia artificial. Brynjolfsson realizó un experimento con esa tecnología en un gran centro de
            servicio telefónico, en el que le ayudó especialmente a los trabajadores con menos experiencia, y también
            cofundó una empresa que busca enseñar a las firmas cómo aprovechar la tecnología.
            <p> A continuación, presentamos algunas de las áreas en las que las empresas afirman que la tecnología de
                inteligencia artificial más reciente se está utilizando de maneras que podrían influir en la
                productividad. Estos ejemplos fueron tomados de entrevistas, conferencias de resultados y documentos
                financieros.</p>
            <h2>Hay una inteligencia artificial para esa tarea molesta</h2>
            Los empleados pasan mucho tiempo intentando resolver preguntas relacionadas con los recursos humanos. Las
            empresas han invertido en inteligencia artificial generativa para ayudar a responder esas consultas con
            mayor rapidez.
            <p>En Walmart, que con 1,6 millones de trabajadores se ubica como la mayor tienda minorista de Estados
                Unidos, la aplicación interna para empleados tiene una sección llamada “Mi Asistente”, la cual se basa
                en la inteligencia artificial generativa. Esta función usa la tecnología para responder con rapidez
                preguntas como “¿Tengo cobertura dental?”, para resumir minutas de reuniones y ayudar a redactar
                descripciones de puestos de trabajo.</p>
            El año pasado, Walmart introdujo esa tecnología en su fuerza laboral corporativa en Estados Unidos.
            <p>La tienda ha dejado claro que la herramienta busca aumentar la productividad. En una entrevista del año
                pasado, Donna Morris, directora de personal de Walmart, comentó que uno de los objetivos era eliminar
                algunas tareas repetitivas para que los empleados pudieran concentrarse en tareas de mayor impacto. Se
                espera que genere un “enorme aumento de la productividad” para la empresa, afirmó.</p>
            <h2>Los algoritmos quieren venderte cosas</h2>
            Tony Spring, director ejecutivo de Macy’s, señaló que la cadena de tiendas departamentales está
            experimentando con la inteligencia artificial para personalizar su mercadotecnia. La empresa utiliza la
            inteligencia artificial generativa para redactar algunos elementos de los correos electrónicos y está
            explorando mecanismos para utilizar la tecnología con el fin de agregar descripciones de productos en línea
            y replicar imágenes de ropa u otros productos a la venta sobre nuevos fondos.
            <p>“Sin duda se está revelando como una herramienta para que algunos colegas reduzcan su carga de trabajo”,
                mencionó Spring en una entrevista.</p>
            Abercrombie & Fitch usa inteligencia artificial generativa para ayudar a diseñar ropa y redactar
            descripciones para su sitio web y su aplicación. Los diseñadores utilizan Midjourney, un programa de
            inteligencia artificial para gráficos, que les ayuda a generar imágenes mientras comparten ideas para la
            ropa. Los trabajadores del departamento de mercadotecnia de Abercrombie también utilizan la inteligencia
            artificial generativa para ayudarles a redactar la publicidad de las descripciones de los productos. (Los
            empleados editan el texto después).
            <h2>La IA va bien con hamburguesas y helados</h2>
            Algunas empresas esperan utilizar la tecnología de inteligencia artificial más reciente para ayudar a
            ajustar los precios con la demanda, de manera parecida a como Uber fija los precios de su servicio de
            transporte con base en el número de personas que quieren viajar en un momento dado
            <p>Por ejemplo, Wendy’s ha planteado la idea de utilizar la inteligencia artificial para identificar las
                horas de menos trabajo durante el día y cambiar los precios de los productos del menú en sus pantallas
                digitales.</p>
            La tecnología también podría ayudar a la gestión de inventarios. Ben & Jerry’s instaló cámaras con
            inteligencia artificial en los congeladores de las tiendas de abarrotes para alertar a la empresa cuando se
            estén agotando los sabores Cherry Garcia o Chunky Monkey. De manera esporádica, la cámara capta una imagen
            de las estanterías de los congeladores y la tecnología evalúa la cantidad que queda, para después enviar
            alertas a la empresa matriz de Ben & Jerry’s y a sus distribuidores.
            <h2>¿Son cambios revolucionarios?</h2>
            El escepticismo respecto al potencial de la inteligencia artificial para realizar cambios importantes se
            basa en gran medida en el hecho de que muchos de sus usos imitan cosas que el software ya puede hacer: hay
            mejoras evidentes, pero no necesariamente revolucionarias.
            <p>Sin embargo, aunque las empresas podrían tardar en aprovechar las herramientas de inteligencia artificial
                en su totalidad, el hecho de que los usos puedan ser tan amplios ha hecho que algunos economistas se
                muestren optimistas sobre lo que las nuevas tecnologías podrían significar para el crecimiento de la
                productividad.</p>
            Analistas de Vanguard creen que la inteligencia artificial podría ser “transformadora” para la economía
            estadounidense en la segunda mitad de la década de 2020, comentó Joseph Davis, economista jefe a nivel
            mundial de la firma financiera. Según Davis, la tecnología podría lograr que los trabajadores ahorren
            cantidades significativas de tiempo —tal vez un 20 por ciento— en cerca del 80 por ciento de las
            actividades.
            <p>“Todavía no lo vemos en los datos”, afirmó, y explicó que cree que el repunte reciente de la
                productividad ha sido más bien la recuperación rápida después la fuerte caída experimentada durante la
                pandemia. “La buena noticia es que se avecina otra ola”.</p>

        </td>
    </section>

    <section class="section" id="articulos-recientes">
        <div class="container">
            <h2 class="title">Artículos Recientes</h2>
            <div class="columns is-multiline">
                <div class="column is-one-third">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="israel.jpg" alt="israel" class="centrar-imagen">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h2 class="titulo-noticia">Al menos 14 muertos tras incursión de 2 días del ejército
                                    israelí en la Ribera Occidental</h2>
                                <p>Soldados israelíes concluyeron una operación de dos días en el campo de refugiados de
                                    Nur al-Shams en la ocupada Ribera Occidental, dijeron las Fuerzas de Defensa de
                                    Israel a CNN el domingo.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <p>Las imágenes de la redada, una de las más grandes de las FDI en la Ribera Occidental desde el 7 de
                    octubre, muestran losas de concreto y escombros esparcidos por el área. Al menos 14 personas, entre
                    ellas un niño y un adolescente, murieron en el ataque, dijeron el sábado el Ministerio de Salud
                    palestino y la agencia oficial de noticias Wafa.
                    Israel dice que mató a 10 "terroristas" y arrestó a sospechosos buscados.</p>
                <div class="column is-one-third">
                    <p>La violencia de los colonos israelíes y los soldados de las FDI en la Ribera Occidental aumentó
                        durante la campaña bélica de Israel en Gaza.
                        Los colonos mataron el sábado al conductor de una ambulancia que intentaba transportar a
                        palestinos heridos, dijo la Media Luna Roja Palestina.</p>
                </div>
                <div class="column is-one-third">
                    <p>Según el Ministerio de Salud, 483 palestinos han muerto por colonos o soldados israelíes en la
                        ocupada Ribera Occidental y Jerusalén Oriental desde el 7 de octubre.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="section" id="otros-articulos">
        <div class="container">
            <h2 class="title">Otros Artículos</h2>
            <div class="columns is-multiline is-mobile">
                <div class="column is-half-tablet is-one-third-desktop">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-4by3">
                                <img src="ajedrez.webp" alt="ajedrez" class="centrar-imagen">
                            </figure>
                        </div>
                        <div class="card-content">
                            <div class="content">
                                <h2 class="titulo-noticia">El campeón nigeriano de ajedrez Tunde Onakoya juega durante
                                    60 horas en Times Square y bate el récord de maratón</h2>
                                <p class="is-size-7">Tunde Onakoya, campeón de ajedrez nigeriano y defensor de la
                                    educación infantil, juega una partida de ajedrez en Times Square, el viernes 19 de
                                    abril de 2024, en Nueva York. Yuki Iwamura/AP </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repite el bloque de tarjeta para cada otro artículo -->
                <div class="column is-half-tablet is-one-third-desktop">
                    <p>El campeón nigeriano de ajedrez y defensor de la educación infantil Tunde Onakoya ha batido el
                        récord del maratón de ajedrez más largo después de jugar durante extraordinarias 60 horas sin
                        parar bajo las brillantes luces de Times Square en la ciudad de Nueva York.</p>
                </div>
                <div class="column is-half-tablet is-one-third-desktop">
                    <p>La organización Guinness World Record aún no ha confirmado el intento de Onakoya, que a veces
                        puede tardar semanas, pero para muchos nigerianos, el joven de 29 años ya es considerado una
                        especie de héroe nacional.</p>
                </div>
            </div>
        </div>
    </section>

   
</main>

<footer>

    <div class="footer-column">
        <h3>Contacto</h3>
        <p>Dirección: 123 Calle Principal, Concepción</p>
        <p>Teléfono: (123) 456-7890</p>
        <p>Email: ariel.peredo@correoaiep.cl</p>
    </div>
    <div class="footer-column">
        <h3>Redes Sociales</h3>
        <ul class="social-icons">
            <li><a href="#"><img src="facebook.png" alt="Facebook" width="100"></a></li>
            <li><a href="#"><img src="x.webp" alt="X"></a></li>
            <li><a href="#"><img src="instagram.jpg" alt="Instagram"></a></li>
        </ul>
    </div>

    <form id="form-contacto" action="procesar_contacto.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" required>

        <label for="mensaje">Mensaje:</label>
        <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

        <button type="submit" class="submit-button">Enviar</button>
    </form>
    <div id="total-articulos" class="contador-articulos"></div>
    <p>Derechos de autor © 2024 El Faro - Todos los derechos reservados</p>
    
</footer>
<?php
// Crear una instancia de la clase mysqli
$conexion = new mysqli("127.0.0.1", "root", "", "tu_usuario");

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Llamar al procedimiento almacenado para consultar usuarios
$resultadoConsulta = $conexion->query("CALL ConsultarUsuarios()");
if (!$resultadoConsulta) {
    die("Error al llamar al procedimiento almacenado: " . $conexion->error);
}

// Procesar resultados de la consulta
while ($fila = $resultadoConsulta->fetch_assoc()) {
    // Procesar cada fila
}

// Cerrar la conexión
$conexion->close();
?>


<?php
// Crear una instancia de la clase mysqli para la conexión a la base de datos
$conexion = new mysqli("127.0.0.1", "root", "", "tu_usuario");

// Verificar si hay errores de conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Definir los parámetros para la inserción
$nombre = "Ejemplo";
$correo = "ejemplo@example.com";

// Llamar al procedimiento almacenado para insertar un usuario
$resultado = $conexion->query("CALL InsertarUsuario('$nombre', '$correo')");
if (!$resultado) {
    die("Error al llamar al procedimiento almacenado: " . $conexion->error);
} else {
    echo "Usuario insertado correctamente.";
}

// Cerrar la conexión
$conexion->close();
?>


<form id="form-articulo" action="procesar_articulo.php" method="post">
    <input type="text" id="titulo" name="titulo" placeholder="Título del artículo" required>
    <input type="text" id="descripcion" name="descripcion" placeholder="Descripción del artículo" required>
    <select id="seccion" name="seccion">
        <option value="inicio">Inicio</option>
        <option value="Deporte">Deporte</option>
        <option value="negocios">Negocios</option>
    </select>
    <button type="submit">Enviar Artículo</button>
</form>


<?php
echo "<script>";
echo "document.getElementById('form-articulo').addEventListener('submit', function (event) {";
echo "event.preventDefault();";
echo "const titulo = document.getElementById('titulo').value;";
echo "const descripcion = document.getElementById('descripcion').value;";
echo "const seccionSeleccionada = document.getElementById('seccion').value;";
echo "const nuevoArticulo = document.createElement('section');";
echo "nuevoArticulo.innerHTML = `<h2>${titulo}</h2><p>${descripcion}</p>`;";
echo "nuevoArticulo.classList.add('articulo');";
echo "document.getElementById(seccionSeleccionada).appendChild(nuevoArticulo);";
echo "document.getElementById('titulo').value = '';";
echo "document.getElementById('descripcion').value = '';";
echo "});";
echo "</script>";

echo "<script>";
echo "function actualizarContadoresArticulos() {";
echo "const seccionesNoticias = document.querySelectorAll('main section');";
echo "let totalArticulos = 0;";
echo "seccionesNoticias.forEach(function (seccion) {";
echo "const titulosNoticias = seccion.querySelectorAll('.titulo-noticia');";
echo "let contador = seccion.querySelector('.contador-articulos');";
echo "if (!contador) {";
echo "contador = document.createElement('span');";
echo "contador.classList.add('contador-articulos');";
echo "seccion.insertBefore(contador, seccion.firstChild);";
echo "}";
echo "contador.textContent = `Artículos: ${titulosNoticias.length}`;";
echo "totalArticulos += titulosNoticias.length;";
echo "});";
echo "const totalArticulosElemento = document.getElementById('total-articulos');";
echo "if (totalArticulosElemento) {";
echo "totalArticulosElemento.textContent = `Total de artículos: ${totalArticulos}`;";
echo "}";
echo "}";
echo "window.addEventListener('load', actualizarContadoresArticulos);";
echo "</script>";
?>





<?php
echo "<script>";
echo "const fechaHoraElemento = document.getElementById('fecha-hora');";
echo "function actualizarFechaHora() {";
echo "const ahora = new Date();";
echo "const fecha = ahora.toLocaleDateString('es-ES', { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' });";
echo "const hora = ahora.toLocaleTimeString('es-ES', { hour: 'numeric', minute: 'numeric', second: 'numeric', hour12: true });";
echo "fechaHoraElemento.textContent = `${fecha} - ${hora}`;";
echo "}";
echo "actualizarFechaHora();";
echo "setInterval(actualizarFechaHora, 1000);";
echo "</script>";
?>



<?php
echo "<script>";
echo "// Script para manejar el menú hamburguesa en dispositivos móviles";
echo "document.addEventListener('DOMContentLoaded', () => {";
echo "const \$navbarBurgers = Array.prototype.slice.call(document.querySelectorAll('.navbar-burger'), 0);";
echo "if (\$navbarBurgers.length > 0) {";
echo "\$navbarBurgers.forEach(el => {";
echo "el.addEventListener('click', () => {";
echo "const target = el.dataset.target;";
echo "const \$target = document.getElementById(target);";
echo "el.classList.toggle('is-active');";
echo "\$target.classList.toggle('is-active');";
echo "});";
echo "});";
echo "}";
echo "});";
echo "</script>";
?>

<?php
echo '<script src="registro.js"></script>';
?>




</body>

</html>
