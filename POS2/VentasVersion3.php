<div id="campos">
    <div class="campo">
        <input type="text" name="campo[]" placeholder="Campo 1">
        <a href="#" class="remover_campo">Remover</a>
    </div>
</div>
<a href="#" id="agregar_campo">Agregar campo</a>
<script>
$(document).ready(function() {
    // Seteamos el máximo de campos
    var campos_max = 10;

    // Contador de campos
    var contador = 1;

    // Agregamos campo inicial
    $('#agregar_campo').click(function(e) {
        e.preventDefault();
        if (contador < campos_max) {
            $('#campos').append('<div class="campo"><input type="text" name="campo[]" placeholder="Campo ' + (contador+1) + '"> <a href="#" class="remover_campo">Remover</a></div>');
            contador++;
        }
    });

    // Remover campos
    $('#campos').on("click",".remover_campo", function(e) {
        e.preventDefault();
        $(this).parent('div').remove();
        contador--;
    });
});

</script>
