$(document).ready(function(){

 var tr=document.getElementById("tr");

  tr.style.display="none";

  
    $('#consultar').on('click',function(){
      

        var data= new FormData();
        data.append('op','todos');

        fetch('prueba.php',{

          method:'POST',
          body:data

        })
        .then(datos=>datos.json())
        .then(datos=>{

           console.log(datos);
           tr.style.display="contents";

           var contenido=document.getElementById("tabla");
                       

           for(let x of datos){

            contenido.innerHTML +=`

            <tr>
                <td>${x.Codigo_Empleado}</td>
                <td>${x.Apellido}</td>
                <td>${x.Oficio}</td>
                <td>${x.Direccion}</td>
                <td>${x.Fecha_Ingreso}</td>
                <td>${x.Salario}</td>
                <td>${x.Comision}</td>
                <td>${x.nombre}</td>
                <td><input type="submit" value="Actualizar" name="Actualizar"></td>
                <td><input type="submit" onclick="return ConfirmDelete()" class=" eliminar" value="Borrar" name="borrar"></td>
                

                </tr>
            
            
            
            
            
            
            
            
            
            `


           }

           

         
          




        })
        





    });
    
});