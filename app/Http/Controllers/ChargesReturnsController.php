<?php

namespace App\Http\Controllers;

use App\TotalCharge;
use App\TotalReturn;
use App\ChargeReturn;
use App\CheckAccount;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SearchesRequest;
use App\Http\Requests\ImportChargesReturnsRequest;


class ChargesReturnsController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $searchedData = CheckAccount::with('charges', 'returns')->get();

        return view("index", compact('searchedData'));
    }

    public function storeChargesReturns(ImportChargesReturnsRequest $request){

        $files = $request->file('files');
        $total = count($files);
        Session()->flash('message', 'Files Registrados: ' . $total);

        foreach ($files as $file) {
            $source = Str::before($file->getClientOriginalName(), '.');
            $validation = ChargeReturn::where('source', $source)->get();
            $returns =strpos($source, 'DEVWS');
            $charges = strpos($source, 'CGOWS');

            if (count($validation) < 1) {
                $data = file_get_contents($file);
                if ($charges !== false) {// Registro de cargos
                    $dataFilter = SanbornsTxtToArray($data);
                    foreach ($dataFilter as $dataInsert) {
                        ChargeReturn::create([
                            'sanborns_id' => substr($dataInsert, 0, 13),
                            'date' => substr($dataInsert, 13, 8),
                            'import' => substr($dataInsert, 43, 8),
                            'answer' => substr($dataInsert, 53, 2),
                            'reference' => substr($dataInsert, 55, 13),
                            'source' => $source,
                            'type' => 'Cobro'
                        ]);
                    }
                } elseif ($returns !== false) { //registro de devoluciones
                    $dataFilter = SanbornsTxtToArray($data);
                    foreach ($dataFilter as $dataInsert) {
                        ChargeReturn::create([
                            'sanborns_id' => substr($dataInsert, 0, 13),
                            'date' => substr($dataInsert, 13, 8),
                            'import' => substr($dataInsert, 43, 8),
                            'reference' => substr($dataInsert, 55, 13),
                            'source' => $source,
                            'type' => 'Devolucion'
                        ]);
                    }
                }
            }
        }
        $this->numberChargesReturns();
        return back();
    }

    public function numberChargesReturns()
    {
        TotalReturn::truncate();
        TotalCharge::truncate();

        DB::select('INSERT INTO total_charges (sanborns_id, total, import) 
                    SELECT sanborns_id, COUNT(*), sum(import) FROM charges_returns
                    where answer is null group by sanborns_id');

        DB::select('INSERT INTO total_returns (sanborns_id, total, import)
                    SELECT sanborns_id, COUNT(*), sum(import) FROM charges_returns 
                    where answer = "00" group by sanborns_id');
    }

    public function search(SearchesRequest $request){
        CheckAccount::truncate();
        $accounts = $request->input('sanborns_id');
        $arrayAccounts = preg_split("[\r\n]", $accounts);
        foreach ($arrayAccounts as $array){
            $SanbornsCheckAccounts = new CheckAccount();
            $SanbornsCheckAccounts->sanborns_id = $array;
            $SanbornsCheckAccounts->save();
        }
        return redirect()->route("index");
    }

    public function searchDetails(Request $request){
        $sanborns_id = $request->input('sanborns_id');
        $details = ChargeReturn::where('sanborns_id', $sanborns_id)->get();

        return view("details", compact('details'));
    }
}
