<div class="container-fluid mt-4">    
    <div class="d-flex bd-highlight">
        <div class="btn-group p-0 w-100 bd-highlight" role="group" aria-label="Basic radio toggle button group">
            <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" checked>
            <label class="btn btn-outline-secondary hvr-overline-from-left" for="btnradio1"><i class="fa-solid fa-check"></i>  Activos</label>

            <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off">
            <label class="btn btn-outline-secondary hvr-overline-from-left" for="btnradio2"><i class="fa-solid fa-ban"></i> Deshabilitados</label>
        </div>
    </div>
    
<!-- Clases Activas -->
    <table id="p1" class="table">
        <thead class="table-secondary">
            <th>Código</th>
            <th class="w-50">Nombre</th>
            <th class="w-10">Abreviatura</th>
            <th class="w-10">Sección</th>
            <th class="w-20">Nivel</th>
            <th class="d-flex justify-content-center">Acciones</th>
        </thead>
        <tbody id="respoActive"></tbody>
        <tbody id="respoInactive" class="hidden"></tbody>
    </table>
</div>
