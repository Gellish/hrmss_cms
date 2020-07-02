<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once dirname(__FILE__) . '/barcode/barcode.class.php';

class Barcodes extends BARCODE
{
    function __construct()
    {
        parent::__construct();
    }
}

/* End of file Barcode.php */
/* Location: ./application/libraries/Barcode.php */