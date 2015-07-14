<?php
require('librerias/fpdf/fpdf.php');
include_once("librerias/php/conexion.php");

class PDF extends FPDF
{
    var $widths;
var $aligns;

function SetWidths($w)
{
    //Set the array of column widths
    $this->widths=$w;
}

function SetAligns($a)
{
    //Set the array of column alignments
    $this->aligns=$a;
}

function Row($data)
{
    //Calculate the height of the row
    $nb=0;
    for($i=0;$i<count($data);$i++)
        $nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
    $h=5*$nb;
    //Issue a page break first if needed
    $this->CheckPageBreak($h);
    //Draw the cells of the row
    for($i=0;$i<count($data);$i++)
    {
        $w=$this->widths[$i];
        $a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L';
        //Save the current position
        $x=$this->GetX();
        $y=$this->GetY();
        //Draw the border
        $this->Rect($x,$y,$w,$h);
        //Print the text
        $this->MultiCell($w,5,$data[$i],0,$a);
        //Put the position to the right of the cell
        $this->SetXY($x+$w,$y);
    }
    //Go to the next line
    $this->Ln($h);
}

function CheckPageBreak($h)
{
    //If the height h would cause an overflow, add a new page immediately
    if($this->GetY()+$h>$this->PageBreakTrigger)
        $this->AddPage($this->CurOrientation);
}

function NbLines($w,$txt)
{
    //Computes the number of lines a MultiCell of width w will take
    $cw=&$this->CurrentFont['cw'];
    if($w==0)
        $w=$this->w-$this->rMargin-$this->x;
    $wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
    $s=str_replace("\r",'',$txt);
    $nb=strlen($s);
    if($nb>0 and $s[$nb-1]=="\n")
        $nb--;
    $sep=-1;
    $i=0;
    $j=0;
    $l=0;
    $nl=1;
    while($i<$nb)
    {
        $c=$s[$i];
        if($c=="\n")
        {
            $i++;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
            continue;
        }
        if($c==' ')
            $sep=$i;
        $l+=$cw[$c];
        if($l>$wmax)
        {
            if($sep==-1)
            {
                if($i==$j)
                    $i++;
            }
            else
                $i=$sep+1;
            $sep=-1;
            $j=$i;
            $l=0;
            $nl++;
        }
        else
            $i++;
    }
    return $nl;
}
// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Helvetica','B',10);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    // Número de página
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('P','mm','legal');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetMargins(10,20,20);
 //salto de linea
// Arial bold 15
 $pdf->SetFont('Helvetica','B',11);
 $pdf->Image('librerias/imagenes/logonuevo2.png',60,10,90);
 $pdf->Ln(7);
 // Movernos a la derecha
 $pdf->Cell(80);
 // Título
 $pdf->SetTextColor(0, 176, 246);
 $pdf->Cell(30,10,'CENSO NUEVO CUSCATLAN',0,0,'C');
 $pdf->Ln(5);
 $pdf->Cell(80);
 $pdf->SetTextColor(0, 0, 0);
 $pdf->Cell(30,10,'Registro de Poblacion y Vivienda',0,0,'C');
 // Salto de línea
 $pdf->Ln(15);
 //fuente helvetica sin negrita
 $pdf->SetFont('Helvetica','B',11);
 //agregamos el texto que deseamos
 $pdf->Cell(0,10,'DIRECCION');
 $pdf->ln(1);
 $pdf->SetFont('Helvetica','',11);
 $pdf->Cell(0,10,'_______________________________________________________________________________________');
 
 
 $pdf->ln(6);
 $sqldireccion="SELECT area.nombre as zona,colonia.nombre as colonia, vivienda.direccion as direccion,vivienda.numero numero from vivienda
inner join colonia on vivienda.id_colonia=colonia.id_colonia inner join area on area.id_area=colonia.id_area where id_vivienda=35;";
 $rszona=mysql_query($sqldireccion);
 $datoszona=mysql_fetch_assoc($rszona);
 $pdf->Cell(0,10,'Zona: '.$datoszona['zona']);
 $pdf->ln(5);
 $pdf->Cell(0,10,'Direccion: '.$datoszona['colonia'].', '.$datoszona['direccion'].' Casa '.$datoszona['numero']);
 $pdf->ln(10);

