<?php 

require_once('fpdf.php');

class PDF extends FPDF{

    function header(){

        //logo 

        $this->Image('img/default.jpg',30,10,20);// andcho alto tamaño

        //Tipo Letra 
        $this->SetFont('Arial','B','18');// Tipo letra: arial negrita tamaño 

        //mover a la derecha

        $this->cell(55);

        //titulo
        
        $this->Cell(70,20,'REPORTE  EMPLEADOS',0,0,'C');

        $this->ln(40);

        $this->SetFont('Arial','B','11');// Tipo letra: arial negrita tamaño 


        // TABLA


        $this->SetFillColor(153,255,100); // Color Celda RGB rgb(50,54,57)

        $this->Cell(20,10,'Codigo',1,0,'C',true);
        $this->Cell(27,10,'Apellido',1,0,'C',true);
        $this->Cell(30,10,'Oficio',1,0,'C',true);
        $this->Cell(20,10,'Direccion',1,0,'C',true);
        $this->Cell(30,10,'Ingreso',1,0,'C',true);
        $this->Cell(20,10,'Salario',1,0,'C',true);
        $this->Cell(20,10,'Comision',1,0,'C',true);
        $this->Cell(35,10,'DPTO',1,0,'C',true);



    }


    // PIE DE PAGINA

    function Footer(){
        //Posicion a 1.5 cm del final
        $this->SetY(-15);
        $this->SetFont('Arial','I',10);
        $this->Cell(0,10,utf8_decode('Pagina').' '.$this->PageNo(),0,1,'R'); // Nmero de la pagina 



    }




}


?>