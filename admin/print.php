
<?php
    require('lib/report/fpdf.php'); 
    require('koneksi.php'); 
    $pdf = new FPDF('P','cm','A4'); 
    $pdf->AddPage(); 
    $pdf->SetFont('Arial','B',14); 
     
    $pdf->SetX(0); $pdf->MultiCell(19.5,0.5,'Digital Library',0,'C'); //Membuat Judul
    $pdf->SetX(0); $pdf->MultiCell(19.5,0.5,'Akademi Komunitas Negeri Kajen',0,'C'); //Membuat Sub Judul
    $pdf->SetFont('Arial','B',10); 
    $pdf->SetX(0); 
    $pdf->MultiCell(19.5,0.5,'JL. Bahureksa No. 1, Telpon : 085290059281',0,'C'); //Membuat Alamat
    $pdf->SetX(0); $pdf->MultiCell(19.5,0.5,'website : www.digitallibrary.id email : admin@digitallibrary.id',0,'C'); //Membuat Info Tambahan
    $pdf->Line(1,3.1,20.5,3.1);
    $pdf->SetLineWidth(0.1); 
    $pdf->Line(1,3.2,20.5,3.2); 
    $pdf->SetLineWidth(0); $pdf->Ln(); 

    $tgl = date('d F Y');
    $pdf->SetX(0); $pdf->MultiCell(19.5,0.5,'Laporan Statistik',0,'C'); //Membuat Header
    $pdf->SetX(0); $pdf->MultiCell(19.5,0.5,$tgl,0,'C'); 
    $pdf->SetLineWidth(0); $pdf->Ln(); 

    $pdf->SetFont('Arial','',11); //Seting Font
    //Membuat Tabel
    $pdf->Cell(3,0.8,'Kode Buku',1,0,'C'); 
    $pdf->Cell(5.5,0.8,'Judul Buku',1,0,'C'); 
    $pdf->Cell(4.5,0.8,'Pengarang',1,0,'C'); 
    $pdf->Cell(2.5,0.8,'Kategori',1,0,'C'); 
    $pdf->Cell(4,0.8,'Jumlah Download',1,0,'C'); 
    $pdf->SetFont('Arial','',10); $pdf->Ln(); 
    //Mengisi Data dari DB
    $connection = new ConnectionDB();
    $conn = $connection->getConnection();
    $sql = "SELECT * FROM tb_buku b INNER JOIN tb_statistik s where b.kode_buku=s.kode_buku order by jumlah_download DESC";
    $result = $conn->prepare($sql);
    $result->execute();
    foreach($result as $output){
        $pdf->Cell(3,0.8,$output['kode_buku'],1,0,'C'); 
        $pdf->Cell(5.5,0.8,$output['judul'],1,0,'L'); 
        $pdf->Cell(4.5,0.8,$output['pengarang'],1,0,'C'); 
        $pdf->Cell(2.5,0.8,$output['kategori'],1,0,'C'); 
        $pdf->Cell(4,0.8,$output['jumlah_download'],1,0,'C'); 
        $pdf->Ln();
    }
    //Menampilkan Output PDF
    $pdf->Ln(); $pdf->Output(); 
?>
