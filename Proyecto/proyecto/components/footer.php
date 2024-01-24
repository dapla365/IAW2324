
<footer id="footer" class="blockquote-footer fixed-bottom">Gestión de incidencias del <a href="https://iesamachado.org" target="_blank">IES Antonio Machado</a>. Desarrollado por David Plaza Diaz</footer>
<script src="components/darkmode.js"></script>
<script>
        function cambiarPlanta() {
            var planta = document.getElementById('planta').options[document.getElementById('planta').selectedIndex].text;
            var aula = document.getElementById('aula');

            switch (planta) {
                case 'Baja':
                    aula.innerHTML = `
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>`;
                    break;
                case 'Primera':
                    aula.innerHTML = `
                    <option value="101">101</option>
                    <option value="102">102</option>
                    <option value="103">103</option>`;
                    break;
                case 'Segunda':
                    aula.innerHTML = `
                    <option value="201">201</option>
                    <option value="202">202</option>
                    <option value="203">203</option>`;
                    break;
                default:
                    aula.innerHTML = `
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>`;
                    break;
            }
        }

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
            
            
            
            
            

</script>

</body>
</html>