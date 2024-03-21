<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Categoria;
use App\Http\Requests\ProductoFormRequest;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        // Realiza la consulta de productos con la relación 'RELACION CARGADA'
        $productos = Producto::with('categoria')/* ->where('estatus', '=', '1') */;

        // Obtener los resultados de la consulta
        $producto = $productos->get(); // Número de elementos por página

        return view('almacen.producto.index', compact('producto'));
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
            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = Str::random(70) . '.' . $imagen->guessExtension();
            $img = $manager->read($imagen);
            $img = $img->resize(600);

            // Guarda la imagen redimensionada
            $img->toJpeg(100)->save($ruta.$nombreImagen);

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
    public function edit($id)
    {
        //
        $categorias = Categoria::where('estatus', 1)->orderBy('id_categoria', 'desc')->get();
        return view('almacen.producto.edit', ["producto"=>Producto::findOrFail($id)], compact('categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductoFormRequest $request, $id)
    {
        //Captura de datos nuevos
        $producto=Producto::findOrFail($id);
        $producto->id_categoria=$request->get("id_categoria");
        $producto->codigo=$request->get("codigo");
        $producto->nombre=$request->get("nombre");
        $producto->stock=$request->get("stock");
        $producto->descripcion=$request->get("descripcion");

        //Guardar Imagen en el servidor
        $ruta = public_path('/imagenes/productos/');
        if ($request->hasFile('imagen')) {

            // Verificar si el producto tiene una imagen asociada
            if ($producto->imagen) {
                // Eliminar la imagen anterior del servidor
                if (File::exists($ruta.$producto->imagen)) {
                    File::delete($ruta.$producto->imagen);
                }
            }

            $manager = new ImageManager(new Driver());
            $imagen = $request->file('imagen');
            $nombreImagen = Str::random(70) . '.' . $imagen->guessExtension();
            $img = $manager->read($imagen);
            $img = $img->resize(600);

            // Guarda la imagen redimensionada
            $img->toJpeg(100)->save($ruta.$nombreImagen);

            $producto->imagen = $nombreImagen;
        }

        // Actualizar el producto en la base de datos
        $producto->update();
        return Redirect::to("almacen/producto");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $producto=Producto::findOrFail($id);
        $producto->estatus='0';
        $producto->update();
        return Redirect::to("almacen/producto");
    }
}
