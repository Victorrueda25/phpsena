<div class="container py-5">
    <h2 class="text-center">Perfil del Usuario</h2>
    <p class="text-center">Aquí puedes registrar la información del perfil del usuario.</p>

    <form action="#" method="POST" class="mx-auto" style="max-width: 600px;">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre completo</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresa el nombre">
        </div>

        <?php

                            /*=============================================
                            FORMA EN QUE SE INSTA­NCIA LA CLASE DE UN MÉTODO ESTÁTICO
                            =============================================*/

                            $registro = ControladorPerfil::ctrRegistrarPerfil();

                            if ($registro === 'ok') {
                                // Aquí sí entra cuando el método devuelve "ok"
                                echo '<script>
                                    if (window.history.replaceState) {
                                        window.history.replaceState(null, null, window.location.href);
                                    }
                                </script>';
                                echo '<div class="alert alert-success">El usuario ha sido registrado</div>';
                            }

                            ?>

        <button type="submit" class="btn btn-primary w-100">Registrar Perfil</button>
    </form>
</div>