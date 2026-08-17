<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{
    /**
     * Generate WhatsApp QR Code
     */
    public function whatsapp()
    {
        $phoneNumber = '923157364689';
        $message = 'Hello! I would like to discuss a project with you.';
        $whatsappUrl = "https://wa.me/{$phoneNumber}?text=" . urlencode($message);
        
        $qrCode = QrCode::format('png')
            ->size(300)
            ->margin(10)
            ->errorCorrection('H')
            ->generate($whatsappUrl);
        
        return response($qrCode)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'inline; filename="whatsapp-qr.png"');
    }
    
    /**
     * Generate Website QR Code
     */
    public function website()
    {
        $websiteUrl = 'https://obtainsolutions.com';
        
        $qrCode = QrCode::format('png')
            ->size(300)
            ->margin(10)
            ->errorCorrection('H')
            ->generate($websiteUrl);
        
        return response($qrCode)
            ->header('Content-Type', 'image/png')
            ->header('Content-Disposition', 'inline; filename="website-qr.png"');
    }
    
    /**
     * Generate QR Code with custom data
     */
    public function custom(Request $request)
    {
        $data = $request->input('data', '');
        $size = $request->input('size', 300);
        $format = $request->input('format', 'png');
        
        if (empty($data)) {
            return response()->json(['error' => 'Data parameter is required'], 400);
        }
        
        $qrCode = QrCode::format($format)
            ->size($size)
            ->margin(10)
            ->errorCorrection('H')
            ->generate($data);
        
        return response($qrCode)
            ->header('Content-Type', "image/{$format}")
            ->header('Content-Disposition', "inline; filename=\"qr-code.{$format}\"");
    }
} 