<?php
echo '
<!-- formulario de alta de pago -->
<form action="'.BASE_URL.'modified/'.$item->ID.'" method="POST" class="my-5">
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label>Nombre</label>
                <input name="deudor" type="text"value="'.$item->deudor.'" class="form-control">
            </div>
        </div>
 
        <div class="col-9">
            <div class="form-group">
                <label>Cuota numero</label>
                <input name= "cuota" type="number" value="'.$item->cuota.'"class="form-control">
            </div>
        </div>
        <div class="col-9">
            <div class="form-group">
                <label>Cuota Capital</label>
                <input name= "cuota_capital" type="number" value="'.$item->cuota_capital.'" class="form-control">
            </div>
        </div>
    </div>
    <div class="col-9">
            <div class="form-group">
                <label>Fecha de pago</label>
                <input name= "fecha_pago" type="text" value="'.$item->fecha_pago.'"class="form-control">
            </div>
        </div>
    <button type="submit" class="btn btn-primary mt-2">Guardar</button>
</form> ';