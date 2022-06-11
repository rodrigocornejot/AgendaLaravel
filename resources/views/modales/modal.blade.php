<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<div class="modal fade" id="modal_crear">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Crear Evento</h4>
      </div>
      <div class="modal-body">
        <form action="">
          <label>Añade empleados:</label>
        {{-- <select style="display:block" multiple class="form-control" required class="form-control" title="Añadir trabajador"  data-actions-box="true"  data-live-search="true" id="select_personal">
              @foreach ($empleados as $item)
              <option value="{{$item->id_empleados}}">{{$item->empleado}}</option>
              @endforeach
        </select> --}}
            
          <select class="form-select" name="" id="personal" multiple aria-label="multiple select example">
            @foreach ($empleados as $item)
            <option value="{{$item->id_empleados}}">{{$item->empleado}}</option>
            @endforeach
          </select>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Tarea a realizar: </label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div> 
          <div class="modal-footer">
            <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
            <button type="button" class="btn btn-primary success">Enviar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<script src="{{ asset('js') }}/popper.min.js"></script> 
<link href="{{ asset('bootstrap-select-1.13.14') }}/dist/css/bootstrap-select.min.css" rel="stylesheet" />
<script src="{{ asset('bootstrap-select-1.13.14') }}/dist/js/bootstrap-select.min.js"></script>


<script>
  $('#select_personal').selectpicker();
  </script>
 