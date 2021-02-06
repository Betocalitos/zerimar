<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactRecived;

class MessageController extends Controller
{
    public function ProductRequest()
    {
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name'    => 'required|max:50',
            'email'   => 'required|email|max:120',
            'message' => 'required|max:255'
        ], [
            'name.required'    => __('Favor de ingresar su nombre'),
            'email.required'   => __('Favor de ingresar su correo'),
            'email.email'      => __('Favor de ingresar un correo válido'),
            'message.required' => __('Favor de ingresar el mensaje'),
            'message.max'      => __('Su mensaje no debe exceder los 255 caracteres')
        ]);

        try {
            Mail::to('fjrg.admon@montacargaszerimar.com')->queue(new ContactRecived(request()->all()));
        } catch (\Throwable $th) {
            return response()->json([
                "message" => "Ocurrió un errror al enviar el correo...",
                "error" => $th->getMessage()
            ], 500);
        }
    }
}
