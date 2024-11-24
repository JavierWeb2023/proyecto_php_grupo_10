<header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <img src="" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $_SESSION['username'] ?> <?= $_SESSION['surename'] ?></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="http://localhost/tf-php-avanzado/turnos/">GENERAR TURNOS</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="http://localhost/tf-php-avanzado/usuarios/perfil.php">VER PERFIL</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="http://localhost/tf-php-avanzado/usuarios/logout.php">CERRAR SESI&Oacute;N</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
