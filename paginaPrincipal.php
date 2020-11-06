<?php
    session_start();
    error_reporting(0);
    $usuario=$_SESSION['username'];

    if($usuario==null || $usuario==''){
        echo"Usted no tiene acceso";
        header("location: index.html");
        die();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagina Principal</title>
        <link rel="stylesheet" href="css/paginaPrincipal.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="icon"  href="https://upload.wikimedia.org/wikipedia/commons/thumb/6/60/Escudo_de_la_Junta_de_Comunidades_de_Castilla-La_Mancha.svg/250px-Escudo_de_la_Junta_de_Comunidades_de_Castilla-La_Mancha.svg.png">
        <script type="text/javascript" src="js/jquery-3.2.1.slim.min.js"></script>
        <script type="text/javascript" src="js/popper.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>
     <header class="enca">
      <div class="wrapper">
           <div class="logo">
                Castilla La Mancha
            </div>
      </div>  
      <nav>
       <?php
        $usuario=strtoupper($usuario);
        echo"<a style='color:white;font-size: 20px;'>Bienvenido $usuario</a>";
        ?>
         <button class="btn" data-toggle="modal" data-target="#ventanaModal">
            <a style="color:white;font-size: 20px;">Cambiar Contraseña</a>
        </button>
        <a href="logica/logout.php">Cerrar Sesión</a>
      </nav>
   </header>


 <div class="modal" id="ventanaModal" tablaindex=-1 role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">  
   <div class="modal-dialog" role="document">  
    <div class="modal-content">
     <form action="logica/cambioContrasena.php" method="post">
      <div class="modal-header">
          <h4 id="tituloVentana">Cambio de Contraseña</h4>
          <button class="close" data-dismiss="modal" aria-label="Cerrar">
              <span aria-hidden="true">&times;</span>
          </button>
      </div>
        <div class="modal-body">
                  <div class="modal-body"> 
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Contraseña Actual:</label>
                        <input type="password" name="passActual" class="form-control" id="recipient-name">
                      </div>
                      <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nueva Contraseña:</label>
                        <input type="password" name="pass1" class="form-control" id="recipient-name">
                      </div>
                       <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Nueva Contraseña:</label>
                        <input type="password" name="pass2"class="form-control" id="recipient-name">
                        </div>
                  </div>      
        </div>  
    <div class="modal-footer">
        <input type="submit" class="btn btn-primary" name="guardar" value="Guardar">         
    </div>
    </form>
   </div>
  </div>
</div>


<table class="tableizer-table">
<thead><tr class="tableizer-firstrow"><th></th><th>Castilla-La Mancha</th><th>Albacete</th><th>Ciudad Real</th><th>Cuenca</th><th>Guadalajara</th><th>Toledo</th></tr></thead><tbody>
 <tr><td>Ambos sexos</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
 <tr><td>Total</td><td>2.044.408</td><td>388.126</td><td>494.895</td><td>195.981</td><td>261.960</td><td>703.446</td></tr>
 <tr><td>0-4</td><td>86.193</td><td>15.792</td><td>19.790</td><td>6.746</td><td>12.045</td><td>31.820</td></tr>
 <tr><td>5-9</td><td>103.989</td><td>18.597</td><td>23.452</td><td>8.166</td><td>14.720</td><td>39.054</td></tr>
 <tr><td>10-14</td><td>112.933</td><td>20.214</td><td>25.932</td><td>9.042</td><td>15.710</td><td>42.035</td></tr>
 <tr><td>15-19</td><td>106.832</td><td>20.198</td><td>24.847</td><td>9.548</td><td>14.395</td><td>37.844</td></tr>
 <tr><td>20-24</td><td>106.684</td><td>21.206</td><td>26.619</td><td>10.207</td><td>12.919</td><td>35.733</td></tr>
 <tr><td>25-29</td><td>111.321</td><td>21.966</td><td>28.282</td><td>10.695</td><td>13.428</td><td>36.950</td></tr>
 <tr><td>30-34</td><td>121.014</td><td>22.891</td><td>29.508</td><td>11.214</td><td>15.628</td><td>41.773</td></tr>
 <tr><td>35-39</td><td>144.796</td><td>26.154</td><td>33.327</td><td>12.342</td><td>20.179</td><td>52.794</td></tr>
 <tr><td>40-44</td><td>167.980</td><td>30.836</td><td>37.328</td><td>14.199</td><td>24.533</td><td>61.084</td></tr>
 <tr><td>45-49</td><td>162.528</td><td>30.655</td><td>37.303</td><td>14.419</td><td>22.939</td><td>57.212</td></tr>
 <tr><td>50-54</td><td>158.714</td><td>31.076</td><td>38.768</td><td>15.579</td><td>20.549</td><td>52.742</td></tr>
 <tr><td>55-59</td><td>148.704</td><td>29.531</td><td>37.796</td><td>15.706</td><td>17.989</td><td>47.682</td></tr>
 <tr><td>60-64</td><td>122.499</td><td>23.635</td><td>31.248</td><td>12.554</td><td>14.688</td><td>40.374</td></tr>
 <tr><td>65-69</td><td>95.927</td><td>18.479</td><td>24.610</td><td>9.920</td><td>11.055</td><td>31.863</td></tr>
 <tr><td>70-74</td><td>85.788</td><td>16.594</td><td>22.549</td><td>9.029</td><td>9.222</td><td>28.394</td></tr>
 <tr><td>75-79</td><td>73.304</td><td>14.747</td><td>19.075</td><td>8.881</td><td>7.176</td><td>23.425</td></tr>
 <tr><td>80-84</td><td>57.282</td><td>11.431</td><td>14.968</td><td>7.352</td><td>5.674</td><td>17.857</td></tr>
 <tr><td>85-89</td><td>48.968</td><td>9.074</td><td>12.570</td><td>6.578</td><td>5.316</td><td>15.430</td></tr>
 <tr><td>90-94</td><td>22.604</td><td>4.010</td><td>5.476</td><td>2.990</td><td>2.847</td><td>7.281</td></tr>
 <tr><td>95-99</td><td>5.582</td><td>896</td><td>1.270</td><td>715</td><td>838</td><td>1.863</td></tr>
 <tr><td>100 y más</td><td>766</td><td>144</td><td>177</td><td>99</td><td>110</td><td>236</td></tr>
 <tr><td>Hombres</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
 <tr><td>Total</td><td>1.023.399</td><td>194.001</td><td>244.783</td><td>98.352</td><td>132.831</td><td>353.432</td></tr>
 <tr><td>0-4</td><td>44.317</td><td>8.210</td><td>10.209</td><td>3.437</td><td>6.128</td><td>16.333</td></tr>
 <tr><td>5-9</td><td>53.480</td><td>9.707</td><td>11.945</td><td>4.158</td><td>7.532</td><td>20.138</td></tr>
 <tr><td>10-14</td><td>58.062</td><td>10.405</td><td>13.306</td><td>4.608</td><td>8.153</td><td>21.590</td></tr>
 <tr><td>15-19</td><td>55.357</td><td>10.339</td><td>12.956</td><td>4.876</td><td>7.487</td><td>19.699</td></tr>
 <tr><td>20-24</td><td>55.088</td><td>11.067</td><td>13.691</td><td>5.197</td><td>6.634</td><td>18.499</td></tr>
 <tr><td>25-29</td><td>57.801</td><td>11.470</td><td>14.751</td><td>5.545</td><td>6.941</td><td>19.094</td></tr>
 <tr><td>30-34</td><td>61.896</td><td>11.810</td><td>15.136</td><td>5.875</td><td>7.965</td><td>21.110</td></tr>
 <tr><td>35-39</td><td>74.635</td><td>13.603</td><td>17.321</td><td>6.464</td><td>10.235</td><td>27.012</td></tr>
 <tr><td>40-44</td><td>86.931</td><td>15.937</td><td>19.118</td><td>7.503</td><td>12.653</td><td>31.720</td></tr>
 <tr><td>45-49</td><td>83.404</td><td>15.640</td><td>18.749</td><td>7.441</td><td>12.020</td><td>29.554</td></tr>
 <tr><td>50-54</td><td>80.809</td><td>15.622</td><td>19.588</td><td>8.014</td><td>10.686</td><td>26.899</td></tr>
 <tr><td>55-59</td><td>75.646</td><td>14.867</td><td>19.001</td><td>8.156</td><td>9.327</td><td>24.295</td></tr>
 <tr><td>60-64</td><td>61.904</td><td>11.764</td><td>15.481</td><td>6.570</td><td>7.594</td><td>20.495</td></tr>
 <tr><td>65-69</td><td>47.548</td><td>8.972</td><td>11.966</td><td>4.973</td><td>5.541</td><td>16.096</td></tr>
 <tr><td>70-74</td><td>40.781</td><td>7.835</td><td>10.323</td><td>4.380</td><td>4.638</td><td>13.605</td></tr>
 <tr><td>75-79</td><td>32.936</td><td>6.589</td><td>8.319</td><td>3.936</td><td>3.445</td><td>10.647</td></tr>
 <tr><td>80-84</td><td>23.640</td><td>4.833</td><td>5.816</td><td>3.151</td><td>2.395</td><td>7.445</td></tr>
 <tr><td>85-89</td><td>19.448</td><td>3.577</td><td>4.794</td><td>2.750</td><td>2.151</td><td>6.176</td></tr>
 <tr><td>90-94</td><td>7.870</td><td>1.445</td><td>1.906</td><td>1.079</td><td>1.009</td><td>2.431</td></tr>
 <tr><td>95-99</td><td>1.652</td><td>266</td><td>370</td><td>216</td><td>264</td><td>536</td></tr>
 <tr><td>100 y más</td><td>194</td><td>43</td><td>37</td><td>23</td><td>33</td><td>58</td></tr>
 <tr><td>Mujeres</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>
 <tr><td>Total</td><td>1.021.009</td><td>194.125</td><td>250.112</td><td>97.629</td><td>129.129</td><td>350.014</td></tr>
 <tr><td>0-4</td><td>41.876</td><td>7.582</td><td>9.581</td><td>3.309</td><td>5.917</td><td>15.487</td></tr>
 <tr><td>5-9</td><td>50.509</td><td>8.890</td><td>11.507</td><td>4.008</td><td>7.188</td><td>18.916</td></tr>
 <tr><td>10-14</td><td>54.871</td><td>9.809</td><td>12.626</td><td>4.434</td><td>7.557</td><td>20.445</td></tr>
 <tr><td>15-19</td><td>51.475</td><td>9.859</td><td>11.891</td><td>4.672</td><td>6.908</td><td>18.145</td></tr>
 <tr><td>20-24</td><td>51.596</td><td>10.139</td><td>12.928</td><td>5.010</td><td>6.285</td><td>17.234</td></tr>
 <tr><td>25-29</td><td>53.520</td><td>10.496</td><td>13.531</td><td>5.150</td><td>6.487</td><td>17.856</td></tr>
 <tr><td>30-34</td><td>59.118</td><td>11.081</td><td>14.372</td><td>5.339</td><td>7.663</td><td>20.663</td></tr>
 <tr><td>35-39</td><td>70.161</td><td>12.551</td><td>16.006</td><td>5.878</td><td>9.944</td><td>25.782</td></tr>
 <tr><td>40-44</td><td>81.049</td><td>14.899</td><td>18.210</td><td>6.696</td><td>11.880</td><td>29.364</td></tr>
 <tr><td>45-49</td><td>79.124</td><td>15.015</td><td>18.554</td><td>6.978</td><td>10.919</td><td>27.658</td></tr>
 <tr><td>50-54</td><td>77.905</td><td>15.454</td><td>19.180</td><td>7.565</td><td>9.863</td><td>25.843</td></tr>
 <tr><td>55-59</td><td>73.058</td><td>14.664</td><td>18.795</td><td>7.550</td><td>8.662</td><td>23.387</td></tr>
 <tr><td>60-64</td><td>60.595</td><td>11.871</td><td>15.767</td><td>5.984</td><td>7.094</td><td>19.879</td></tr>
 <tr><td>65-69</td><td>48.379</td><td>9.507</td><td>12.644</td><td>4.947</td><td>5.514</td><td>15.767</td></tr>
 <tr><td>70-74</td><td>45.007</td><td>8.759</td><td>12.226</td><td>4.649</td><td>4.584</td><td>14.789</td></tr>
 <tr><td>75-79</td><td>40.368</td><td>8.158</td><td>10.756</td><td>4.945</td><td>3.731</td><td>12.778</td></tr>
 <tr><td>80-84</td><td>33.642</td><td>6.598</td><td>9.152</td><td>4.201</td><td>3.279</td><td>10.412</td></tr>
 <tr><td>85-89</td><td>29.520</td><td>5.497</td><td>7.776</td><td>3.828</td><td>3.165</td><td>9.254</td></tr>
 <tr><td>90-94</td><td>14.734</td><td>2.565</td><td>3.570</td><td>1.911</td><td>1.838</td><td>4.850</td></tr>
 <tr><td>95-99</td><td>3.930</td><td>630</td><td>900</td><td>499</td><td>574</td><td>1.327</td></tr>
 <tr><td>100 y más</td><td>572</td><td>101</td><td>140</td><td>76</td><td>77</td><td>178</td></tr>
</tbody></table>

</body>
</html>

