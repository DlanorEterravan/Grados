<div class="container-fluid mt-4">
        <div class="col">
            <div class="card card-body" style="background-color:  #c3edfc;">
                <b style="color:  #2e738a;" class="card-title m-0">Registro de grado</b>
            </div>
            <div class="card card-body">
                <form id="form">
                    <div class="row m-0">
                        <div class="form-group col ">
                            <b><i class="fa-solid fa-barcode"></i> Código: </b>
                            <input name="codigo" id="codigo" class="form-control" style="width : 80px;" type="text">
                        </div>

                        <div class="form-group col">
                            <b> <i class="fa-solid fa-chalkboard"></i> Nombre: </b>
                            <input name="nombre" id="nombre" class="form-control" style="width : 300px;" type="text">
                        </div>

                        <div class="form-group col">
                            <b> <i class="fas fa-compress-alt"></i> Abreviatura: </b>
                            <input name="abreviatura" id="abreviatura" class="form-control" style="width : 150px;" type="text">
                        </div>

                        <div class="form-group col">
                            <b> <i class="fa-solid fa-list-ul"></i> Sección: </b>
                            <input name="seccion" id="seccion" class="form-control" style="width : 150px;" type="text">
                        </div>

                        <div class="form-group col">
                            <b> <i class="fa-solid fa-arrow-trend-up"></i>  Nivel</b>
                            <select name="nivel" id="nivel" class="form-select" style="width : 200px;" name="select">
                                <?php
                                    $lvl = new Niveles();
                                    $seccion = $lvl->showNiveles();
                                    foreach($seccion as $opciones){
                                ?>

                            <option value="<?php echo $opciones['id_nivel']?>"> <?php echo $opciones['nombre']?> </option>
                                <?php } ?> <!-- endforeach -->
                            </select>
                        </div>

                        <div class="form-group col">
                            <b> <i class="fa-solid fa-arrow-right-arrow-left"></i> Estado</b>
                            <select name="estado" id="estado" class="form-select" style="width : 200px;" name="select">
                                <option value="a">Activo</option>
                                <option value="i">Inactivo</option>
                            </select>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" id="guardar-alert" class="btn btn-info mt-4 hvr-grow" style="color: white; width: 100px;">
                        <h6><i class="far fa-hand-point-right"> Guardar </i></h6>
                        </button>
                   </div>
                </form>
            </div>
        </div>
</div>
