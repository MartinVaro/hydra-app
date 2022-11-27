<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\Donacion;
use App\Models\Calificacion;
use App\Models\Comentario;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Collection;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function __construct(){
        $this->middleware('auth')->except(['all','show','home','search','search_ambiente', 'search_universo', 'search_educacion', 'search_tecnologico', 'search_energia', 'search_salud', 'search_sociedad','search_sustentable']);
    }

    public function admin(){
        $proyectos=Proyecto::all();
        return view('/adminProyectos', compact('proyectos'));
    }

    public function home()
    {
        //$date = Carbon::now();
        //dd($date->format('Y-m-d'));
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        
        $calificacions= DB::select("SELECT proyectos.id,  proyectos.user_id, titulo, categoria, portada, descripcion, abstracto, fecha, avg(ranking) as promedio
            FROM proyectos LEFT JOIN calificacions ON proyectos.id=proyecto_id 
            GROUP BY proyectos.id
            ORDER BY avg(ranking) DESC;");

        $collection = collect();
        foreach($calificacions as $cali){
            $combined = $collection->push($cali);
        }
        $combined= $combined->whereNotIn('user_id', [Auth::id()]);


        //////////////////////////////////////////////////AQUI ANDO TRABAJANDO

        $id=Auth::id();
        $calando= Calificacion::all();
        $calando= $calando->where('user_id', $id);
        
        $preferencias = collect();
        foreach($calando as $tematica){
            //dd($tematica->tema);
            $grupodetemas=$proyectos->where('categoria', $tematica->tema);
            foreach($grupodetemas as $particular){
                
                $preferencias=$preferencias->push($particular);
            }
            
        }

        if($preferencias->isEmpty()){
            $preferencias=$proyectos;
        }
        $preferencias = $preferencias->shuffle();
  
        /////////////////////////////////////////////////////////////////


        //$calificacions= Calificacion::with('user')->get();
        //$avg=$calificacions->avg('ranking');
        //$calificacions= DB::select("SELECT proyecto_id, avg(ranking) FROM calificacions GROUP BY proyecto_id ORDER BY avg(ranking) DESC;");
        
 
        $randoms = $proyectos->random(0);
        $fechados = $proyectos->sortBy([['fecha','desc']]);
        $userLog = Auth::id();
        //return  compact('proyectos');


        return view('index', compact('proyectos', 'combined', 'fechados','preferencias','userLog'));
        //return view('/index', compact('proyectos', 'randoms', 'fechados','userLog'));
        //$libros = Libro::all();
        //return view('/libros.listaLibros', compact('libros', 'userLog'));
    }

    public function index()
    {

        $donacions= DB::select("SELECT proyectos.id,  proyectos.user_id, titulo, categoria, descripcion, abstracto, proyectos.fecha, sum(cantidad) as recaudado
        FROM proyectos LEFT JOIN donacions ON proyectos.id=proyecto_id 
        GROUP BY proyectos.id
        ORDER BY sum(cantidad) DESC;");

        $collection = collect();
        
    
        foreach($donacions as $cali){
            $combined = $collection->push($cali);
        }
        $id=Auth::id();
        $proyectos= $combined->where('user_id', $id);
        
        return view('proyectos.indexProyectos', compact('proyectos'));
        //return view('/index', compact('proyectos', 'userLog'));
        
    }

    public function search(Request $request)
    {

        $proyectos= DB::select("SELECT proyectos.id, user_id, titulo, categoria, portada, descripcion, abstracto, fecha FROM proyectos 
        WHERE titulo LIKE '%$request->buscar%' 
        or categoria LIKE '%$request->buscar%'
        or descripcion LIKE '%$request->buscar%'
        or abstracto LIKE '%$request->buscar%';");

        $collection = collect();
        
        foreach($proyectos as $proyecto){
            $proyectos = $collection->push($proyecto);
        }
        //dd($proyectos->search($request->buscar));
        return view('searchindex', compact('proyectos'));      
    }


    public function search_ambiente()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Ambiente');
        return view('trindex', compact('proyectos'));      
    }

    public function search_universo()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Universo');
        return view('trindex', compact('proyectos'));      
    }

    public function search_educacion()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Educación');
        return view('trindex', compact('proyectos'));      
    }

    public function search_sustentable()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Sustentable');
        return view('trindex', compact('proyectos'));      
    }


    public function search_tecnologico()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Tecnológico');
        return view('trindex', compact('proyectos'));      
    }

    public function search_energia()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Energía');
        return view('trindex', compact('proyectos'));      
    }

    public function search_salud()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Salud');
        return view('trindex', compact('proyectos'));      
    }

    public function search_sociedad()
    {
        $proyectos= Proyecto::with('user')->get();
        $proyectos= $proyectos->whereNotIn('user_id', [Auth::id()]);
        $proyectos= $proyectos->where('categoria', 'Sociedad');
        return view('trindex', compact('proyectos'));      
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('proyectos.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     
    public function all()
    {
        $proyectos= Proyecto::with('user')->get();
        $randoms = $proyectos->random(0);
        $fechados = $proyectos->sortBy([['fecha','desc']]);
        $userLog = Auth::id();
        //dd($fechados);
        return  compact('proyectos');
        //return view('/index', compact('proyectos', 'randoms', 'fechados','userLog'));
        //return view('/index', compact('proyectos', 'randoms', 'fechados','userLog'));
        //$libros = Libro::all();
        //return view('/libros.listaLibros', compact('libros', 'userLog'));
    }

    public function store(Request $request)
    {
        //dd($request->imagen);
        $request->validate([
            'titulo'=> 'required',
            'categoria'=> 'required',
            'imagen'=> 'image', 
            'descripcion'=> 'required',
            'abstracto'=> 'required', 
            'fecha'=> 'required', 
        ]);

        if($request->hasFile('imagen')){
            $url= Storage::disk('digitalocean')->putFile('uploads', request()->imagen, 'public');
            //dd($url);
            //$direccion=$request->file('imagen')->store('public');
            $request->merge(['portada'=> $url]);
        }

        $request->merge(['user_id'=> Auth::id()]);
        Proyecto::create($request->all());
        return redirect('/proyecto')->with('crear','ok');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function show(Proyecto $proyecto)
    {
        //dd($proyecto->id);
        $comentarios= Comentario::all();
        $comentarios= $comentarios->where('proyecto_id', $proyecto->id);

        $calificacions= Calificacion::all();
        $calificacions= $calificacions->where('proyecto_id', $proyecto->id);
        
    
        $donacions= Donacion::all();
        $donacions= $donacions->where('proyecto_id', $proyecto->id);

       
        return view('/proyectos.showProyecto', compact('proyecto', 'comentarios', 'calificacions', 'donacions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function edit(Proyecto $proyecto)
    {
        return view('/proyectos.formEdit', compact('proyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'titulo'=> 'required',
            'categoria'=> 'required',
            'imagen'=> 'image', 
            'descripcion'=> 'required',
            'abstracto'=> 'required', 
            'fecha'=> 'required', 
        ]);

        if($request->hasFile('imagen')){
            $direccion=$request->file('imagen')->store('public');
            $request->merge(['portada'=> $direccion]);
            $url = str_replace('storage', 'public', $proyecto->portada);
            Storage::delete($url);
        }
        else{
            $request->merge(['portada'=> $proyecto->portada]);
        }
        Proyecto::where('id', $proyecto->id)->update($request->except(['_token', '_method', 'imagen']));
        return back()->with('editar','ok');
        //return redirect('/proyecto')->with('editar','ok');
        //->with('editar','ok');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Proyecto  $proyecto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Proyecto $proyecto)
    {
        $url = str_replace('storage', 'public', $proyecto->portada);
        Storage::delete($url);
        $proyecto->delete();
        return back()->with('eliminar','ok');
        //return redirect('/proyecto')->with('eliminar','ok');
    }
}