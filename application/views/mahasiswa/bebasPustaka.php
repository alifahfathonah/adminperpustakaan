<?php
class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = K_PATH_IMAGES.'logo_example.jpg';
        $this->Image($image_file, 10, 10, 15, '', 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('helvetica', 'B', 20);
        // Title
        $this->Ln(2);
        $this->Cell(0, 10, 'Perpustakaan', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(2);
        $this->SetFont('helvetica','B',10);
        $this->Cell(0, 10, 'Universitas Guna Dharma Bandung', 0, 1, 'C', 0, '', 0, false, 'M', 'M');
        $this->Ln(1);
        $this->SetFont('helvetica','B',8);
        $this->Cell(0,8,'Jln. Kebangsaan Timur No. 15 Jakarta Utara, Jakarta, Indonesia, 57552, Telp: 021-76251',0,1,'C',0,'',0,false,'M','M');
        // set border width
        $this->SetLineWidth(0.9);
        // set color for cell border
        $this->SetDrawColor(0,0,0);

        $this->setCellHeightRatio(3);

        $this->SetXY(12, 24);
        $this->Cell(185,0,'','B',1,'C',0,'',0,false,'M','M');
        $this->Ln(2);
        
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom 
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }
}
// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', 'BI', 14);

// add a page
$pdf->AddPage();

// set some text to print
$txt = <<<EOD

Surat Keterangan Bebas Pustaka
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);
$pdf->Ln(2);
$pdf->SetFont('helveticaI','I',10);
//Nomor Surat
$nomor ='Nomor : PRP_____/P/___/_________';
$pdf->MultiCell(0,5,$nomor,0,'C',0,2,'','',true);
$pdf->Ln(5);
// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
// set font
$pdf->SetFont('times', '', 12);
//Isi Surat
$txt = 'Yang bertanda tangan dibawah ini menerangkan bahwa:';
$pdf->MultiCell(0, 5,$txt."\n", 0, 'J', 0, 2, '' ,'', true);
$pdf->Ln(2);
// set cell padding
$pdf->setCellPaddings(0, 0, 0, 2);
$txt = 'Nim';
$pdf->MultiCell(20, 5,$txt."\n", 0, 'J', 0, 0, 30 ,'', true);
$txt = ': '.$nim;
$pdf->MultiCell(0, 5,$txt."\n", 0, 'J', 0, 1, '' ,'', true);
$txt = 'Nama';
$pdf->MultiCell(20, 5,$txt."\n", 0, 'J', 0, 0, 30 ,'', true);
$txt = ': '.$nama;
$pdf->MultiCell(0, 5,$txt."\n", 0, 'J', 0, 1, '' ,'', true);
$txt = 'Jurusan';
$pdf->MultiCell(20, 5,$txt."\n", 0, 'J', 0, 0, 30 ,'', true);
$txt = ': '.$jurusan;
$pdf->MultiCell(0, 5,$txt."\n", 0, 'J', 0, 1, '' ,'', true);

$pdf->Ln(5);
//Penutup Surat
$txt = 'Mahasiswa tersebut diatas tidak mempunyai pinjaman pustaka milik Perpustakaan Universitas Guna Dharma Bandung Surat Keterangan ini untuk Kelulusan, Pengambilan Ijazah, Pengambilan Transkrip Nilai.';
$pdf->MultiCell(0, 5,$txt."\n", 0, 'J', 0, 2, '' ,'', true);
// move pointer to last page


//Tanggal 
$pdf->Ln(8);
$tgl = date("d F Y",time());
$txt ='Bandung, '.$tgl;
$pdf->MultiCell(0,5,$txt,0,'C',0,1,130,'',true);

$pdf->Ln(2);
$txt = "Pustakawan";
$pdf->MultiCell(0,5,$txt,0,'C',0,1,130,'',true);
$pdf->Ln(5);
$txt = "Andi SH.";
$pdf->MultiCell(0,5,$txt,0,'C',0,1,130,'',true);

$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('Surat_bebas_pustaka', 'I');

//============================================================+
// END OF FILE
//============================================================+
