<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Inclunet Space conecta personas comprometidas con el cambio social mediante oportunidades de voluntariado inclusivas.">
    <meta name="keywords" content="voluntariado, inclusión, cambio social, organizaciones, desarrollo personal">
    <meta name="author" content="Inclunet Space">
    <meta property="og:title" content="Inclunet Space - Voluntariado e Inclusión Social">
    <meta property="og:description" content="Descubre oportunidades de voluntariado y ayuda a transformar comunidades con Inclunet Space.">
    <meta property="og:image" content="Imagenes/Hero.jpg">
    <meta property="og:url" content="https://tu-sitio.com">
    <meta name="twitter:card" content="summary_large_image">
    <title>Inclunet Space - Voluntariado e Inclusión Social</title>
    <link rel="stylesheet" href="stylesG.css">
    <link rel="stylesheet" href="stylesI.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
</head>
<body>
    <header id="header" class="header">
        <div class="logo">
            <img src="Imagenes/logoinclunetspace.png" alt="Inclunet Space logo">
        </div>
        <div>
            <nav>
                <ul>
                    <li><a href="cita.html">Agenda tu cita</a></li>
                    <li><a href="voluntariado.php">Voluntariado</a></li>
                    <!--<li><a href="organizaciones.php">Organizaciones</a></li>-->
                </ul>
                <?php if (!isset($_COOKIE['Nombre'])) { ?>
                    <div class="header-buttons">
                        <a href="singin.html">
                            <button class="login-btn">Iniciar sesión</button>
                        </a>
                        <a href="singup.html">
                            <button class="signup-btn">Registrarse</button>
                        </a>
                    </div>
                <?php } else { ?>
                    <div class="user-menu-container">
                        <!-- Botón para mostrar el menú -->
                        <button class="login-icon" onclick="toggleDropdown()">Bienvenido, <?php echo htmlspecialchars($_COOKIE['Nombre']); ?> </button>
        
                         <!-- Menú desplegable -->
                        <div id="user-menu" class="dropdown-menu">
                            <a href="perfil.php">Mi perfil</a>
                            <?php if (isset($_COOKIE['tipo_usuario']) && $_COOKIE['tipo_usuario'] === 'organizacion') { ?>
                                <a href="evento_prueba.php">Panel</a>
                            <?php } ?>
                            <a href="singout.php" onclick="window.location.reload();">Cerrar sesión</a>
                        </div>
                    </div>
                <?php } ?>
            </nav>
        </div>     
    </header>

    <main>
        <!-- Hero Section -->
    <div class="hero">
        <img src="Imagenes/hero.webp" alt="Personas colaborando en actividades comunitarias">
        <h1>Inclunet Space</h1>
        <h2>Conecta con tu propósito: <br> Haz la diferencia hoy</h2>
        <p>Únete a proyectos que transforman comunidades <br> y deja tu huella en el mundo.</p>
        <a href="evento_prueba.php">
            <button  class="cta-hero"> Explorar Oportunidades de Voluntariado</button>
        </a> 
    </div>

    <!--sobre nosotros -->
    <section class="nosotros-platforma">
        <article>
        <h2>¿Qué es <span class="title-second-color">Inclunet Space?</h2>
        <p>Inclunet Space es una plataforma innovadora que conecta a voluntarios con organizaciones sin fines de <br>
            lucro para crear un impacto positivo en la sociedad. Facilita la búsqueda de oportunidades de voluntariado <br> 
            personalizadas y permite a las organizaciones gestionar sus proyectos de manera eficiente.</p>
        <div class="cards-container">
            <div class="card-nosotrosv">
                
                <h3>Para Voluntarios</h3>
                <?php if (!isset($_COOKIE['Nombre'])) { ?>
                <a href="voluntariado.html">
                    <button  class="cta-nosotrosv">Explora oportunidades ahora</button>
                </a> 
                <?php } ?> 
            </div>
            <div class="card-nosotroso">
                
                <h3>Para Organizaciones</h3>
                <?php if (!isset($_COOKIE['Nombre'])) { ?>
                <a href="signup.html">
                    <button  class="cta-nosotroso">Registra tu organización</button>
                </a> 
                <?php } ?>
                 
            </div>
        </div>
        </article>
    </section>

    <!-- Beneficios de Usar Nuestra Plataforma -->
    <section class="beneficio-plataforma">
        <div class="container-beneficios">
            <h2>Haz que tu <span class="title-second-color">tiempo cuente</h2>
            <p> 
                Descubre cómo nuestra plataforma hace que el voluntariado sea más fácil, accesible y significativo.
            </p>
      
            <div class="beneficio-cards">
                <!-- Card 1 -->
                <div class="beneficio-card">
                    <div class="icon-card1">
                        <i class="fa-solid fa-map-location-dot"></i>
                    </div>
                    <h3>Explora Oportunidades</h3>
                    <p>
                        Accede a una amplia variedad de proyectos y actividades de voluntariado. 
                    </p>
                </div>
      
                <!-- Card 2 -->
                <div class="beneficio-card">
                    <div class="icon-card2">
                        <i class="fa-solid fa-handshake"></i>
                    </div>
                    <h3>Conexión Directa con Organizaciones</h3>
                    <p>
                        Comunícate fácilmente con las organizaciones y encuentra el rol perfecto para ti.
                    </p>
                </div>
      
                <!-- Card 3 -->
                <div class="beneficio-card">
                    <div class="icon-card3">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h3>Construye tu Perfil como Voluntario</h3>
                    <p>
                        Registra tus experiencias y habilidades, y lleva un historial de tus contribuciones.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!--CTA-->
    <section class="cta">
        <h2>¿Listo para marcar la diferencia?</h2>
        <p>Únete a nuestra comunidad de voluntarios y transforma vidas con tus acciones</p>
         <?php if (!isset($_COOKIE['Nombre'])) { ?>
            <a href="signup.html">
                <button  class="btn-cta">Resgistrate ahora</button>
            </a> 
          <?php } ?> 
    </section>

    <!--Como funciona-->
    <section class="como-funciona">
        <div class="container-como-funciona">

            <div class="imagen-container">
                <div class="imagen-como-funciona">
                    <img src="Imagenes/como_funciona_voluntarios.webp" alt="Como funciona voluntarios" class="call-img">
                </div>
            </div>
            
            <div class="texto-content">
                <h2>
                     ¿Cómo funciona <span class="title-second-color">Inclunet Space</span> para voluntarios?
                </h2>
                <ul class="lista-pasos">
                    <li>
                        <i class="fa-solid fa-user-plus"></i>
                        Regístrate: Crea una cuenta con tu información básica e inicia sesión.
                    </li>
                    <li>
                        <i class="fa-solid fa-magnifying-glass-location"></i>
                        Explora oportunidades: Navega entre las diversas causas y proyectos de tus intereses.
                    </li>
                    <li>
                        <i class="fa-solid fa-user-group"></i>
                        Únete a una causa: Elige la oportunidad que más te motive y empieza a ayudar.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <section class="como-funciona">
        <div class="container-como-funciona">
            
            <div class="texto-content">
                <h2>
                     ¿Cómo funciona <span class="title-second-color">Inclunet Space</span> para Organizaciones?
                </h2>
                <ul class="lista-pasos">
                    <li>
                        <i class="fa-solid fa-user-plus"></i>
                        Crea tu perfil: Registra tu organización proporcionando los detalles necesarios.
                    </li>
                    <li>
                        <i class="fa-solid fa-share-from-square"></i>
                        Publica oportunidades: Crea y publica las oportunidades de voluntariado disponibles.
                    </li>
                    <li>
                        <i class="fa-solid fa-address-card"></i>
                        Conecta con voluntarios: Recibe postulaciones de voluntarios comprometidos y coordina con ellos.
                    </li>
                </ul>
            </div>

            <div class="imagen-container">
                <div class="imagen-como-funciona">
                    <img src="Imagenes/como_funciona_organizaciones.webp" alt="Como funciona voluntarios" class="call-img">
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Inclunet Space - Todos los derechos reservados</p>
    </footer>
</body>
</html>