<?php

namespace App\Http\Controllers;

use App\Models\Yate;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AjaxYateController extends Controller {

    const ITEMS_PER_PAGE = 10;
    const ORDER_BY = 'yate.nombre';
    const ORDER_TYPE = 'asc';

    function fetchData(Request $request) {
        $q = $request->input('q', '');
        $orderby = $request->input('orderby', 'yate.nombre');
        $ordertype = $request->input('ordertype', 'asc');
        
        //construcción de la consulta
        $yate = DB::table('yate')
                    ->join('users', 'users.id', '=', 'yate.iduser')
                    ->join('astillero', 'astillero.id', '=', 'yate.idastillero')
                    ->join('tipo', 'tipo.id', '=', 'yate.idtipo')
                    ->select('yate.*',
                                'astillero.nombre as anombre',
                                'tipo.nombre as tnombre', 'tipo.desde', 'tipo.hasta', 
                                'users.name as uname', 'users.email as uemail', 'users.type as utype');

        //agregando condición a la consulta, si la hay
        if($q != '') {
            $yate = $yate->where('yate.nombre', 'like', '%' . $q . '%')
                            ->orWhere('yate.id', 'like', '%' . $q . '%')
                            ->orWhere('tipo.nombre', 'like', '%' . $q . '%')
                            ->orWhere('users.name', 'like', '%' . $q . '%')
                            ->orWhere('users.email', 'like', '%' . $q . '%')
                            ->orWhere('astillero.nombre', 'like', '%' . $q . '%')
                            ->orWhere('yate.descripcion', 'like', '%' . $q . '%')
                            ->orWhere('yate.precio', 'like', '%' . $q . '%');
        }

        //agregando el orden a la consulta
        $yate = $yate->orderBy($orderby, $ordertype);
        if($orderby != self::ORDER_BY) {
            $yate = $yate->orderBy(self::ORDER_BY, self::ORDER_TYPE);
        }

        //ejecutar la consulta, usando la paginación
        $yates = $yate->paginate(self::ITEMS_PER_PAGE)->withQueryString();
        
        return response()->json([
                                    'csrf' => csrf_token(),
                                    'url' => route('yate.index'),
                                    'user' => Auth::user(),
                                    'yates' => $yates,
                                ], 200);
    }

    function index(Request $request) {
        return view('index');
    }

}