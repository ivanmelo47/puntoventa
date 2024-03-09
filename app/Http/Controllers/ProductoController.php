<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $texto = $request->input('texto');

        // Realiza la consulta de productos con la relación 'RELACION CARGADA'
        $productos = Producto::with('categoria');

        // Verificar si se ha proporcionado algún texto de búsqueda
        if ($texto) {
            $productos->where('nombre', 'LIKE', '%' . $texto . '%');
            // Puedes agregar más condiciones según tus necesidades
        }

        // Obtener los resultados de la consulta
        $producto = $productos->paginate(7); // Número de elementos por página

        return view('almacen.producto.index', compact('producto', 'texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Consulta la tabla de categoria para usarla en el SELECT de mi formulario de Producto
        $categorias = Categoria::where('estatus', 1)->orderBy('id_categoria', 'desc')->get();

        return view('almacen.producto.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductoFormRequest $request)
    {
        //
        $producto = new Producto;

        // Asigna los valores del formulario al modelo
        $producto->id_categoria = $request->id_categoria;
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->stock = $request->stock;
        $producto->descripcion = $request->descripcion;
        $producto->estatus = '1';

        // Verifica si el directorio no existe, y si no existe, lo crea
        $ruta = public_path('/imagenes/productos/');
        if (!file_exists($ruta)) {
            mkdir($ruta, 0777, true); // Crea el directorio con permisos de lectura, escritura y ejecución
        }
        //Guardar Imagen en el servidor
        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = Str::random(70) . '.' . $imagen->guessExtension();

            // Guarda la imagen en la ruta especificada
            $imagenGuardada = Image::make($imagen->getRealPath());

            // Redimensiona la imagen a 200x300px manteniendo la relación de aspecto
            $imagenGuardada->fit(200, 300, function ($constraint) {
                $constraint->upsize(); // Evita estirar la imagen
            });

            // Guarda la imagen redimensionada
            $imagenGuardada->save($ruta . $nombreImagen);

            $producto->imagen = $nombreImagen;
        }
        // Guarda el producto en la base de datos
        $producto->save();

        return Redirect::to('almacen/producto');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
