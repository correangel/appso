<?php
	class Database
	{	
		private $pdo;
		private $datos;
		private $detalle;
		
		public function __construct()
		{
			$this->datos = array();
			$this->detalle = array();
			$host = "localhost";     
			$username = "root"; /*"c4appso";*/
			$db = "c4appso";						
			$password = ""; /*"swSo14";*/  
			$dsn = 'mysql:host=localhost;dbname=c4appso;';
			
			/* Conexion con Hosting SW
			$host = "swlabluca.db.6757498.hostedresource.com";          
			$username = "swlabluca";             
			$db = "swlabluca";						
			$password="swLuca11";  
			$dsn = 'mysql:host=swlabluca.db.6757498.hostedresource.com;dbname=swlabluca;';			
			*/		
			
			try
			{
			
			$this->pdo=new PDO($dsn,$username,$password);	
				$this->pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);			
			}
			catch(Exception $e)
			{		
			$this->pdo=null;
			error_log("Error con la Conexión a la bd".$e->getMessage());
			exit();
			}
		}
		
		private function setDatos()
		{
		return $this->pdo->query("SET NAMES 'utf8'");
		}
		
		public function getValidacion($id=null,$cla=null)
		{			
			self::setDatos();
			$sql = $sql = 'SELECT * FROM enca_sosapuntos WHERE plastico_no =  ' . "'$id'" . ' AND accesoint = ' . "'$cla'";		
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			
			return $this->datos;			
		}
		
		public function getValidacionCliente($id=null,$cla=null)
		{			
			self::setDatos();
			$sql = $sql = 'SELECT * FROM cliente WHERE codigocliente =  ' . $id . ' AND conorden = ' . "'$cla'";		
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			
			return $this->datos;			
		}
		
		public function getDatosTarjeta($id=null)
		{			
			self::setDatos();
			$sql = 'SELECT * FROM enca_sosapuntos WHERE plastico_no =  ' . $id;								
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			return $this->datos;			
		}
		
		public function getDatosEmpresa($id=null)
		{			
			self::setDatos();
			$sql = 'SELECT razonsocial FROM cliente WHERE codigocliente =  ' . $id;			
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			return $this->datos;			
		}
		
		public function getDetalleTarjeta($id=null,$fecha1=null,$fecha2=null)
		{			
			self::setDatos();
			$sql = 'SELECT fecha_transac, descripcion_transac, cantidad, estado FROM deta_sosapuntos WHERE plastico_no =  ' . "$id" . ' AND fecha_transac BETWEEN ' . "'$fecha1'" . ' AND ' . "'$fecha2'";							
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->detalle[] = $row;				
			}
			return $this->detalle;			
		}
		
		public function getDatosOrdenId($id=null,$optica=null)
		{			
			self::setDatos();
			$sql = "SELECT * FROM ordenes WHERE optica =  $optica and no_control = $id";			
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			return $this->datos;			
		}

	
		public function getInsOrden($info)
		{
			self::setDatos();
			$sql = 'insert into ordenes values (null,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);';
			$stmt=$this->pdo->prepare($sql);

			$stmt->bindParam(1,$optica);
			$stmt->bindParam(2,$nombre);
			$stmt->bindParam(3,$no_control);
			$stmt->bindParam(4,$paciente);
			$stmt->bindParam(5,$esfera_der);
			$stmt->bindParam(6,$cilindro_der);
			$stmt->bindParam(7,$eje_der);
			$stmt->bindParam(8,$prisma_der);
			$stmt->bindParam(9,$adicion_der);
			$stmt->bindParam(10,$altura_der);
			$stmt->bindParam(11,$dnp_der);
			$stmt->bindParam(12,$esfera_izq);
			$stmt->bindParam(13,$cilindro_izq);
			$stmt->bindParam(14,$eje_izq);
			$stmt->bindParam(15,$prisma_izq);
			$stmt->bindParam(16,$adicion_izq);
			$stmt->bindParam(17,$altura_izq);
			$stmt->bindParam(18,$dnp_izq);
			$stmt->bindParam(19,$distancia);
			$stmt->bindParam(20,$variedad);
			$stmt->bindParam(21,$colores);
			$stmt->bindParam(22,$top_vision);
			$stmt->bindParam(23,$montura);
			$stmt->bindParam(24,$horizontal);
			$stmt->bindParam(25,$patilla);
			$stmt->bindParam(26,$vertical);
			$stmt->bindParam(27,$diagonal);
			$stmt->bindParam(28,$observaciones);
						
			$optica 		= 	$info[optica];
			$nombre 		=	$info[nombre];
			$no_control 	=	$info[no_control];
			$paciente		=	$info[paciente];
			$esfera_der		=	$info[esfera_der];
			$cilindro_der	=	$info[cilindro_der];
			$eje_der		=	$info[eje_der];
			$prisma_der		=	$info[prisma_der];
			$adicion_der	=	$info[adicion_der];
			$altura_der		=	$info[altura_der];
			$dnp_der		=	$info[dnp_der];
			$esfera_izq		=	$info[esfera_izq];
			$cilindro_izq	=	$info[cilindro_izq];
			$eje_izq		=	$info[eje_izq];
			$prisma_izq		=	$info[prisma_izq];
			$adicion_izq	=	$info[adicion_izq];
			$altura_izq		=	$info[altura_izq];
			$dnp_izq		=	$info[dnp_izq];
			$distancia		=	$info[distancia];
			$variedad		=	$info[variedad];
			$colores		=	$info[colores];	
			$top_vision		=	$info[top_vision];
			$montura		=	$info[montura];
			$horizontal		=	$info[horizontal];
			$patilla		=	$info[patilla];
			$vertical		=	$info[vertical];
			$diagonal		=	$info[diagonal];
			$observaciones	=	$info[observaciones];

			$stmt->execute();
			
		}
		
		public function getUpdateOrden($info)
		{
			self::setDatos();
			$sql = "update ordenes "
				." set "
				." optica = ?, "
				." nombre = ?, "				
				." no_control = ?, "
				." paciente = ?, "
				." esfera_der = ?, "
				." cilindro_der = ?, "
				." eje_der = ?, "
				." prisma_der = ?, "
				." adicion_der = ?, "
				." altura_der = ?, "
				." dnp_der = ?, "
				." esfera_izq = ?, "
				." cilindro_izq = ?, "
				." eje_izq = ?, "
				." prisma_izq = ?, "
				." adicion_izq = ?, "
				." altura_izq = ?, "
				." dnp_izq = ?, "
				." distancia = ?, "
				." variedad = ?, "
				." colores = ?, "
				." top_vision = ?, "
				." montura = ?, "
				." horizontal = ?, "
				." patilla = ?, "
				." vertical = ?, "
				." diagonal = ?, "
				." observaciones = ? "				
				." where "
				." id_orden = ? ";
				
			$stmt=$this->pdo->prepare($sql);
						
			$stmt->bindParam(1,$optica);
			$stmt->bindParam(2,$nombre);
			$stmt->bindParam(3,$no_control);
			$stmt->bindParam(4,$paciente);
			$stmt->bindParam(5,$esfera_der);
			$stmt->bindParam(6,$cilindro_der);
			$stmt->bindParam(7,$eje_der);
			$stmt->bindParam(8,$prisma_der);
			$stmt->bindParam(9,$adicion_der);
			$stmt->bindParam(10,$altura_der);
			$stmt->bindParam(11,$dnp_der);
			$stmt->bindParam(12,$esfera_izq);
			$stmt->bindParam(13,$cilindro_izq);
			$stmt->bindParam(14,$eje_izq);
			$stmt->bindParam(15,$prisma_izq);
			$stmt->bindParam(16,$adicion_izq);
			$stmt->bindParam(17,$altura_izq);
			$stmt->bindParam(18,$dnp_izq);
			$stmt->bindParam(19,$distancia);
			$stmt->bindParam(20,$variedad);
			$stmt->bindParam(21,$colores);
			$stmt->bindParam(22,$top_vision);
			$stmt->bindParam(23,$montura);
			$stmt->bindParam(24,$horizontal);
			$stmt->bindParam(25,$patilla);
			$stmt->bindParam(26,$vertical);
			$stmt->bindParam(27,$diagonal);
			$stmt->bindParam(28,$observaciones);
			$stmt->bindParam(29,$id_orden);
						
			$optica 		= 	$info[optica];
			$nombre 		=	$info[nombre];
			$no_control 	=	$info[no_control];
			$paciente		=	$info[paciente];
			$esfera_der		=	$info[esfera_der];
			$cilindro_der	=	$info[cilindro_der];
			$eje_der		=	$info[eje_der];
			$prisma_der		=	$info[prisma_der];
			$adicion_der	=	$info[adicion_der];
			$altura_der		=	$info[altura_der];
			$dnp_der		=	$info[dnp_der];
			$esfera_izq		=	$info[esfera_izq];
			$cilindro_izq	=	$info[cilindro_izq];
			$eje_izq		=	$info[eje_izq];
			$prisma_izq		=	$info[prisma_izq];
			$adicion_izq	=	$info[adicion_izq];
			$altura_izq		=	$info[altura_izq];
			$dnp_izq		=	$info[dnp_izq];
			$distancia		=	$info[distancia];
			$variedad		=	$info[variedad];
			$colores		=	$info[colores];	
			$top_vision		=	$info[top_vision];
			$montura		=	$info[montura];
			$horizontal		=	$info[horizontal];
			$patilla		=	$info[patilla];
			$vertical		=	$info[vertical];
			$diagonal		=	$info[diagonal];
			$observaciones	=	$info[observaciones];
			$id_orden		=	$info[id_orden];
							
			$stmt->execute();
			
		}
		

		public function getOrden($id=null)
		{			
			self::setDatos();
			$sql = 'SELECT nombretrabajo FROM cliente WHERE codigocliente =  ' . $id;					
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			return $this->datos;			
		}

		public function getDeleteOrden($info)
		{
			$sql = "delete from ordenes where id_orden = ?";
			$stmt = $this->pdo->prepare($sql);
			$stmt->bindParam(1,$id_orden);
			$id_orden = $info["id_orden"];
			$stmt->execute();
		
			header("location: frm_pedidos.php?m=3");
		}
	
		public function getCombiVariedad($sql=null)
		{			
			self::setDatos();
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			return $this->datos;			
		}

		public function getOpciones($tabla=null,$idTabla=null,$descripcion=null)
		{
			echo "<option value='SV' selected>Seleccione...</option>";
			self::setDatos();
			$sql = "SELECT $idTabla, $descripcion FROM $tabla";			
    		$stm = $this->pdo->prepare($sql);
    		$stm->execute();

    		while($row=$stm->fetch(PDO::FETCH_ASSOC)){
        		echo '<option value="'.$row['codigocliente'].'">'.$row['nombretrabajo'].'</option>';//print_r($row); 
    		}
		}

		public function getTopVision($sql=null)
		{			
			self::setDatos();
			$stm=$this->pdo->prepare($sql);
			$stm->execute();					
			while ($row=$stm->fetch())
			{
				$this->datos[] = $row;				
			}
			return $this->datos;			
		}

	}
		
?>