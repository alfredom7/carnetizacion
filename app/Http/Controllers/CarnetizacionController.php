<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Personal;
use App\Carnet;
use App\Bancos;
use App\CuentasBancos;
use App\Usuarios;
use App\Pagos;
use Auth;
use App\Sno_hsalida;
use Barryvdh\DomPDF\Facade as PDF;
use DNS1D;

class CarnetizacionController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
    	$total=Carnet::count();
    	$totaladm=Carnet::where('tipopersonal', 'ADMINISTRATIVO')->count();
    	$totaldoc=Carnet::where('tipopersonal', 'DOCENTE')->count();
    	$totalobr=Carnet::where('tipopersonal', 'OBRERO')->count();
    	$tth=Carnet::where('created_at', date('Y-m-d'))->count();
    	$tah=Carnet::where('created_at', date('Y-m-d'))->where('tipopersonal', 'ADMINISTRATIVO')->count();
    	$tdh=Carnet::where('created_at', date('Y-m-d'))->where('tipopersonal', 'DOCENTE')->count();
    	$toh=Carnet::where('created_at', date('Y-m-d'))->where('tipopersonal', 'OBRERO')->count();
    	$todosmes=Carnet::where('created_at', '>=', date('Y-m').'-01')
        ->where('created_at', '<', date('Y').'-'.(date('m')+1).'-01')
		->count();
    	$tames=Carnet::where('created_at', '>=', date('Y-m').'-01')
        ->where('created_at', '<', date('Y').'-'.(date('m')+1).'-01')
		->where('tipopersonal', 'ADMINISTRATIVO')->count();
    	$tdmes=Carnet::where('created_at', '>=', date('Y-m').'-01')
        ->where('created_at', '<', date('Y').'-'.(date('m')+1).'-01')
		->where('tipopersonal', 'DOCENTE')->count();
		$tomes=Carnet::where('created_at', '>=', date('Y-m').'-01')
        ->where('created_at', '<', date('Y').'-'.(date('m')+1).'-01')
		->where('tipopersonal', 'OBRERO')->count();

    	$ultimos20=Carnet::orderBy('created_at', 'DESC')->paginate(20);

        return view('index', compact('total', 'totaladm', 'totaldoc', 'totalobr', 'ultimos20', 'tth', 'tah', 'tdh', 'toh', 'tames', 'tdmes', 'tomes', 'todosmes'));
    }

    public function carnetsp()
    {
    	return view('carnet.carnetsp');
    }

    public function generarcarnet(Request $request)
    {
    	$data= array();
    	$usuariocreador=Auth::user()->username;
    	$cedula=$request->input("cedula");
    	$autoridad=$request->input("autoridad");
    	$completa=$request->input("completa");
    	$datos=Personal::where('cedper', $cedula)->get();
    	$selectdir=$request->input('selectdir');

    	//CONSULTA PARA TRAER DATOS BASICOS Y TIPO DE PERSONAL

		$consulta=\DB::connection('sugau')->select("SELECT cedper, nomper, apeper, fecingper, fecleypen,
		CASE   WHEN constancia.codnom IN ('0301', '2101', '2201') THEN (SELECT descar FROM sno_hcargo WHERE codcar = constancia.codcar AND codnom IN  ('0101', '1101', '0601', '1201', '1401', '0301', '2101', '2201')  AND anocur = '2017' 
		AND codperi = '002')
		WHEN constancia.codnom IN ('0101', '1101', '0601', '1201', '1401') THEN (constancia.paso ||' '|| constancia.grado)
		END AS cargo,
		(SELECT desded FROM sno_dedicacion WHERE codded = 
		CASE WHEN constancia.codnom IN ('0101') THEN '001' WHEN constancia.codnom IN ('0601') THEN '002' ELSE constancia.codded  END) as dedicacion, 
		(SELECT destipper FROM sno_tipopersonal WHERE codded = constancia.codded AND codtipper = constancia.codtipper ) as tipper,
		sum(valsal) as sueldo_integral, sueper as sueldo_base, constancia.numexpper, constancia.fecjubper, fecreingper
		FROM (
		SELECT d.cedper, d.apeper, d.nomper,d.fecingper, d.fecreingper, d.fecleypen, e.codcar , e.codded, e.codtipper,a.codemp, a.codnom, a.codperi, 
		b.codconc, b.titcon as nomcon, a.valsal, a.tipsal, abs(c.acuemp) AS acuemp, TRIM(d.numexpper) as numexpper, d.fecjubper,
		TRIM(e.codgra) as grado, TRIM(e.codpas) as paso, 
		abs(c.acupat) AS acupat, b.repacucon, b.repconsunicon, e.sueper ,b.consunicon, 
		(SELECT moncon FROM sno_hconstantepersonal WHERE b.repconsunicon='1' AND sno_hconstantepersonal.codper like '%$cedula%'
		AND sno_hconstantepersonal.codemp = b.codemp AND sno_hconstantepersonal.codnom = b.codnom 
		AND sno_hconstantepersonal.anocur = b.anocur 
		AND sno_hconstantepersonal.codperi = b.codperi AND sno_hconstantepersonal.codcons = b.consunicon ) AS unidad
		FROM sno_hsalida a 
		LEFT JOIN sno_hconcepto b ON a.codemp=b.codemp AND a.codnom=b.codnom AND a.anocur=b.anocur AND a.codperi=b.codperi AND a.codconc=b.codconc 
		LEFT JOIN sno_hconceptopersonal c ON a.codemp=c.codemp AND a.codnom=c.codnom AND a.anocur=c.anocur AND a.codperi=c.codperi AND a.codconc=c.codconc AND a.codper=c.codper 
		INNER JOIN sno_personal d ON a.codper = d.codper
		LEFT JOIN sno_hpersonalnomina e ON e.codper = d.codper AND e.codnom IN  ('0101', '1101', '0601', '1201', '1401', '0301', '2101', '2201')  AND e.codperi = '002'
		WHERE a.codemp='0001' AND a.codnom IN  ('0101', '1101', '0601', '1201', '1401', '0301', '2101', '2201')  AND a.anocur='2017'
		AND a.codperi='002' AND a.codper like '%$cedula%' AND a.valsal<>0 
		AND (a.tipsal='A' OR a.tipsal='V1' OR a.tipsal='R') 
		AND a.codconc IN ('0000009000')
		ORDER BY a.codnom, a.codperi, a.tipsal, a.codconc) AS constancia
		GROUP BY constancia.codnom, constancia.cedper, constancia.nomper, constancia.apeper,
		constancia.fecingper, constancia.fecreingper, constancia.codcar, constancia.codded, constancia.codtipper, sueper, 
		fecleypen, constancia.numexpper, constancia.fecjubper, constancia.grado, constancia.paso;");
		
		//CONTAR SI LA CANTIDAD DE ARREGLOS QUE TRAE LA CONSULTA ES MAYOR A 1 PARA MOSTRAR EL PRIMER ARREGLO SINO SERIALIZAR EL UNICO ARREGLO
//return dd($completa);
		if(count($consulta)>1){
			$consulta[0] = $consulta[0];
		} else {
			serialize($consulta);
		}

		if ($completa != "on") {
			 
			$guardar = new Carnet;
            $guardar->nombre = $consulta[0]->nomper;
            $guardar->apellido = $consulta[0]->apeper;
            $guardar->cedula = $consulta[0]->cedper;
            $guardar->tipopersonal = $consulta[0]->tipper;
            $guardar->cargo = $consulta[0]->cargo;
            $guardar->dependencia = $selectdir;
            $guardar->tipoimpresion = 2;
            $guardar->usuario_creador = Auth::user()->username;

            $guardar->save();

			 $pdf = PDF::loadView('carnet.generarcarnet', compact('datos','selectdir', 'consulta', 'completa'));


		}else{

			$guardar = new Carnet;
            $guardar->nombre = $consulta[0]->nomper;
            $guardar->apellido = $consulta[0]->apeper;
            $guardar->cedula = $consulta[0]->cedper;
            $guardar->tipopersonal = $consulta[0]->tipper;
            $guardar->cargo = $consulta[0]->cargo;
            $guardar->dependencia = $selectdir;
            $guardar->tipoimpresion = 1;
            $guardar->usuario_creador = Auth::user()->username;

            $guardar->save();

	    	 $pdf = PDF::loadView('carnet.generarcarnetcompleto', compact('datos','selectdir', 'consulta', 'completa'));
		}

		return $pdf->stream('carnet.pdf');
    }

        public function reporte()
    {
    	return view('carnet.reporte');
    }


    	public function generarreporte(Request $request)
    	{
    		$listado=$request->input('listado');
			$desde=$request->input('desde');
			$desde2=date("Y-m-d",strtotime($desde));			
			$hasta=$request->input('hasta');
			$hasta2=date("Y-m-d",strtotime($hasta));
    		$tipopersonal=$request->input('tipopersonal');
	    	$impresospvc=Carnet::where('tipoimpresion', 1)->count();
    	    $impresoshoja=Carnet::where('tipoimpresion', 2)->count();

    		if ($listado != 1) {
				if ($tipopersonal != "TODOS") {
	    			$reporte=Carnet::where('tipopersonal', $tipopersonal)->where('created_at','>=',$desde2)
	    			->where('created_at','<=', $hasta2)->orderBy('cedula', 'ASC')->get();
	    		}else{
	    			$reporte=Carnet::where('created_at','>=',$desde2)
	    			->where('created_at','<=', $hasta2)->orderBy('cedula', 'ASC')->get();
	    		}

	    		$pdf = PDF::setPaper('a4', 'landscape')->loadView('carnet.generarreporte', compact('listado', 'tipopersonal', 
	    			'desde2', 'hasta2', 'reporte', 'desde', 'hasta', 'impresospvc', 'impresoshoja'));
				return $pdf->stream('reporte.pdf');

				
    		}elseif($listado == 1){

    			if ($tipopersonal != "TODOS") {
	    			$reporte=Carnet::where('tipopersonal', $tipopersonal)->where('created_at','>=',$desde2)
	    			->where('created_at','<=', $hasta2)->orderBy('cedula', 'ASC')->get();
	    			$totaladm=Carnet::where('tipopersonal', 'ADMINISTRATIVO')->count();
	    			$totaldoc=Carnet::where('tipopersonal', 'DOCENTE')->count();
	    			$totalobr=Carnet::where('tipopersonal', 'OBRERO')->count();
	    			$totalcuenta=Carnet::count();
	    		}else{
	    			$reporte=Carnet::where('created_at','>=',$desde2)
	    			->where('created_at','<=', $hasta2)->orderBy('cedula', 'ASC')->get();
	    			$totaladm=Carnet::where('tipopersonal', 'ADMINISTRATIVO')->count();
	    			$totaldoc=Carnet::where('tipopersonal', 'DOCENTE')->count();
	    			$totalobr=Carnet::where('tipopersonal', 'OBRERO')->count();
	    			$totalcuenta=Carnet::count();
	    		}

				$pdf = PDF::setPaper('a4', 'landscape')->loadView('carnet.totales', compact('listado', 'tipopersonal', 
				'desde2', 'hasta2', 'reporte', 'desde', 'hasta', 'totalcuenta', 'totaladm', 'totaldoc', 'totalobr', 'impresospvc', 'impresoshoja'));
				return $pdf->stream('totales.pdf');
    		}


    	}



    public function barra()
    {
    	return DNS1D::getBarcodeSVG("3274625", "C39");
    }

    public function usuarios(){

    	$usuarios=Usuarios::all();

    	return view('auth.usuarios', compact('usuarios'));
    }

    public function pagos(){

    	$bancos=Bancos::all();
    	$c_bancos=CuentasBancos::all();

    	$bbod=CuentasBancos::where('codban', '001')->get();
    	$bven=CuentasBancos::where('codban', '002')->get();
    	$bbic=CuentasBancos::where('codban', '003')->get();
    	$bpro=CuentasBancos::where('codban', '004')->get();
    	$bmer=CuentasBancos::where('codban', '005')->get();
    	$bban=CuentasBancos::where('codban', '006')->get();
    	
    	$registros=Pagos::orderBy('id', 'DESC')->paginate(20);
    	



    	return view('carnet.pagos', compact('bancos', 'c_bancos', 'bbod', 'bven', 'bpro', 'bbic', 'bmer', 'bban', 'registros'));
    }

    public function registrarpago(Request $request){

    			$cedula=$request->input('cedula');
    			$banco_cuenta=$request->input('banco');
    			$monto=$request->input('monto');
    			$transaccion=$request->input('transaccion');

    			//PASAMOS EL NUMERO DE CUENTA DEL BANCO Y BUSCAMOS EL CODIGO DEL BANCO
    			$codban=CuentasBancos::where('ctaban', $banco_cuenta)->get();
    			foreach ($codban as $codban) {
 				//BUSCAMOS EL CODIGO DEL BANCO A PARTIR DEL NUMERO DE CUENTA
 				$codban2=Bancos::where('codban', $codban->codban)->get();
    			}

    			//GUARDAR COMPROBANTE DE PAGO
				$guardar = new Pagos;
		        $guardar->cedula = $cedula;
		        $guardar->banco = $codban2[0]->codban;
		        $guardar->banco_cuenta = $banco_cuenta;
		        $guardar->monto = $monto;
		        $guardar->numero_transaccion = $transaccion;
		        $guardar->save();

		  		$id=$guardar->id;
    
				return redirect()->to('/recibo/'.$id);
    }

    public function comprobante($id){
    			//DATOS DEL PAGO
    			$comprobante=Pagos::where('id', $id)->get();
    			//DATOS DE LA PERSONA BUSCADO POR LA CEDULA
    			$cedulapersona=$comprobante[0]->cedula;
    			//BUSCAMOS A LA PERSONA EN EL SUGAU POR SU NUMERO DE CEDULA
				$persona=Personal::where('cedper', $cedulapersona)->get();

    			$pdf = PDF::setPaper('a4', 'letter')->loadView('pagos.comprobante', compact('id', 'comprobante', 'persona'));
				return $pdf->stream('comprobantedepago.pdf');
    }
}
