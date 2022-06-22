$(document).ready(function() {
// Global Settings
    fetchTableA(); //cargar tablas activas
    fetchTableInactive(); //cargar tablas inactivas
  
  
//Grados activados
    $("#btnradio1").click(function(){
        $("#respoActive").removeClass("hidden"); // show
        $("#respoInactive").addClass("hidden"); //hide
    });


//Grados deshabilitados
    $("#btnradio2").click(function(){
        $("#respoInactive").removeClass("hidden"); // show
        $("#respoActive").addClass("hidden");  // hide
    });
    
//Guardar grado
    $('#form').submit(e => {
        e.preventDefault();
        const postData = {
            action: "addgrado",
            codigo: $("#codigo").val(),
            nombre: $("#nombre").val(),
            abreviatura: $("#abreviatura").val(),
            seccion: $("#seccion").val(),
            nivel: $("#nivel").val(),
            estado: $("#estado").val(),
        };
        const url = 'GradosAjax.php';
        console.log(postData);
        $.post(url, postData, (response) => {
            $('#form').trigger('reset');
            fetchTableA();
            fetchTableInactive(); 
        }); 
        });

//Seleccionar grado a eliminar
        $(document).on('click', '.grado-delete', (e) => {
            const element = $(this)[0].activeElement.parentElement.parentElement;
            const id = $(element).attr('gradosId');
            const postData = {
                action: "showDeletebyid",
                id: id,
            }
            /* console.log(id); */
            $.post('GradosAjax.php', postData, (response) => {
                /* console.log(response); */
                const grado = JSON.parse(response);
                grado.forEach(grados=> {
                    idgra = grados.id;
                    codigo = grados.codigo;
                    nombre = grados.nombre;  
                });
                $('.nombre').html(nombre);
                $('.codigo').html(codigo);
                $('.confirmar-delete').val(idgra);
            });
            e.preventDefault(); 
          });

//Eliminar grado seleccionado
    $(document).on('click', '.confirmar-delete', (e) => {
            const id = $(".confirmar-delete").val();
            const postData = {
              action: 'deletebyid',
              id: id,
            }
            /* console.log(postData); */
            $.post('GradosAjax.php', postData, (response) => {
              fetchTableA();
              fetchTableInactive();
            });
          });
      

//Mostrar grado a editar grado
    $(document).on('click', '.grado-edit', (e) => {
        const element = $(this)[0].activeElement.parentElement.parentElement;
        const id = $(element).attr('gradosId');
        const postData = {
            action: "showbyid",
            id: id,
        }
        /* console.log(id); */
        $.post('GradosAjax.php', postData, (response) => {
            /* console.log(response); */
            const grado = JSON.parse(response);
            grado.forEach(grados=> {
                idgra = grados.id;
                codigo = grados.codigo;
                nombre = grados.nombre;
                abreviatura = grados.abreviatura;
                seccion = grados.seccion;
                nivel = grados.nivel;
                estado = grados.estado;    
            });
            $('#recipient-id').val(idgra);
            $('#recipient-codigo').val(codigo);
            $('#recipient-nombre').val(nombre);
            $('#recipient-abreviatura').val(abreviatura);
            $('#recipient-seccion').val(seccion);
            $('#recipient-nivel').val(nivel);
            $('#recipient-estado').val(estado);
        });
        e.preventDefault(); 
      });

//Guardar grado editado
    $('#form-edit').submit(e => {
        e.preventDefault();
        const postData = {
            action: "guardarE",
            id: $("#recipient-id").val(),
            codigo: $("#recipient-codigo").val(),
            nombre: $("#recipient-nombre").val(),
            abreviatura: $("#recipient-abreviatura").val(),
            seccion: $("#recipient-seccion").val(),
            nivel: $("#recipient-nivel").val(),
            estado: $("#recipient-estado").val(),
        };
        $.post('GradosAjax.php', postData, (response) => {
            /* console.log(response); */
            fetchTableA();
            fetchTableInactive();
        });
      });

//Mostar tabla Activos;
    function fetchTableA() {
        $.ajax({
        url: 'GradosAjax.php',
        type: 'post',
        data: {action: 'fetchtableActive'},
        success: function(response) {
            const grado = JSON.parse(response); 
            let template = '';
            grado.forEach(grados => {
            template +=   `
                            <tr gradosId="${grados.id}">
                                <td class="w-5" gradosCodigo="${grados.codigo}">${grados.codigo}</td>
                                <td class="w-50" gradosNombre="${grados.nombre}">${grados.nombre}</td>
                                <td class="w-10">${grados.abreviatura}</td>
                                <td class="w-10" >${grados.seccion}</td>
                                <td class="w-20">${grados.nivel}</td>
                                <td class="d-flex justify-content-evenly">
                                    <button type="button" class="grado-edit btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-modal">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button type="button" class="grado-delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                        <i class="fa-solid fa-trash"></i></i> 
                                    </button>


                                </td>
                            </tr>
                            `
            });
            $('#respoActive').html(template);
        }
        });
    }

//Mostrar tabla Inactivos
    function fetchTableInactive() {
        $.ajax({
        url: 'GradosAjax.php',
        type: 'post',
        data: {action: 'fetchtableInactive'},
        success: function(response) {
            const grado = JSON.parse(response)
            let template = '';
            grado.forEach(grados => {
            template +=   `
                            <tr gradosId = "${grados.id}">
                                <td class="w-5">${grados.codigo}</td>
                                <td class="w-50">${grados.nombre}</td>
                                <td class="w-10">${grados.abreviatura}</td>
                                <td class="w-10">${grados.seccion}</td>
                                <td class="w-20">${grados.nivel}</td>
                                <td class="d-flex justify-content-evenly">
                                <button type="button" class="grado-edit btn btn-warning" data-bs-toggle="modal" data-bs-target="#edit-modal">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                                <button type="button" class="grado-delete btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-modal">
                                    <i class="fa-solid fa-trash"></i></i> 
                                </button>
                                </td>
                            </tr>
                            `
            });
            $('#respoInactive').html(template);
        }
        });
    };

   

})
