<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Caso;
use Illuminate\Support\Facades\Response;

class CasoController extends Controller
{

    /**
     * @return void
     */
    public function index()
    {
    }

    /**
     * @return void
     */
    public function create()
    {
    }

    /**
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
    }

    /**
     * @param int $id
     * @return void
     */
    public function show(int $id)
    {
    }

    /**
     * @param int $id
     * @return void
     */
    public function edit(int $id)
    {
    }

    /**
     * @param Request $request
     * @param int $id
     * @return void
     */
    public function update(Request $request, int $id)
    {
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
    }

    /**
     * @param int $id
     * @return string
     */
    public function getBrand(int $id)
    {
        $caso = Caso::find($id);

        return $caso ? $caso->brand->name : '';
    }

    /**
     * @param int $id
     * @return false|string
     */
    public function getByEdition(int $id)
    {
        $casos = Caso::leftJoin('brands', 'brands.id', 'casos.brand_id')
            ->where('casos.edition_id', $id)
            ->orderBy('brands.name')
            ->get('casos.*');
        $array = [];

        foreach ($casos as $caso) {
            $array[] = array(
                'edition' => $caso->edition->name,
                'brand' => $caso->brand->name,
                'brief' => $caso->brief,
                'audio' => $caso->audio,
                'visual' => $caso->visual,
                'whole' => $caso->whole
            );
        }

        return json_encode($array);
    }

    /**
     * @param string $edition
     * @param string $brand
     * @return mixed
     */
    public function downloadBrief(string $edition, string $brand)
    {
        $brand = self::rmvAccents($brand);

        /*if ($edition == '2022' && $brand == 'Dento') {
            return Storage::download($edition . '_EffieCollege_Brief_' . $brand . '.zip');
        }*/

        //return Storage::download('storage/'.$edition . '_EffieCollege_Brief_' . $brand . '.pdf');
        
        /*return Storage::download($edition . '_EffieCollege_Brief_' . $brand . '.pdf');*/
        return '';
    }

    /**
     * @param string $edition
     * @param string $brand
     * @return mixed
     */
    public function downloadAudio(string $edition, string $brand)
    {
        $brand = self::rmvAccents($brand);
        // return Storage::download($edition.'_EffieCollege_'.($brand === 'Entel Peru' ? 'Answers_' : 'Audio_').$brand.($brand === 'Entel Peru' ? '.zip' : '.mp4'));

        /*return Storage::download($edition . '_EffieCollege_Grabacion_' . $brand . '.mp4');*/
        return '';
    }

    /**
     * @param string $edition
     * @param string $brand
     * @return mixed
     */
    public function downloadVisual(string $edition, string $brand)
    {
        $brand = self::rmvAccents($brand);
        // return Storage::download($edition.'_EffieCollege_Visual_'.$brand.($brand === 'Entel Peru' ? '.pdf' : '.zip'));

        /*if ($edition == '2022' && $brand == 'Dento') {
            return view('errors.404');
        }*/

        /*return Storage::download($edition . '_EffieCollege_Visual_' . $brand . '.zip');*/
        
        return '';
    }

    /**
     * @param string $edition
     * @param string $brand
     * @return mixed
     */
    public function downloadWhole(string $edition, string $brand)
    {
        $brand = self::rmvAccents($brand);

        /*if ($brand == 'Eureka') {
            return Storage::download($edition.'_EffieCollege_Brief_'.$brand.'.pdf');
        }*/

        /*
        if ($brand == 'Entel Peru') {
            return view('errors.404');
        }
        */

        /*return Storage::download($edition . '_EffieCollege_Visual_' . $brand . '.zip');*/
        
        return '';
    }

    /**
     * @param string $edition
     * @return mixed
     */
    public function downloadForm(string $edition)
    {
        /*return Storage::download($edition . '_Formulario_participacion.docx');*/
        
        return '';
    }

    /**
     * @param string $string
     * @return array|string|string[]
     */
    protected function rmvAccents(string $string)
    {
        $not_allowed = ["á", "é", "í", "ó", "ú", "Á", "É", "Í", "Ó", "Ú", "ñ", "À", "Ã", "Ì", "Ò", "Ù", "Ã™", "Ã ", "Ã¨", "Ã¬", "Ã²", "Ã¹", "ç", "Ç", "Ã¢", "ê", "Ã®", "Ã´", "Ã»", "Ã‚", "ÃŠ", "ÃŽ", "Ã”", "Ã›", "ü", "Ã¶", "Ã–", "Ã¯", "Ã¤", "«", "Ò", "Ã", "Ã„", "Ã‹"];
        $allowed = ["a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "n", "N", "A", "E", "I", "O", "U", "a", "e", "i", "o", "u", "c", "C", "a", "e", "i", "o", "u", "A", "E", "I", "O", "U", "u", "o", "O", "i", "a", "e", "U", "I", "A", "E"];

        return str_replace($not_allowed, $allowed, $string);
    }
    
    
    public function downloadAuthorization()
    {
        $rutaArchivo = public_path('documentos/2024_EffieCollegePeru_Formulario Autorización.docx'); // Cambia esto a la ruta de tu archivo

        // Verificar si el archivo existe
        if (!file_exists($rutaArchivo)) {
            abort(404);
        }

        // Devolver el archivo como descarga
        return Response::download($rutaArchivo);
    }
    
}
