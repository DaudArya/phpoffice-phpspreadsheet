<?php  
	include ('config.php');
	require 'vendor/autoload.php';
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
	use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

	$spreadsheet = new Spreadsheet();
	$sheet = $spreadsheet->getActiveSheet();
	$sheet->setCellValue('A1',	'No');
	$sheet->setCellValue('B1',	'id');
	$sheet->setCellValue('C1',	'nama');
	$sheet->setCellValue('D1',	'nisn');
    $sheet->setCellValue('E1',	'nik');
	$sheet->setCellValue('F1',	'skhun');
	$sheet->setCellValue('G1',	'ijazah');
	$sheet->setCellValue('H1',	'jk');
    $sheet->setCellValue('I1',	'tgllahir');
	$sheet->setCellValue('J1',	'alamat');

	$query = mysqli_query($link, "SELECT * FROM peserta");
	$i = 2;
	$no = 1;
	while($row = mysqli_fetch_array($query)){
		$sheet->setCellValue('A'.$i, $no++);
		$sheet->setCellValue('B'.$i, $row['id']);
		$sheet->setCellValue('C'.$i, $row['namalengkap']);
		$sheet->setCellValue('D'.$i, $row['nisn']);
        $sheet->setCellValue('E'.$i, $row['nik']);
		$sheet->setCellValue('F'.$i, $row['skhun']);
		$sheet->setCellValue('G'.$i, $row['ijazah']);
        $sheet->setCellValue('H'.$i, $row['jk']);
		$sheet->setCellValue('I'.$i, $row['tgllahir']);
		$sheet->setCellValue('J'.$i, $row['alamat']);
		$i++;
	}

	$styleArray = [
		'borders' => [
			'allBorders' => [
				'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
			],
		],
	];
	$i = $i - 1;
	$sheet->getStyle('A1:D'.$i)->applyFromArray($styleArray);

	$writer = new Xlsx($spreadsheet);
	$writer->save('Data Siswa Baru.xlsx');
?>