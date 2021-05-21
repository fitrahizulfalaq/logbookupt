<?php 

class Cetak {

	protected $ci;
	
	function __construct()
	{
		$this->ci =& get_instance();
	}

	function formLuring($konten,$filename,$data) {
		require_once 'vendor/autoload.php';		

		$mpdf = new \Mpdf\Mpdf([
			    'mode' => 'utf-8',
			    'format' => 'A4',
			    'orientation' => 'P',
			    'margin_left' => 10,
		    	'margin_right' => 10,
		    	'margin_top' => 10,
		    	'margin_bottom' => 10,
		    	'default_font_size' => 12,
		    	'default_font' => 'calibri'
			]
		);
		
		$content = $this->ci->load->view($konten,$data, true);
		// test($content);
		$mpdf->WriteHTML($content);
		$mpdf->Output($filename.".pdf","I");
		
	}



}

?>