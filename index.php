<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Equipo8">
    <title>My Turn</title>
    <link rel="stylesheet" href="stylesG.css">
    <link rel="stylesheet" href="stylesI.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="script.js" defer></script>
</head>
<body>
    <header id="header" class="header">
        <div class="logo">
            <img src="" alt="Dental Health Space logo">
        </div>
        <div>
            <nav>
                <ul>
                    <li><a href="cita.php">Agenda tu cita</a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
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
                            <a href="mis_citas_pacientes.php">Mis citas</a>
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
        <img src="Imagenes/hero2.webp" alt="Personas colaborando en actividades comunitarias">
        <h1>Dental Health</h1>
        <h2>Tu sonrisa, nuestra prioridad</h2>
        <p>Agenda tu cita de forma fácil y rápida con nuestros especialistas.</p>
        <a href="cita.html">
            <button  class="cta-hero"> Agendar cita</button>
        </a> 
    </div>

    <!--sobre nosotros -->
    <section class="nosotros-platforma">
        <article>
        <h2>¿Por que elegirnos?</h2>
        <p><span class="title-second-color">Atención dental de calidad, pensando en ti</p>
        <p>"En Dental Health, nos dedicamos a cuidar tu sonrisa con un enfoque personalizado, combinando atención humana, tecnología de última generación y un equipo de profesionales altamente capacitados. Cada visita está pensada para ser una experiencia cómoda, segura y transparente, donde resolvemos tus dudas y adaptamos los tratamientos a tus necesidades. Gracias a nuestras modernas instalaciones y a la facilidad para agendar tu cita en línea, te ofrecemos un servicio ágil y de calidad. Nuestro compromiso va más allá del tratamiento: queremos acompañarte en el cuidado continuo de tu salud bucal, ayudándote a sonreír con confianza todos los días."</p>
        </article>
    </section>

    <!-- Beneficios de Usar Nuestra Plataforma -->
    <section class="beneficio-plataforma">
        <div class="container-beneficios">
            <h2>¿Cómo funciona?</h2>
    
            <div class="beneficio-cards">
                <!-- Card 1 -->
                <div class="beneficio-card">
                    <div class="icon-card1">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h3>Regístrate o inicia sesión</h3>
                    <p>
                        Crea tu cuenta en segundos o ingresa si ya la tienes. 
                    </p>
                </div>
      
                <!-- Card 2 -->
                <div class="beneficio-card">
                    <div class="icon-card2">
                        <i class="fa-solid fa-calendar-week"></i>
                    </div>
                    <h3>Escoge fecha y hora</h3>
                    <p>
                        Consulta la disponibilidad y reserva el horario que más te convenga.
                    </p>
                </div>
      
                <!-- Card 3 -->
                <div class="beneficio-card">
                    <div class="icon-card3">
                        <i class="fa-solid fa-clipboard"></i>
                    </div>
                    <h3>Describe tu motivo</h3>
                    <p>
                        Explicanos tu situacion para poder tener una selecciona el tratamiento que necesitas: limpieza, revisión, ortodoncia y más.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2025 Dental Health - Todos los derechos reservados</p>
    </footer>
</body>
</html>