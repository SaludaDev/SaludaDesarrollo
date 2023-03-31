function MedicosCreditos(){


    $.post("https://saludaclinicas.com/AdminPOS/Consultas/MedicosCreditos.php","",function(data){
      $("#TableMedicosCreditos").html(data);
    })

  }
  
  
  
  MedicosCreditos();