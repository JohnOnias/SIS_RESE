<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Reserva;

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

    public function aprovar($id)
{
    $reserva = Reserva::findOrFail($id);
    $reserva->status = 'Aprovado';
    $reserva->save();

    return redirect()->back()->with('success', 'Reserva aprovada com sucesso!');
}
public function reprovar($id)
{
    $reserva = Reserva::findOrFail($id);
    $reserva->status = 'Reprovado';
    $reserva->save();

    return redirect()->back()->with('success', 'Reserva reprovada com sucesso!');
}


}