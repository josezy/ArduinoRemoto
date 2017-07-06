<?php
require 'phplot.php';
class Grafica{
	private $plot;
	private $data;
	function __construct($x = 750, $y = 300){
		$this->plot = new PHPlot($x,$y);
		$this->plot->SetIsInline(True);	//http://phplot.sourceforge.net/phplotdocs/SetIsInline.html Necesario para SetOutputFile
		$this->plot->SetPrintImage(False);	//Desactiva la impresion automatica de la imagen
		$this->plot->SetOutputFile("grafica.png");	//Guarda la imagen en un archivo en vez de imprimirla en el navegador
		$this->plot->SetTitle("Registro sensores");
		$this->plot->SetXTitle('Fecha'."\n".'Hora');
		$this->plot->SetYTitle('Valor');
	}
	function setData($d, $A){
		$this->data = $d;
		$leyenda = array("","","","","","");
		if(!empty($A)){
			foreach($A as $k => $i){//imprime leyenda de graficas mostradas
				$leyenda[$k] = "A$k";
			}
		}
		$this->plot->SetLegend($leyenda);
		$this->plot->SetLegendPosition(0.5, -0.3, 'plot', 1, 0, -5, 5);
		$this->plot->SetDataValues($this->data);
	}
	function dibujar(){
		if(!empty($this->data)){//si hay datos dibuja la grafica
			@$this->plot->DrawGraph();
		}
		else{//sino imprime mensaje
			$this->plot->DrawMessage('No hay datos que mostrar.');
		}
		$this->plot->PrintImage();
	}
}