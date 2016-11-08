<?php
defined('BASEPATH') OR exit('No direct script access allowed');


?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Rapicarga WEB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link href="<?php echo base_url("css/bootstrap.css"); ?>" rel="stylesheet" type="text/css" />
 	<link href="<?php echo base_url("css/style.css"); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('css/jquery-ui.css'); ?>" rel="stylesheet" type="text/css" />

    <script src="<?php echo base_url('js/jquery.js'); ?>"></script>
 	<script src="<?php echo base_url('js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('js/jquery-ui.js'); ?>"></script>
     <script src="<?php echo base_url('js/crypto/sha1.js'); ?>"></script>
</head>
<body>

<div id="container">
	<div class="wrapper">
    
		 <div class="header">
	       <div class="container header_top">
				<div class="logo">
				  <a href="<?php echo base_url(''); ?>"><img src="<?php echo base_url('images/logo.png'); ?>" alt=""></a>
				</div>
		  		<div class="menu">
					
					<ul class="nav" id="nav">
					  <li ><a href="<?php echo base_url(''); ?>">Inicio</a></li>
					  <li><a href="#">Con&oacute;cenos</a></li>
					  <li><a href="#">Servicios</a></li>
					  <li><a href="#">Portafolio</a></li>
					  <li><a href="#">Contactenos</a></li>
					   <li class="current"><a href="#">Paises</a></li>
					 
					 						
					</ul>
				</div>							
	  			
			 </div>
		</div>
	

     <div class="container banner">
	 	<div class="row">
	 	<h3><span class="label label-info">Pa&iacute;ses</span></h3>
	 		<div >
	 		<?php echo $this->pagination->create_links() ?>
			<table class="table table-hover" >
<thead>
<tr style="background:#AEC9E0;"><th>Id</th>
<th>Pa&iacute;s</th><th>C&oacute;digo</th>
</tr>
</thead>
<tbody>
		   
		        <?php
		        foreach ($paises as $pais)
		        {
		        ?>
		            <tr>
		            	<td>
		                    <?php echo $pais->id ?>
		                </td>
		                <td>
		                    <?php echo $pais->pais ?>
		                </td>
		                 <td>
		                    <?php echo $pais->isocodigo ?>
		                </td>
		            </tr>
		        <?php
		        }
		        ?>
		    </tbody>		
</table>
    		
	 		</div>
	 	 </div>
	 	 
	 </div>
	 
     <div class="container footer">
       
     	<div class="footer_bottom">
     	  <div class="copy">
		    <p>&copy;2015 RapiCarga S.A.</p>
		  </div>
		  <ul class="social">
			<li><a href=""> <i class="fb"> </i> </a></li>
			<li><a href=""><i class="tw"> </i> </a></li>
		  </ul>
		  <div class="clearfix"> </div>
     	</div>
     </div>
 </div>	
</div>

</body>

</html>

