
    document.addEventListener('DOMContentLoaded', function() {

        let formulario = document.getElementById('form1');
        var calendarEl = document.getElementById('agenda');
        var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          locale:'es',
          headerToolbar: {
            left: 'prev,next,today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,listWeek'

          },

          events: "http://127.0.0.1:8000/admin/evento/mostrar",

          eventClick: function (info) {

            var evento = info.event;
            console.log(evento);

            axios.post("http://127.0.0.1:8000/admin/evento/editar/"+info.event.id).
            then(
              (respuesta) => {

                formulario.title.value = respuesta.data.title;
                formulario.id.value = respuesta.data.id;
                formulario.UbicacionUrl.value = respuesta.data.UbicacionUrl;
                formulario.Inmobiliaria.value = respuesta.data.Inmobiliaria;
                formulario.MontoPorcentaje.value = respuesta.data.MontoPorcentaje;
                formulario.Precio.value = respuesta.data.Precio;
                formulario.MetrosContruccion.value = respuesta.data.MetrosContruccion;
                formulario.MetrosTerreno.value = respuesta.data.MetrosTerreno;
                formulario.Predial.value = respuesta.data.Predial;
                formulario.Mantenimiento.value = respuesta.data.Mantenimiento;
                formulario.Observaciones.value = respuesta.data.Observaciones;

                $("#evento").modal("show");
              }
            )
          }

        });
        calendar.render(); 
      });