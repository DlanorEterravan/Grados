<!-- Modal Eliminar -->
<div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel"><i class="fa-solid fa-trash"></i> Eliminar Grado</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         <p>¿Esta seguro que quiere elminar el grado <b><span class="nombre"></span></b> de codigo <b><span class="codigo"></span></b>?</p>
      </div>
      <div class="modal-footer">
        <button type="button" id="grado-delete" class="confirmar-delete btn btn-danger" data-bs-dismiss="modal">
            <i class="fa-solid fa-trash"></i> Eliminar
        </button>
      </div>
    </div>
  </div>
</div>



<!-- Modal Edit -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fa-solid fa-pen"></i> Modificar Grado</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form-edit">
                <div class="row">
                    <div class="col">  
                            <input id="recipient-id" type="hidden" class="form-control">
                        <div class="mb-3">
                            <label for="recipient-codigo" class="col-form-label">Codigo:</label>
                            <input id="recipient-codigo" type="text" class="form-control">
                        </div> 
                    </div>
                    <div class="col">
                        <div class="mb-3">
                            <label for="recipient-nombre" class="col-form-label">Nombre:</label>
                            <input type="text" class="form-control" id="recipient-nombre">
                        </div>
                    </div> 
                </div>

                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="recipient-abreviatura" class="col-form-label">Abreviatura:</label>
                            <input type="text" class="form-control" id="recipient-abreviatura">
                        </div>
                    </div>

                    <div class="col">   
                        <div class="mb-3">
                            <label for="recipient-seccion" class="col-form-label" >Seccion:</label>
                            <input type="text" class="form-control" id="recipient-seccion">
                        </div>
                    </div> 
                </div>
                
                <div class="row">
                    <div class="col">
                        <div class="mb-3">
                            <label for="recipient-nivel" class="col-form-label">Nivel:</label>
                            <select name="nivel" id='recipient-nivel' class="form-select" style="width : 200px;" name="select" required="required">
                                        <?php
                                            $lvl = new Niveles();
                                            $seccion = $lvl->showNiveles();
                                            foreach($seccion as $opciones){
                                        ?>
                                    <option value="<?php echo $opciones['id_nivel']?>"> <?php echo $opciones['nombre'] ?></option>
                                        <?php } ?> <!-- endforeach -->
                            </select>
                        </div>
                    </div>
                
                    <div class="col">                                   
                        <div class="mb-3">
                            <label for="recipient-estado" class="col-form-label">Estado:</label>
                            <select name="estado" id="recipient-estado" class="form-select" style="width : 200px;" name="select" required="required">
                                        <option value="a">Activo</option>
                                        <option value="i">Inactivo</option>
                            </select>
                        </div>
                    </div> 
                </div>
                <div class="modal-footer">
                    <button type="submit" id="modificar" class="btn btn-warning" data-bs-dismiss="modal">
                        <i class="fa-solid fa-pen"></i> Modificar
                    </button>
                </div>
                </form>
            </div>
        </div>  
    </div>
</div>

