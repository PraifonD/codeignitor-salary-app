<?php
defined('BASEPATH') or exit('No direct script access allowed');
class General_model extends CI_Model
{
    public function ThDate()
    {
        $ThMonth = array("มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฏาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
        $currentThMonth = $ThMonth[(date('m')) - 1];
        $currentThYear = date('Y') + 543;
        $currentTHFullDate = date('j') . " " . $currentThMonth . " " . $currentThYear;
        return array(
            'currentThMonth' => $currentThMonth,
            'currentThYear' => $currentThYear,
            'currentThFullDate' => $currentTHFullDate
        );

    }
    
}
