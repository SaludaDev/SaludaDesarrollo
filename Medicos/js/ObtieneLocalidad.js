$('document').ready(function(){
    $('#municipio').on('change', function(){
            if($('#municipio').val() == ""){
                $('#procede').empty();
                $('<option value = "">Elige una hora</option>').appendTo('#procede');
                $('#procede').attr('disabled', 'disabled');
            }else{
                $('#procede').removeAttr('disabled', 'disabled');
                $('#procede').load('Consultas/Obtienelocalidad.php?municipio=' + $('#municipio').val());
            }
    });
});