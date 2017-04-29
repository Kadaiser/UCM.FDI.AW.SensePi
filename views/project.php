<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <title>Project</title>
    <link rel="icon" type="image/png" href="../images/icons/0.ico"/>
    <link rel="stylesheet" type="text/css" href="../css/basic.css">
    <link rel="stylesheet" type="text/css" href="../css/project.css">
    <script type="text/javascript" src="../js/basic.js"></script>
    <script type="text/javascript" src="../js/project.js"></script>
    <script type="text/javascript" src="../js/lit/lit-EN.js"></script>
  </head>

  <body>

    <!-- WRAPPER CLASS -->
    <div id="wrapper">

      <!-- HEADER CLASS -->
      <!-- SIDEBAR CLASS -->
      <?php
      include '../php/navbar.php';
      include '../php/sideBarButtonProject.php';
       ?>


      <!-- SIDEBAR CLASS -->
      <div class="sidebarRight">
      </div>

      <!-- CONTENT CLASS -->
      <div id="content">
  		  <div id="info" class="projectElem">

          <div id="Image">
          <img src="../images/icons/PiSense.png" alt="PiSense Technologies">
          </div>

          <div id="AboutImage">
            <h1>PiSense Technologies</h1>
            <p>Surge la iniciativa de desarrollo PiSense, la sinergia de dos mundos tan distintos
               y a la vez tan cercanos como son Arduino y Rapsberry. Ambas son pequeñas con voltajes de 5V,
                conectividad y bajo coste. Con programación en C y conocimientos en S.O. Linux, ambos elementos
                 pueden combinarse para traer a la luz proyectos como esta página web.</p>
          </div>

          <div id="MoreAbout">
            <h2>¿Y esta página?</h2>
            <p>Proporcionamos una página web dinámica y novedosa, con una función muy definida.
               Mapas interactivos con información ambiental segmentadas por estancias para un edificio.
              Partimos de un plano simplificado para navegar, el usuario solo tiene que seleccionar
              la instancia a conocer. De manera trasparente para el usuario se le otorgara una vista
              con gráficos que reflejen de manera fácil y elegante los valores medidos.</p>
            <h2>¿Como lo haceis?</h2>
            <p>Para simplificar, tenemos una placa de Arduino con un dispositivo de medición digital
               para la temperatura y la humedad, registramos esos valores y los volcamos en una
                base de datos. El resto es una consulta SQL al servidor de base de datos para presentar
                 los datos de manera amigable.</p>
            <h2>No suena muy complicado...</h2>
            <p>Y no lo es...esencialmente. Pero necesitamos varios conceptos, técnicas y tecnologías
               que en conjunto hacen realidad esta página que estas leyendo. Empezando por la base,
               se requiere del hardware Arduino y de un código en C para cargar en la placa [Fundamentos de programación].
               El montaje de sensores, resistencias y demás elementos de circuitería deben ser debidamente controlados
               [Fundamentos de Electricidad y Electrónica], y se requieren conceptos de configuración de puertos en dispositivos
               de I/O [Fundamentos de computadores] y un canal de comunicación entre dispositivos [Sistemas Operativos],
               así como de un servicio para registrar los datos y un lenguaje para entregar dichos datos a una BBDD
               [Ampliación de Bases de Datos]. Adicionalmente necesitamos de una infraestructura de hardware como
               la Raspberry Pi sobre la que ejecutar un S.O Linux [Administración de Sistemas y redes], y configurar
               los servicios necesarios para ejecutar una página web de estas características, en este caso LAMP
               [Software corporativo]. Por supuesto es necesario proteger debidamente los servicios mediante
               conexiones cifradas que minimicen los riesgos, que ha de evaluarse previamente en un análisis
               de riesgo [Auditoria Informática], incluyendo tecnologías de cifrado basadas en certificados
               a terceros [Redes y Seguridad]. Y como es lógico, no podemos pasar sin los conocimientos de
               HTML, CSS, PHP y Javascript que nos permiten dar forma a la web que el usuario final va a usar
               de manera cómoda y eficaz [Aplicaciones Web].</p>
          </div>
        </div>
      </div>

      <!-- FOOTER CLASS -->
      <?php
        include '../php/footer.php';
       ?>

    <!-- END WRAPPER CLASS -->
    </div>

  </body>
</html>
