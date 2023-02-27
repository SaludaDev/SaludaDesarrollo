
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function MuestraIngreso() {
        element = document.getElementById("FormIngreso");
        check = document.getElementById("ingreso");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function MuestraProcedimiento(){
        element = document.getElementById("FormProcedimientos");
        check = document.getElementById("procedimientos");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
    function MuestraAnalisis(){
        element = document.getElementById("FormAnalisis");
        check = document.getElementById("analisis");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }