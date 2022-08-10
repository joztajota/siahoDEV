<?php

switch ($labor_status_m) {
    case "CREADO": ?>
        <div class="col-xl-3 ">
            <label class="form-label mt-2">Estatus </label>
            <select  id="estatus" name="estatus" class="chosen-select" > 
                <option  value="CREADO">CREADO</option> 
                <option  value="CANCELADO">CANCELADO</option>              
            </select>
        </div>
        
        <div class="col-xl-1 m-0 p-0 "> 
            <label for="" class="form-label mt-2"> &nbsp;&nbsp;</label>                
            <div > 
                <button type="button" onclick="actualizarEstatus(document.getElementById('estatus').value)" style="width: 3em; background-color: #da9434"><img style="position: relative; center: 0px; top: 0px; width: 2em;" src="public/img/sistema/editar2.png"/>
                </button>
            </div>                             
        </div>
<?php   break; 

    case "PRESELECCIONADO": ?>
        <div class="col-xl-3 ">
            <label class="form-label mt-2">Estatus </label>
            <select  id="estatus" name="estatus" class="chosen-select" > 
                <option  value="PRESELECCIONADO">PRESELECCIONADO</option> 
                <option  value="CANCELADO">CANCELADO</option>              
            </select>
        </div>
        
        <div class="col-xl-1 m-0 p-0 "> 
            <label for="" class="form-label mt-2"> &nbsp;&nbsp;</label>                
            <div > 
                <button type="button" onclick="actualizarEstatus(document.getElementById('estatus').value)" style="width: 3em; background-color: #da9434"><img style="position: relative; center: 0px; top: 0px; width: 2em;" src="public/img/sistema/editar2.png"/>
                </button>
            </div>                             
        </div>
    <?php   break; 

    case "VALIDADO": ?>
        <div class="col-xl-3 ">
            <label class="form-label mt-2">Estatus </label>
            <select  id="estatus" name="estatus" class="chosen-select" > 
                <option  value="VALIDADO">VALIDADO</option> 
                <option  value="CANCELADO">CANCELADO</option>          
                <option  value="EJECUCION">EJECUCION</option>  
            </select>
        </div>
        
        <div class="col-xl-1 m-0 p-0 "> 
            <label for="" class="form-label mt-2"> &nbsp;&nbsp;</label>                
            <div > 
                <button type="button" onclick="actualizarEstatus(document.getElementById('estatus').value)" style="width: 3em; background-color: #da9434"><img style="position: relative; center: 0px; top: 0px; width: 2em;" src="public/img/sistema/editar2.png"/>
                </button>
            </div>                             
        </div>

    <?php   break; 

    case "EJECUCION": ?>
        <div class="col-xl-3 ">
            <label class="form-label mt-2">Estatus </label>
            <select  id="estatus" name="estatus" class="chosen-select" > 
                <option  value="EJECUCION">EJECUCION</option> 
                <option  value="SUSPENDIDO">SUSPENDIDO</option>          
                <option  value="EJECUTADO">EJECUTADO</option>  
            </select>
        </div>
        
        <div class="col-xl-1 m-0 p-0 "> 
            <label for="" class="form-label mt-2"> &nbsp;&nbsp;</label>                
            <div > 
                <button type="button" onclick="actualizarEstatus(document.getElementById('estatus').value)" style="width: 3em; background-color: #da9434"><img style="position: relative; center: 0px; top: 0px; width: 2em;" src="public/img/sistema/editar2.png"/>
                </button>
            </div>                             
        </div>
    <?php   break; 

    default: ?>
        <div class="col-xl-4">
            <label class="form-label mt-2">Estatus</label>
            <input type="text" id="estatus" name="estatus" style="text-transform:uppercase;" class="form-control" aria-describedby="passwordHelpBlock" 
            value="<?php echo $labor_status_m;  ?>" disabled >
        </div>
    <?php   break; 

}  ?>

