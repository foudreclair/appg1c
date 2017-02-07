<?php
require('../fpdf181/fpdf.php');
$cmd =$_GET['cmd'];
class PDF extends FPDF
{
// En-tête
function Header()
{
    // Logo
    $this->Image('../Vue/logo3.png',10,6,30);
    // Police Arial gras 15
    $this->SetFont('Arial','B',15);
    // Décalage à droite
    $this->Cell(60);
    // Titre
    $this->Cell(70,10,'Domisep | Votre Facture',1,0,'C');
    // Saut de ligne
    $this->Ln(20);
}

// Pied de page
function Footer()
{
    // Positionnement à 1,5 cm du bas
    $this->SetY(-15);
    // Police Arial italique 8
    $this->SetFont('Arial','I',8);
    // Numéro de page
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
// Tableau amélioré
function ImprovedTable($header, $data)
{
    // Largeurs des colonnes
    $w = array(40, 35, 45, 40);
    // En-tête
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Données
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,$row[2],'LR');
        $this->Cell($w[3],6,$row[3],'LR');
        $this->Ln();
    }
    // Trait de terminaison
    $this->Cell(array_sum($w),0,'','T');
}

}

// Instanciation de la classe dérivée
$pdf = new PDF();
$pdf->AliasNbPages();
$header = array('Produit', 'Quantit�', 'Prix unitaire', 'Prix total');
$pdf->setTitle("Domisep | Facture");
$pdf->AddPage();
$pdf->SetFont('Times','',12);


$pdf->Cell(50,10,'Num�ro de commande : '.$cmd,0,1);
include '../Modele/connexion_bdd.php';
$req = $mysqli -> query("SELECT * FROM Commande WHERE Id = '$cmd'");
while($com = $req ->fetch_array(MYSQLI_ASSOC)){
    $pdf->Cell(50,10,'Nom et Pr�nom : '.$com['Nom'].' '.$com['Prenom'],0,1);
    $pdf->Cell(50,10,'Adresse de livraison : '.$com['Adresse'].', '.$com['CodePostal'].', '.$com['Ville'],0,1);
    $pdf->Cell(50,10,'Date de commande : '.$com['Date'],0,1);
}
$reqachat = $mysqli -> query("SELECT * FROM Achats WHERE Id_Commande = '$cmd'");
$data=[];
while($achat = $reqachat ->fetch_array(MYSQLI_ASSOC)){
    $pdt = [];
    $idpdt = $achat['Id_Catalogue'];$
    $totalt = 0;
    $reqpdt = $mysqli -> query("SELECT * FROM Catalogue WHERE Id= '$idpdt'");
    while($pro = $reqpdt ->fetch_array(MYSQLI_ASSOC)){
        $pritot = floatval($achat['Quantite'])*(floatval(str_replace(',', '.', $pro['Prix'])));
        array_push($pdt, utf8_decode($pro['Nom']));
        array_push($pdt, $achat['Quantite']);
        array_push($pdt, (floatval(str_replace(',', '.', $pro['Prix']))));
        array_push($pdt, $pritot);

    }
    $total += $pritot;
    array_push($data, $pdt);
}

$pdf->Line(50, 30, 210-50, 30);
$pdf->Ln(20);
$pdf->Line(50, 75, 210-50, 75);
$pdf->Cell(50,10,'D�tail de votre commande : ',0,'R');
$pdf->Ln(20);
$pdf->ImprovedTable($header,$data);
$pdf->Ln(20);
$pdf->Cell(50,10,'Prix total : '.$total.' euro',0,'R');
$pdf->Output();

?>