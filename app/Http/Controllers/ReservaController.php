<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    public function fazerReserva(Request $request)
    {
        try {
            DB::select('CALL FazerReserva(?, ?, ?, ?)', [
                $request->id_usuario,
                $request->id_equipamento,
                $request->data_inicio,
                $request->data_fim
            ]);
            return redirect()->back()->with('success', 'Reserva realizada com sucesso!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}