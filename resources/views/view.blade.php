<!DOCTYPE html>
<html>
<head>
  <title>AGENDA - ALEPH SAC</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="icon" type="image/png" href="{{ asset('img') }}/iconcalendar.svg">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<body>
    <div class="container">
        <i class="fa-solid fa-calendar-day"></i>
        <div class="response">        
        </div>
        <div id='calendar'></div>  
        @extends('modales.modal')
    </div>
</body>
</html>


<script>
    $(document).ready(function () {
        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
   
        var calendar = $('#calendar').fullCalendar({
            editable: true,
            events: SITEURL + "/fullcalendareventmaster",
            displayEventTime: true,
            editable: true,
            eventRender: function (event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function (start, end, allDay, personal) {
               $('#modal_crear').modal('show');
                
            if (title) {
                    
                var personal = document.getElementById("personal");
                var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
   
                $.ajax({
                    url: SITEURL + "/fullcalendareventmaster/create",
                    data: 'title=' + title + '&start=' + start + '&end=' + end,
                    type: "POST",
                    success: function (data) {
                    displayMessage("Agregado Exitosamente");          
                    }
                });
            calendar.fullCalendar('renderEvent',
            {
                title: title,
                start: start,
                end: end,
                allDay: allDay
            },
            true
            );
        }
            calendar.fullCalendar('unselect');
        },
        
        //desplazar o editar evento

        eventDrop: function (event, delta) {
            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                $.ajax({
                            url: SITEURL + '/fullcalendareventmaster/update',
                            data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                            type: "POST",
                            success: function (response) {
                            displayMessage("Actualizado Exitosamente");
                            }
                        });
                    },
        
        //Eliminar evento

        eventClick: function (event) {
            var deleteMsg = confirm("Quieres eliminar el evento?");
                if (deleteMsg) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/fullcalendareventmaster/delete',
                        data: "&id=" + event.id,
                        success: function (response) {
                            if(parseInt(response) > 0) {
                                $('#calendar').fullCalendar('removeEvents', event.id);
                                displayMessage("ELIMINADO");
                            }
                        }
                    });
                }
            }
        });
    });
   
    function displayMessage(message) {
      $(".response").html(""+message+"");
      setInterval(function() { $(".success").fadeOut(); }, 1000);
    }
  </script>
@stack('scripts')
