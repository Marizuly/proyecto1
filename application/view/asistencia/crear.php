<div id="page-wrapper">
   <div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
                <!--<h1 class="page-header">
                    <center> Energym Xtreme</center>
                </h1>-->
                <ol class="breadcrumb">
                    <li class="hover">
                        
                    </li>
                    <li class="active">
                        
                    </li>
                </ol>
            </div>
        </div>

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Asistencia
                </h1>
            </div>
        </div>

        <div class="well">
        
            <form class="form-inline" method='post' action='<?= URL; ?> asistencia/registrar'>
            <div class="form-group">
                            <label for="">N° documento <span class="ast">*</span></label>
                        <select id="documento" name="documento" class="form-control select2">
                                <option value="" selected hidden>Buscar</option>
                                <?php foreach ($res as $k) { ?>
                                <option value="<?php echo $k->idcomprobante ?>"><?php echo $k->documento?></option> 
                                  <?php } ?>
                        </select>     
            </div>  <button type="submit" class="btn btn-success">GUARDAR</button>
            
            </form>
            <div class="table-responsive">  
          <table class="table table-striped" id="dataTable">
            <thead>
              <!--Fila-->
              <tr>
                <!--Columna-->
                <th>Nombres</th>
                <th>Fecha de asistencia</th>
                <th>Fecha de vencimiento</th>
                
              </tr>
            </thead>

            <tbody>
              <!--Listar la varible-->
              <?php foreach($asis as  $value): ?>
                <tr>
                  <td><?= $value->Nombres ?></td>
                  <td><?= $value->entrada ?></td>
                  <td><?= $value->fechaFin ?></td>
                </tr>
              <?php endforeach ?>
            </tbody>
          </table>
        </div>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

