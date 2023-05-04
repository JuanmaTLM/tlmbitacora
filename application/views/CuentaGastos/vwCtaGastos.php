
<style type="text/css">
  input[type=text], input[type=file],input[type=date],input[type=number],select{
    border : none;
    border-bottom: 1px solid black;
  }
.flex-container{
    width: 90%;
    margin-left :5%;
    margin-right :5%
  }
  .graphics{
    width: 90%;
    height: 100%;
    padding-top: 2%;
    margin-left: 2%;
    margin-right: 2%;
    border : 2px outset darkblue;
  }
  .graph{
    width: 100% !important;
    height:100% !important;

  }
  table{
    width: 90% !important;
  }
</style>

<div class="modal" id="modCtaGastos">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Cuenta de Gastos: <?php echo $cuentaGastos['cveCtaGasto']?></h4>
      </div>

      <!-- Modal body -->
      <div class="modal-body">


        <!-- Nav tabs -->
        <ul class="nav nav-tabs">
          <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#mnuTotales">Cuentas Totales
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#mnuDeposito"> Depósitos </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#Gastos">Gastos </a>
          </li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane container active" id="mnuTotales">
            <br>
            <div class="d-flex flex-wrap justify-content-center flex-container flex-column">
              <div class="p-2 graphics rounded bg-light">
                <canvas id="grafica" class="graph p-1" ></canvas>
                
              </div>
              
            </div>
          </div>

          <script type="text/javascript">
           let totIngresos = <?php echo $totIngresos['TotalDepositos'];?>;  
           let totEgresos = <?php echo $totEgresos['TotalPagos'];?>;
           let Pagados = <?php echo $getPagados['Pagados'];?>;
           let NoPagados = <?php echo $getNoPagados['NoPagados'];?>;  
           let TotDepositos = <?php echo $getTotDepositos['TotalDepositos'];?>;  

           let ctaGastos = " <?php echo $cuentaGastos['cveCtaGasto']?>";
           var grafica = document.getElementById("grafica");
           let dif = 0.00;



           dif = parseFloat((totIngresos) - parseFloat(totEgresos)).toFixed(2);

           Chart.defaults.global.defaultFontFamily = "Lato";
           Chart.defaults.global.defaultFontSize = 18;

           var xValues = ["Depósitos", "Gastos", "Diferencia"];
           var yValues = [totIngresos, totEgresos, dif];
           var barColors = ["lightblue", "lightgreen"];
           if(dif <=0)
            barColors.push("red");
            else
            barColors.push("green");

           new Chart("grafica", {
             type: "bar",
             data: {
               labels: xValues,
               datasets: [{
                 backgroundColor: barColors,
                 data: yValues
               }]
             },
             options: {
               legend: {display: false},
               title: {
                 display: true,
                 text: "Cuenta de gastos "+ ctaGastos
               }
             }
           });
          </script>
          
          <div class="tab-pane container fade" id="mnuDeposito">
                
                <div class="d-flex flex-wrap justify-content-end">
                  <div class="p-3">
                    <button class="btn btn-outline-success" data-target="#modAddDeposito" data-toggle="modal">Agregar Anticipo/Depósito</button>
                  </div>
                </div>

                <div class="d-flex flex-wrap justify-content-center flex-container">
                    <table class="table table-hover" id="tblDepositosList">
                         <thead>
                           <tr class="bg-info">
                             <th class="text-center text-white">Referencia del Banco</th>
                             <th class="text-center text-white">Cantidad</th>
                             <th class="text-center text-white">Tipo</th>
                             <th class="text-center text-white">Moneda</th>
                             <th class="text-center text-white">Valor al Cambio</th>
                             <th class="text-center text-white">Total</th>
                             <th class="text-center text-white">Fecha</th>
                             <th class="text-center text-white">Acciones</th>
                           </tr>
                         </thead>
                         <tbody><?php 
                            if($listaDepositos){
                              foreach ($listaDepositos as $deposito) {
                                  if ($deposito['txtFDepName'] == null) {
                                     echo '<tr class="table-warning">';
                                  }else{
                                     echo '<tr class="table-success">';
                                  }
                                  echo '<td class="text-center">'.$deposito['cveReferenciaBanco']. '</td>';
                                  echo '<td class="text-center">'.$deposito['txtConcepto']. '</td>';
                                  echo '<td class="text-center">'.$deposito['flCantidad']. '</td>';
                                  echo '<td class="text-center">'.$deposito['txtMoneda']. '</td>';
                                  echo '<td class="text-center">'.$deposito['flValorCambio']. '</td>';
                                  echo '<td class="text-center">'.$deposito['flTotal'] .'</td>';
                                  echo '<td class="text-center">'.$deposito['feDeposito'] .'</td>';
                                   echo '<td class="text-center">';
                                   ?>
                                    <div class="d-flex flex-wrap justify-content-center">
                                   <?php 
                                     echo '<div class="m-1"><button class="btn btn-outline-info btn-sm" title="Información del Gasto"><span class="fas fa-exclamation-circle" onclick="info('.$deposito['eIdDeposito'].',0);"></span></button></div>';
                                     //echo '<div class="m-1"><button class="btn btn-outline-danger btn-sm" title ="Eliminar Gasto"><span class="fas fas fa-trash-alt"></span></button></div>';
                                     
                                    if ($deposito['txtFDepName']== null) {
                                     echo '<div class="m-1"><button class="btn btn-outline-dark btn-sm" title ="Subir comprobante de pago" onclick="addDocument('.$deposito['eIdDeposito'].',0);"><span class="fas fa-file-upload"></span></button></div>';
                                    }
                                    echo '</div>';
                                   echo '</td>';
                                echo '</tr>';

                               }
                            }
                          ?>
                          
                         </tbody>
                    </table>
                </div>

          </div>
          <div class="tab-pane container fade" id="Gastos">
            <div class="d-flex flex-wrap justify-content-end">
              <div class="p-3"><button class="btn btn-outline-success" data-target="#modAddGasto" data-toggle="modal">Agregar Gasto</button></div>
            </div>
            <div class="d-flex flex-wrap justify-content-center flex-container">
                 <table class="table table-hover" id="tblGastosList">
                     <thead>
                       <tr class="bg-info">
                         <th class="text-center text-white">Gasto</th>
                         <th class="text-center text-white">Valor</th>
                         <th class="text-center text-white">Fecha de Pago</th>
                         <th class="text-center text-white">Acciones</th>
                       </tr>
                     </thead>
                     <tbody><?php 
                        if($listaGastos){
                          foreach ($listaGastos as $gasto) {
                            if ($gasto['bPagado']== 0) {
                               echo '<tr class="table-danger">';
                            }else{
                               echo '<tr class="table-success">';
                            }
                           
                              echo '<td class="text-center">' .$gasto['txtGasto']. '</td>';
                              echo '<td class="text-center">' .$gasto['txtValor'] .'</td>';
                                  echo '<td class="text-center">';
                              

                                if ($gasto['bPagado'] == 1) {
                                  echo $gasto['fePago'];
                                }else{

                                  echo "-";

                                } 
                               
                               echo '</td>';
                               echo '<td class="text-center">';
                               ?>
                                <div class="d-flex flex-wrap justify-content-center">
                               <?php 
                                 echo '<div class="m-1"><button class="btn btn-outline-info btn-sm" title="Información del Gasto"><span class="fas fa-exclamation-circle" onclick="info('.$deposito['eIdDeposito'].',1);"></span></button></div>';
                                 //echo '<div class="m-1"><button class="btn btn-outline-danger btn-sm" title ="Eliminar Gasto"><span class="fas fas fa-trash-alt"></span></button></div>';
                                 
                                if ($gasto['bPagado']== 0) {
                                 echo '<div class="m-1"><button class="btn btn-outline-dark btn-sm" title ="Subir comprobante de pago" onclick="addDocument('.$gasto['eIdLiGastos'].',1);"><span class="fas fa-file-upload"></span></button></div>';
                                }
                                echo '</div>';
                               echo '</td>';
                            echo '</tr>';

                           }
                        }
                      ?>
                      
                     </tbody>
                   </table>
            </div>
          </div>
        </div>


        
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <div class="d-flex flex-wrap justify-content-center">
          <div>
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal" >Cerrar</button>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>


