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
      <?php
      include '../php/navbar.php';
       ?>

      <!-- SIDEBAR CLASS -->
		<div class="sidebarLeft">
        <ul>
		  <li>
            <button onclick="switchProjectClick('About')" autofocus>
              About Us
            </button>
          </li>
          <li>
            <button onclick="switchProjectClick('Hardware')">
                Hardware
            </button>
          </li>
          <li>
            <button onclick="switchProjectClick('Servicios')">
                Services
            </button>
          </li>
          <li>
            <button onclick="switchProjectClick('Configuraciones')">
                Settings
            </button>
          </li>
          <li>
            <button onclick="switchProjectClick('Tecnologias')">
              Technologies
            </button>
          </li>
        </ul>
      </div>
      <!-- SIDEBAR CLASS -->
      <div class="sidebarRight">
      </div>

      <!-- CONTENT CLASS -->
      <div id="content">
  		  <div id="About" class="projectElem">

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

          <div id="Hardware" class="projectElem" style="display: none">
            <h1>Hardware</h1>
           <p>
              arduino, sensores, raspberry, fotos...

              Utilizaremos un modulo Arduino que consiste en una placa de circuito impreso con un microcontrolador, puertos digitales y analógicos de entrada/salida a los cuales coneectaremos un kit de sensores, desde los que tomaremos distintas medidas ambienteales. Aunque disponemos de una amplia lista sensores,  el proyecto se centra principalmente en los de temperatura y humedad, pero esperamos que esto sea segun los gustos de los usuarios.
              <img src="../images/sensores.jpg" id="sensores" alt="Imagen">
            </p>
              <img src="../images/sensorTH.jpg " id="sensorTH" alt="Imagen">
            <p>
              Los sensores de temperatura y humedad que usamos tienen un rango de medicion de 20%-90% de HR para la humedad y temperatura de 0-50℃ y una precision de 2℃ y 5%HR. De los datos recogidos y almacenados en la base de datos, generaremos gráficas y recomendaciones "inteligentes" segun el usuario.
            </p>

          </div>

          <div id="Servicios" class="projectElem" style="display: none">
            <h1>Services</h1>
             <p>

              Utilizaremos una LAMP para montar nuestro propio servidor donde alojaremos la pagina web y la base de datos.
              Una LAMP es el acrónimo usado para describir un sistema de infraestructura de internet que usa las siguientes herramientas:

              <ul>
                <li>Linux, el sistema operativo; En algunos casos también se refiere a LDAP.</li>
                <li>Apache, el servidor web;</li>
                <li>MySQL/MariaDB, el gestor de bases de datos;</li>
                <li>Perl, PHP, o Python, los lenguajes de programación.</li>
              </ul>

              Que genarará nuestro servidor web.


            <img src="../images/LAMP.png" id="LAMPIM" alt="Imagen">


          </div>

          <div id="Configuraciones" class="projectElem" style="display: none">
            <h1>Settings</h1>
            <p>
              Se rellenará en la proxima entrega.
              Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus.
            </p>
          </div>

          <div id="Tecnologias" class="projectElem" style="display: none">
            <h1>Technologies</h1>
            <p>
              Como tecnologías actuales queremos implementar un servicio REST para que los usuarios puedan añadir sus propios sensores y sean adaptables a cualquier tipo de entrada indistintamente de la forma en la que se introduzcan los datos.
              Para mas información sobre REST y los servicios Web pinche <a href="http://users.dsic.upv.es/~rnavarro/NewWeb/docs/RestVsWebServices.pdf" target="_blank">aquí.</a>

            </p>
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
