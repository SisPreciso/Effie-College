<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;
use Carbon\Carbon;
use App\Answer;
use Log;

class AnswerController extends Controller
{
    protected const SPAN_USER_DIF = 'No se puede editar las respuestas de un equipo al cual no perteneces.';
    protected const SPAN_USER_CMP = 'No se puede guardar/actualizar respuestas luego que la propuesta para la marca haya sido enviada.';
    protected const SPAN_ANSW_CRT = 'Lo sentimos, ocurrió un problema mientras se intentaba guardar tu respuesta.';
    protected const SPAN_ANSW_UPD = 'Lo sentimos, ocurrió un problema mientras se intentaba actualizar tu respuesta.';
    protected const SPAN_HIST_DIF = 'No se puede revisar el historial de cambios de un equipo al cual no perteneces.';
    protected const SPAN_INDX_OUT = 'La respuesta solicitada no ha sido encontrada.';
    protected const STREAM_SEARCH = '/data:image\/(\w+);base64,([^"]+)/';
    protected const STREAM_REPLAC = '***IMAGE***';

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
     * @return mixed
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'question_id' => 'required|int|min:1',
            'detail' => 'required|string',
        ], $this->validationErrorMessages());
       
        if (Auth::user()->is_completed)
        return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);
        
        $base64Image = $request->detail;
        Log::info([$base64Image]);

        // Extraer el tipo de imagen y los datos
        //$urlsArray = [];
        if (preg_match_all(self::STREAM_SEARCH, $base64Image, $matches)) {
            Log::info([$matches]);

            $base64Image = preg_replace(self::STREAM_SEARCH, self::STREAM_REPLAC, $base64Image);
            Log::info([$base64Image]);

            //$data = substr($base64Image, strpos($base64Image, ',') + 1); //Se suma 1 a la posición encontrada para obtener la posición del carácter que sigue a la coma. Esto se hace para que el resultado de substr() empiece justo después de la coma.
            foreach ($matches[2] as $index => $data) {
                //$data = $matches[2][0];
                $type = strtolower($matches[1][$index]); // jpg, png, gif

                // Decodificar la imagen
                $image = base64_decode($data);
                if ($image === false)
                    throw new \Exception('Base64 decode failed');
                
                // Validar el tamaño de la imagen (350 KB)
                //if (strlen($image) > 350 * 1024) { // 350 * 1024 bytes
                //  return response()->json(['error' => 'La imagen supera el tamaño máximo permitido de 350 KB.'], 400);
                //}
                // Generar un nombre único para la imagen
                $imageName = Auth::user()->username.'-'.uniqid().".$type"; // Cambia la extensión según el tipo de imagen

                // Guardar la imagen en el almacenamiento
                Storage::put($imageName, $image);

                // Obtener la URL de la imagen
                $imageUrl = Storage::url($imageName);

                $base64Image = self::replaceNextUrl($base64Image, $imageUrl);
                Log::info([$base64Image]);

                //$urlsArray[] = $imageUrl;
            }
        } 
        /*else {
            throw new \Exception('Invalid image data');
        }*/
        $answer = Answer::create([
            'question_id' => $request->question_id,
            //'detail' => $request->detail,
            'detail' => $base64Image,
            'user_id' => Auth::user()->id
        ]); 

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['answ_crt' => self::SPAN_ANSW_CRT]], 400);

        return $answer;
    }

    private function replaceNextUrl($content, $url)
    {
        $pos = strpos($content, self::STREAM_REPLAC);
        
        if (!$pos) return $content;

        return substr_replace($content, $url, $pos, strlen(self::STREAM_REPLAC));
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
     * @return mixed
     * @throws ValidationException
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'question_id' => 'required|int|min:1',
            'detail' => 'required|string',
        ], $this->validationErrorMessages());

        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);

        $answer = Answer::find($id);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['indx_out' => self::SPAN_INDX_OUT]], 400);

        if (Auth::user()->id !== $answer->user_id)
            return response()->json(['success' => 'false', 'errors' => ['user_dif' => self::SPAN_USER_DIF]], 400);

            $base64Image = $request->detail;
    
            // Extraer el tipo de imagen y los datos
            if (preg_match_all(self::STREAM_SEARCH, $base64Image, $matches)) {
                $base64Image = preg_replace(self::STREAM_SEARCH, self::STREAM_REPLAC, $base64Image);

                foreach ($matches[2] as $index => $data) {
                    //$data = $matches[2][0];
                    $type = strtolower($matches[1][$index]); // jpg, png, gif
    
                    // Decodificar la imagen
                    $image = base64_decode($data);
                    if ($image === false)
                        throw new \Exception('Base64 decode failed');
                    
                    // Validar el tamaño de la imagen (350 KB)
                    //if (strlen($image) > 350 * 1024) { // 350 * 1024 bytes
                    //  return response()->json(['error' => 'La imagen supera el tamaño máximo permitido de 350 KB.'], 400);
                    //}
                    // Generar un nombre único para la imagen
                    $imageName = Auth::user()->username.'-'.uniqid().".$type"; // Cambia la extensión según el tipo de imagen
    
                    // Guardar la imagen en el almacenamiento
                    Storage::put($imageName, $image);
    
                    // Obtener la URL de la imagen
                    $imageUrl = Storage::url($imageName);
    
                    $base64Image = self::replaceNextUrl($base64Image, $imageUrl);
                    Log::info([$base64Image]);
                }

            } 
        $answer = $answer->update([
                'question_id' => $request->question_id,
                //'detail' => $request->detail,
                'detail' => $base64Image,
                'user_id' => Auth::user()->id,
            ]);

            if (!$answer)
                return response()->json(['success' => 'false', 'errors' => ['answ_crt' => self::SPAN_ANSW_CRT]], 400);

            return $answer;
            
    }

    /**
     * @param int $id
     * @return void
     */
    public function destroy(int $id)
    {
    }

    public function storeTitle(Request $request)
    {
        $this->validate($request, [
            'question_id' => 'required|int|min:1',
            'title' => 'required|string|max:100',
        ], $this->validationErrorMessages());

        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);

        $answer = Answer::create([
            'question_id' => $request->question_id,
            'detail' => $request->title,
            'user_id' => Auth::user()->id,
        ]);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['answ_crt' => self::SPAN_ANSW_CRT]], 400);

        return $answer;
    }

    /**
     * @param Request $request
     * @param int $id
     * @return JsonResponse
     * @throws ValidationException
     */
    public function updateTitle(Request $request, int $id): JsonResponse
    {
        $this->validate($request, [
            'question_id' => 'required|int|min:1',
            'title' => 'required|string|max:100',
        ], $this->validationErrorMessages());

        if (Auth::user()->is_completed)
            return response()->json(['success' => 'false', 'errors' => ['user_cmp' => self::SPAN_USER_CMP]], 400);

        $answer = Answer::find($id);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['indx_out' => self::SPAN_INDX_OUT]], 400);

        if (Auth::user()->id !== $answer->user_id)
            return response()->json(['success' => 'false', 'errors' => ['user_dif' => self::SPAN_USER_DIF]], 400);

        $result = $answer->update([
            'question_id' => $request->question_id,
            'detail' => $request->title,
            'user_id' => Auth::user()->id,
        ]);

        if (!$result)
            return response()->json(['success' => 'false', 'errors' => ['answ_upd' => self::SPAN_ANSW_UPD]], 400);

        return $answer;
    }

    /**
     * @param int $id
     * @return array|JsonResponse
     */
    public function history(int $id)
    {
        $answer = Answer::find($id);

        if (!$answer)
            return response()->json(['success' => 'false', 'errors' => ['indx_out' => self::SPAN_INDX_OUT]], 400);

        if (!Auth::user()->is_admin && Auth::user()->id !== $answer->user_id)
            return response()->json(['success' => 'false', 'errors' => ['user_dif' => self::SPAN_HIST_DIF]], 400);

        $changes = [];

        foreach ($answer->historyChanges() as $change) {
            $changes[] = [
                //'before' => json_decode($change['before_changes'])->detail,
                'after' => json_decode($change['after_changes'])->detail,
                'type' => $change['change_type'] === 'created' ? 'Creación' : 'Actualización',
                'time' => Carbon::parse($change['created_at'])->isoFormat('dddd D MMMM YYYY, HH:mm'),
                //'autor' => User::find($change['changer_id'])->username
            ];
        }

        return $changes;
    }

    /**
     * @return string[]
     */
    public static function validationErrorMessages(): array
    {
        return [
            'question_id.required' => 'Debes ingresar obligatoriamente el ID de la pregunta.',
            'question_id.int' => 'El ID de la pregunta ingresada no tiene un formato válido.',
            'question_id.min' => 'El ID de la pregunta ingresada es inválido.',
            'detail.required' => 'Debes ingresar obligatoriamente el detalle de tu respuesta.',
            'title.required' => 'Debes ingresar obligatoriamente un título para tu propuesta.',
            'title.max' => 'El título de tu propuesta debe contener como máximo cien (100) caracteres.',
        ];
    }
}
