<footer id="footer" class="blockquote-footer fixed-bottom">
<?php 
    echo 'Ultimo inicio de sesión '.  $_SESSION['sesion'];
?>    
<br>
Gestión de incidencias del <a href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por David Plaza Diaz
</footer>

<script>
    window.addEventListener('DOMContentLoaded', (evento) => {
        /* Obtenemos la fecha de hoy en formato ISO */
        const hoy_fecha = new Date().toISOString().substring(0, 10);
        /* Buscamos solo las etiquetas que tengan el atributo "max" en "hoy" */
        document.querySelectorAll("input[type='date'][max='hoy']")
        .forEach(elemento => {
            /* A cada elemento encontrado le asignamos el atributo "max" */
            elemento.max = hoy_fecha;
        });

    });

    document.body.addEventListener("load", cambiarFecha());
    function cambiarFecha() {
        try {
            const fecha_a = document.getElementsByName('fecha_alta');
            const fecha_rev = document.getElementsByName('fecha_rev');
            const fecha_sol = document.getElementsByName('fecha_sol');
            
            //console.log(fecha_a[0].value);
            if (fecha_a != "") {
                fecha_rev[0].min = fecha_a[0].value;
                fecha_sol[0].min = fecha_a[0].value;
            }
        } catch (error) {
            
        }
    }
    
    function secureDelete(usuario, id) {
        if(confirm("¿Confirmas que quieres eliminar al usuario "+usuario+"?")) {
            location.href = 'delete_rol.php?eliminar='+id;
        }
    }

    $(document).ready(function() {
        $('#planta').change(function() {
            var valorSelect1 = $(this).val();
            $.ajax({
                url: 'components/aulas.php',
                method: 'POST',
                data: { opcion: valorSelect1 },
                success: function(data) {
                    $('#aula').html(data);
                }
            });
        });
    });
            
</script>

</body>
</html>