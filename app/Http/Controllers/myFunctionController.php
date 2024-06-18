<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class myFunctionController extends Controller
{

  
        public function getMacAddress()
        {
            $os = PHP_OS;
            $macAddress = 'MAC Address not found';
    
            if (strpos($os, 'WIN') !== false) {
                exec('getmac', $output);
            } else {
                exec('ifconfig -a', $output);
            }
    
            foreach ($output as $line) {
                if (preg_match('/([A-Fa-f0-9]{2}[:-]){5}([A-Fa-f0-9]{2})/', $line, $matches)) {
                    $macAddress = $matches[0];
                    break;
                }
            }
    
            return $macAddress;
        }
    
}