 $pdf->SetFont('Helvetica','B',11);
 $pdf->Cell(0,10,'DETALLES GENERALES');
 $pdf->ln(1);
 $pdf->SetFont('Helvetica','',11);
 $pdf->Cell(0,10,'_______________________________________________________________________________________');
 $pdf->ln(6);
 $sqlgenerales="SELECT tipo_familia.nombre as tipo_familia, religion.nombre as religion, tenencia_vivienda.nombre as tenencia,
vivienda.cant_familia as cantidad_familia,seguridad.nombre as seguridad,vivienda.observaciones as observaciones from vivienda 
inner join tipo_familia on vivienda.id_tipofamilia=tipo_familia.id_tipofamilia 
inner join religion on vivienda.id_religion=religion.id_religion 
inner join tenencia_vivienda on vivienda.id_tenencia=tenencia_vivienda.id_tenencia 
inner join seguridad on vivienda.id_seguridad=seguridad.id_seguridad where vivienda.id_vivienda=35;";
$rsgenerales=mysql_query($sqlgenerales);
$datosgenerales=mysql_fetch_assoc($rsgenerales);
$rscountpersonas=mysql_query("SELECT COUNT(*) as cantidad_personas from persona where id_vivienda=35;");
$datoscantpersonas=mysql_fetch_assoc($rscountpersonas);
$pdf->Cell(0,10,'Tipo Familia: '.$datosgenerales['tipo_familia']);
$pdf->ln(5);
$pdf->Cell(0,10,'Religion: '.$datosgenerales['religion']);
$pdf->ln(5);
$pdf->Cell(0,10,'Tenencia: '.$datosgenerales['tenencia']);
$pdf->ln(5);
$pdf->Cell(0,10,'Cantidad Familias: '.$datosgenerales['cantidad_familia']);
$pdf->ln(5);
$pdf->Cell(0,10,'Cantidad Personas: '.$datoscantpersonas['cantidad_personas']);
$pdf->ln(5);
$pdf->Cell(0,10,'Nivel de Seguridad: '.$datosgenerales['seguridad']);
$pdf->ln(5);
$rsvectores=mysql_query("SELECT GROUP_CONCAT(vectores.nombre SEPARATOR ', ') AS tvectores from vivienda_vectores inner join vectores
on vivienda_vectores.id_vectores=vectores.id_vectores where id_vivienda=35");
$datosvectores=mysql_fetch_assoc($rsvectores);
$pdf->Cell(0,10,'Vectores: '.$datosvectores['tvectores']);
$pdf->ln(5);
$rsmascotas=mysql_query("SELECT GROUP_CONCAT(mascota.nombre,': ',vivienda_mascota.cantidad SEPARATOR ', ') AS tmascotas from vivienda_mascota 
inner join mascota on vivienda_mascota.id_mascota=mascota.id_mascota where id_vivienda=1 and cantidad!=0");
$datosmascotas=mysql_fetch_assoc($rsmascotas);
$pdf->Cell(0,10,'Mascotas: '.$datosmascotas['tmascotas']);
$pdf->ln(5);
$pdf->Cell(0,10,'Observaciones: '.$datosgenerales['observaciones']);
$pdf->ln(10);

$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(0,10,'DETALLES DE CONSTRUCCION');
$pdf->ln(1);
$pdf->SetFont('Helvetica','',11);
$pdf->Cell(0,10,'_______________________________________________________________________________________');
$pdf->ln(6);
$rsconstruccion=mysql_query("SELECT mat_paredes.nombre as mat_paredes,mat_piso.nombre as mat_piso,mat_techo.nombre as mat_techo,tipo_letrina.nombre as tipo_letrina from vivienda 
inner join mat_paredes on mat_paredes.id_matparedes=vivienda.id_matparedes
inner join mat_piso on mat_piso.id_matpiso=vivienda.id_matpiso
inner join mat_techo on mat_techo.id_mattecho=vivienda.id_mattecho
inner join tipo_letrina on tipo_letrina.id_tipoletrina=vivienda.id_tipoletrina where vivienda.id_vivienda=35");
$datoscontruccion=mysql_fetch_assoc($rsconstruccion);
$pdf->Cell(0,10,'Material Paredes: '.$datoscontruccion['mat_paredes']);
$pdf->ln(5);
$pdf->Cell(0,10,'Material Piso: '.$datoscontruccion['mat_piso']);
$pdf->ln(5);
$pdf->Cell(0,10,'Material Techo: '.$datoscontruccion['mat_techo']);
$pdf->ln(5);
$pdf->Cell(0,10,'Tipo de Letrina: '.$datoscontruccion['tipo_letrina']);
$pdf->ln(10);

$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(0,10,'SERVICIOS BASICOS DE LA VIVIENDA');
$pdf->ln(1);
$pdf->SetFont('Helvetica','',11);
$pdf->Cell(0,10,'_______________________________________________________________________________________');
$pdf->ln(6);
$rsserviciosba=mysql_query("SELECT manejo_basura.nombre as basura,abast_agua.nombre as abast_agua, agua_gris.nombre as agua_gris,agua_negra.nombre as agua_negra
from vivienda inner join manejo_basura on manejo_basura.id_manejobasura=vivienda.id_manejobasura
inner join abast_agua on abast_agua.id_abastagua=vivienda.id_abastagua
inner join agua_gris on agua_gris.id_aguagris=vivienda.id_aguagris
inner join agua_negra on agua_negra.id_aguanegra=vivienda.id_aguanegra
where vivienda.id_vivienda=35");
$datosserviciosba=mysql_fetch_assoc($rsserviciosba);
$pdf->Cell(0,10,'Manejo de la Basura: '.$datosserviciosba['basura']);
$pdf->ln(5);
$pdf->Cell(0,10,'Abastecimiento de Agua: '.$datosserviciosba['abast_agua']);
$pdf->ln(5);
$pdf->Cell(0,10,'Disposicion de Aguas Grises: '.$datosserviciosba['agua_gris']);
$pdf->ln(5);
$pdf->Cell(0,10,'Disposicion de Aguas Negras: '.$datosserviciosba['agua_negra']);
$pdf->ln(5);
$rsotrosservicios=mysql_query("SELECT GROUP_CONCAT(servicio_basico.nombre SEPARATOR ', ') AS tservicios from vivienda_servibasic 
inner join servicio_basico on vivienda_servibasic.id_servicio=servicio_basico.id_servicio where vivienda_servibasic.id_vivienda=35");
$datosotrosservicios=mysql_fetch_assoc($rsotrosservicios);
$pdf->Cell(0,10,'Otros Servicios: '.$datosotrosservicios['tservicios']);
$pdf->ln(10);

$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(0,10,'VULNERABILIDADES');
$pdf->ln(1);
$pdf->SetFont('Helvetica','',11);
$pdf->Cell(0,10,'_______________________________________________________________________________________');
$pdf->ln(6);
$rsriesgos=mysql_query("SELECT riesgo.nombre as riesgo from riesgo_vivienda inner join riesgo on riesgo.id_riesgo=riesgo_vivienda.id_riesgo
where riesgo_vivienda.id_vivienda=35;");
while ($datosriesgo=mysql_fetch_assoc($rsriesgos)) {
$pdf->Cell(0,10,''.$datosriesgo['riesgo']);
$pdf->ln(5);
}
$pdf->ln(5);
$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(0,10,'INGRESOS ECONOMICOS');
$pdf->ln(1);
$pdf->SetFont('Helvetica','',11);
$pdf->Cell(0,10,'_______________________________________________________________________________________');
$pdf->ln(6);
$rsingresos=mysql_query("SELECT ingreso_economico.nombre as ingreso_economico from vivienda_ingreconomico
inner join ingreso_economico on ingreso_economico.id_ingreso=vivienda_ingreconomico.id_ingreso
where vivienda_ingreconomico.id_vivienda=82;");
while ($datosingresos=mysql_fetch_assoc($rsingresos)) {
$pdf->Cell(0,10,''.$datosingresos['ingreso_economico']);
$pdf->ln(5);
}
$pdf->ln(5);
$pdf->SetFont('Helvetica','B',11);
$pdf->Cell(0,10,'PATRIMONIO');
$pdf->ln(1);
$pdf->SetFont('Helvetica','',11);
$pdf->Cell(0,10,'_______________________________________________________________________________________');
$pdf->ln(6);
$rspatrimonio=mysql_query("SELECT patrimonio.nombre as patrimonio from vivienda_patrimonio
inner join patrimonio on patrimonio.id_patrimonio=vivienda_patrimonio.id_patrimonio
where vivienda_patrimonio.id_vivienda=82;");
while ($datospatrimonio=mysql_fetch_assoc($rspatrimonio)) {
$pdf->Cell(0,10,''.$datospatrimonio['patrimonio']);
$pdf->ln(5);  
}

$pdf->AddPage('L');
$pdf->SetMargins(20,20,20);
$pdf->SetFont('Helvetica','B',12);
$pdf->Cell(0,10,'HABITANTES DE LA VIVIENDA VIVIENDA',0,0,'C');
$pdf->ln(10);
// Para realizar esto utilizaremos la funcion Row()
$pdf->SetFont('Helvetica','',10);
// tipo y tamaño de letra
$pdf->SetWidths(array(20,60,11, 25,11,25,35,25,25,25,25,25));
// Definimos el tamaño de las columnas, tomando en cuenta que las declaramos en milimetros, ya que nuestra hoja esta en milimetros.
$pdf->Row(array('N.Familia','Nombre y Apellido', 'Sexo', 'F. Nacimiento','Edad','Parentesco','Estudios','Ocupacion','Ingreso Eco.','Discapacidad','Causa Disca.','Enfermedad'));
$rspersonas=mysql_query("SELECT persona.id_persona,persona.nombre as nombre,persona.apellido as apellido,persona.fecha_nac as fecha_nacimiento,persona.genero as genero,nacionalidad.nombre as nacionalidad,
    nivel_educativo.nombre as nivel_educativo,discapacidad.nombre as discapacidad,causa_disca.descripcion as causa_discapacidad,
    ocupacion.nombre as ocupacion,parentesco.nombre as parentesco,situacion_laboral.nombre as situacion_laboral,
    enfermedad.nombre as enfermedad,ingreso_economico.nombre as ingreso,persona.num_familia as numero_familia 
    from persona inner join nacionalidad on persona.id_nacionalidad=nacionalidad.id_nacionalidad inner join 
    nivel_educativo on persona.id_niveleducativo=nivel_educativo.id_niveleducativo inner join discapacidad 
    on persona.id_discapacidad=discapacidad.id_disca inner join causa_disca on persona.id_causadisca=causa_disca.id_causa inner join 
    ocupacion on persona.id_ocupacion=ocupacion.id_ocupacion inner join parentesco on persona.id_parentesco=parentesco.id_parentesco inner join  
    situacion_laboral on persona.id_sitlaboral=situacion_laboral.id_sitlaboral inner join enfermedad on persona.id_enfermedad=enfermedad.id_enfermedad 
    inner join ingreso_economico on persona.id_ingreso=ingreso_economico.id_ingreso where persona.id_vivienda=20 order by persona.num_familia;");
$numpersonas=mysql_num_rows($rspersonas);
$fila=mysql_fetch_assoc($rspersonas);
$pdf->ln(10);
if ($numpersonas>0)
{
    while($fila=mysql_fetch_assoc($rspersonas)){
        $pdf->Row(array($fila['numero_familia'],$fila['nombre'].', '.$fila['apellido'],$fila['genero'],$fila['fecha_nacimiento'],'33',$fila['parentesco'],$fila['nivel_educativo'],$fila['ocupacion'],$fila['ingreso'],$fila['discapacidad'],$fila['causa_discapacidad'],$fila['enfermedad']));
    }
    };




$pdf->Output();
?>