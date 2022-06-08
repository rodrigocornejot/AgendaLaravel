$(document).on("click",".btn-view-crear", function(){
    valor_IDcontrato = $(this).val();
    $.ajax({
        url: base_url + "Controllers/FullCalendarEventMaster/crear",
        type:"POST",
        dataType:"html",
        data:{id:valor_crear},
        success:function(data){
        $("#modal_crear .modal-body").html(data);
        }
    });
});
