<?php

session_start();

include('assets/includes/conexion.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONTACTO</title>
    <link rel="icon" href="assets/images/favicon.webp" sizes="32x32">
    <meta name="robots" content="noindex, nofollow">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/estilos.css">
    <script src="https://kit.fontawesome.com/ba8d58fd8a.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <!-- =============== HEADER =============== -->
     
    <?php
    if (isset($_SESSION['userid'])) {

        include 'assets/includes/headerlog.php';
    }
    else{
        include 'assets/includes/header.php';
    }
    
    ?>

    <!-- =============== FIN DEL HEADER =============== -->



    <!-- =============== SECCIÓN 1 =============== -->

    <section>
      <div class="container centrado">
        <div class="row">
          <div class="col">
            <div class="login">
              <form id="my-form" action="https://formspree.io/f/xbljabpo" method="POST">
                <label for="email"><i class="fa-solid fa-envelope"></i></label>
                <input type="email" name="email" id="email" placeholder="Email">
                <label for="message"><i class="fa-regular fa-message"></i></label>
                <input type="text" name="message" id="message" placeholder="Mensaje">
                <input type="submit" id="my-form-button" value="ENVIAR">
                <p id="my-form-status"></p>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- =============== FIN DE SECCIÓN 1 =============== -->



    <!-- =============== FOOTER =============== -->

    <?php include 'assets/includes/footer.php'; ?>

    <!-- =============== FIN FOOTER =============== -->


    <script src="assets/js/bootstrap.bundle.min.js"></script>

<script>
  var form = document.getElementById("my-form");
  
  async function handleSubmit(event) {
    event.preventDefault();
    var status = document.getElementById("my-form-status");
    var data = new FormData(event.target);
    fetch(event.target.action, {
      method: form.method,
      body: data,
      headers: {
          'Accept': 'application/json'
      }
    }).then(response => {
      if (response.ok) {
        status.innerHTML = "Gracias por comunicarse.";
        form.reset()
      } else {
        response.json().then(data => {
          if (Object.hasOwn(data, 'errors')) {
            status.innerHTML = data["errors"].map(error => error["message"]).join(", ")
          } else {
            status.innerHTML = "Oops! No se ha podido enviar el mensaje."
          }
        })
      }
    }).catch(error => {
      status.innerHTML = "Oops! No se ha podido enviar el mensaje."
    });
  }
  form.addEventListener("submit", handleSubmit)
</script>

</body>

</html>
