<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContenidoController2 extends Controller
{
    private static $rutaArchivosTemporal = 'temp/';
    private static $formatoHoraFecha_MMSQL = "d/m/Y H:i:s";
    //private static $prefijoRutaArchivosProduccion = '../../../';
    private static $prefijoRutaArchivosProduccion = '';

    public function mantenedor($Estado='.', Request $request){
        
        // if(!Controller::logueado())
        //     return view('login');
        if ($Estado == 'addContenido') return $this->addContenido($request);
        else if ($Estado == 'listContenido') return $this->listContenido($request);
        else if ($Estado == 'addFoto') return $this->addFoto($request);
        else if ($Estado == 'eliminar') return $this->eliminar($request);
        else if ($Estado == 'recuperar') return $this->recuperar($request);
        else if ($Estado == 'noPrioritario') return $this->noPrioritario($request);
        else if ($Estado == 'getContenido') return $this->getContenido($request);
        else if ($Estado == 'updContenido') return $this->updContenido($request);
        return view('panel/contenido2.mantenedor');
    }

    public function addFoto($request){
        $extension = explode(".", $_FILES["file"]['name']);
        $extension = $extension[count($extension) - 1];
        $nombreArchivo =
        date("y"). //año
        date("m"). //mes
        date("d"). //dia
        date("H"). //hora 24h
        date("i"). //minutos
        date("s"). //segundos
        date("_").
        substr(microtime(),2,4).
        '.'.$extension;
        move_uploaded_file($_FILES["file"]['tmp_name'], static::$rutaArchivosTemporal.$nombreArchivo);
        return $nombreArchivo;
    }

    private static function convertirEstadoFechaHora($estado, $fecha, $hora){
        //$fechaHora = strtotime(date('d-m-Y H:i:s'));
        //$fechaHora = date("Y-m-d H:i:s", $fechaHora);
        $fechaHora = strtotime(date('d-m-Y H:i:s'));
        switch ($estado) {
            case '1':
                $r['estado'] =  'PUBLICADO';
                break;
            case '2':
                $r['estado'] = 'GUARDADO';
                break;
            case '3':
                $fechaHora = strtotime(date($fecha.' '.$hora));
                $r['estado'] = 'PUBLICAR';
                break;
            case '4':
                $r['estado'] = 'PRIORITARIO';
                break;
            default: break;
        }
        $fechaHora = date(static::$formatoHoraFecha_MMSQL, $fechaHora);
        $r['fechaHora'] = $fechaHora;
        return $r;
    }
    public function generarNombreNoticia($tipo){
        $prefijoNoticia = 'noticia';
        if($tipo=='CORONAVIRUS'){
            $prefijoNoticia = 'CORONAVIRUS';
        }
        $fechaHora = strtotime(date('d-m-Y H:i:s'));
        return $prefijoNoticia.$fechaHora;
    }
    public static function moverArchivosNuevos($tipo, $imagenes, $documentos){
        $nCarpetaNoticia = static::$prefijoRutaArchivosProduccion.'noticias/detalle';
        $nombreCarpetaImagen = static::$prefijoRutaArchivosProduccion.'noticias/img';
        $rutaDocumentoGuardada = static::$prefijoRutaArchivosProduccion.'noticias/doc';
        $rutaAlt='noticias/img/';
        //$prefijoNoticia = 'noticia';
        if($tipo=='CORONAVIRUS'){
            $archivoPlantilla = 'noticiaCoronavirus';
            $nCarpetaNoticia = static::$prefijoRutaArchivosProduccion.'coronavirus/detalle';
            $nombreCarpetaImagen = static::$prefijoRutaArchivosProduccion.'coronavirus/img';
            $rutaDocumentoGuardada = static::$prefijoRutaArchivosProduccion.'coronavirus/doc';
            $rutaAlt='coronavirus/img/';
            //$prefijoNoticia = 'CORONAVIRUS';
        }
        //mover fotos y docs del temporal
        //movemos las imagenes de la carpeta temporal a la carpeta que quedará
        foreach (explode("|", $imagenes) as $item){
            if ($item != ''){
                rename (static::$rutaArchivosTemporal.$item, $nombreCarpetaImagen."/".$item);
            }
        }
        foreach (explode("|", $documentos) as $item){
            if ($item != ''){
                rename (static::$rutaArchivosTemporal.$item, $rutaDocumentoGuardada."/".$item);
            }
        }
    }
    private static function generarNoticiaHtml($urlPub, $titulo, $tipo, $contenido, $imagenes, $documentos){
        $ruta_web = Controller::ruta_web;
        $archivoPlantilla = 'noticiaPlantilla';
        $nCarpetaNoticia = static::$prefijoRutaArchivosProduccion.'noticias/detalle';
        $nombreCarpetaImagen = static::$prefijoRutaArchivosProduccion.'noticias/img';
        $rutaDocumentoGuardada = static::$prefijoRutaArchivosProduccion.'noticias/doc';
        $rutaAlt='noticias/img/';
        //$prefijoNoticia = 'noticia';
        if($tipo=='CORONAVIRUS'){
            $archivoPlantilla = 'noticiaCoronavirus';
            $nCarpetaNoticia = static::$prefijoRutaArchivosProduccion.'coronavirus/detalle';
            $nombreCarpetaImagen = static::$prefijoRutaArchivosProduccion.'coronavirus/img';
            $rutaDocumentoGuardada = static::$prefijoRutaArchivosProduccion.'coronavirus/doc';
            $rutaAlt='coronavirus/img/';
            //$prefijoNoticia = 'CORONAVIRUS';
        }
        $archivoFinal = $nCarpetaNoticia.'/'.$urlPub.'.php';
        $slides = '<div class="swiper-container bg-white"><div class="swiper-wrapper align-items-center" data-swiper-autoplay="10">';
        foreach (explode("|", $imagenes) as $key=> $value){
            if($value==""){
                break;
            }
            $slides.= '<div class="swiper-slide text-center container2 align-items-center"><img src="'.$ruta_web.'noticias/img/'.$value.'" alt="'.$ruta_web.'noticias/img/'.$value.'" class="image1"></div>';
        }
        $slides .= '</div></div>';
        $doc='';
        foreach (explode("|", $documentos) as $key=> $value) {
            if($value==""){
                break;
            }
            $doc.='<embed src="'.$ruta_web.'coronavirus/doc/'.$value.'" type="application/pdf" width="100%" height="450px"/><br>';
        }
        //obtener datos de la plantilla y escribir noticia
        $archivo = file_get_contents('plantillas/'.$archivoPlantilla.'.php');
        $archivo = str_replace('{{{{TITULO}}}}', $titulo, $archivo);
        $archivo = str_replace('{{{{TIPO}}}}', $tipo, $archivo);
        $archivo = str_replace('{{{{IMAGEN}}}}', $slides, $archivo);
        $archivo = str_replace('{{{{DOCUMENTO}}}}', $doc, $archivo);
        $archivo = str_replace('{{{{CODIGO}}}}', $contenido, $archivo);
        $archivo = str_replace('{{{{URLNOTICIA}}}}', '', $archivo);////////
        //crear archivo
        $arch = fopen($archivoFinal, 'c');
        fclose($arch);
        //escribe en archivo creado
        file_put_contents($archivoFinal, $archivo, FILE_USE_INCLUDE_PATH);
    }

    public function addContenido($request){
        $archivos = $request->get('archivos');
        $publicacion = $request->get('publicacion');
        $titulo = $publicacion['titulo'];
        $contenido = $publicacion['contenido'];
        $tipo = $publicacion['tipo'];
        $slide = $publicacion['slide'];
        $estado = $publicacion['estado'];
        $fecha = $publicacion['fecha'];
        $hora = $publicacion['hora'];
        $r = static::convertirEstadoFechaHora($estado, $fecha, $hora);
        $estado = $r['estado'];
        $fechaHora = $r['fechaHora'];
        $imagenes = '';
        $documentos = '';
        foreach ($archivos as $item) {
            $nombreArchivo = $item['upload']['data'];
            $extension = explode(".", $nombreArchivo);
            $extension = $extension[1];
            switch (strtolower($extension)) {
                case 'pdf': //documentos
                    $documentos .= $nombreArchivo.'|';
                    break;
                default: //imagenes
                    $imagenes .= $nombreArchivo.'|';
                    break;
            }
        }
        $urlPub = static::generarNombreNoticia($tipo);
        $url = Controller::ruta_api.'api/Contenido?'
            .'userTokenId='.Controller::token
            .'&_Pub_urlPub='.$urlPub
            .'&_Pub_tipo='.$tipo
            .'&_Pub_titulo='.$titulo
            .'&_Pub_contenido='.$contenido
            .'&_Pub_slide='.$slide
            .'&_Pub_estado='.$estado
            .'&_Pub_fechaPublicacion='.$fechaHora
            .'&_Pub_urlImagen='.(($imagenes!='')?$imagenes:'|')
            .'&_Pub_urlDoc='.(($documentos!='')?$documentos:'|');
        //return $url;
        $res = json_encode($this->CallAPI('GET', $url));
        if ($res == true){
            static::generarNoticiaHtml($urlPub, $titulo, $tipo, $contenido, $imagenes, $documentos);
            static::moverArchivosNuevos($tipo, $imagenes, $documentos);
        }
        return $res;
    }

    public function listContenido(){
        $url = Controller::ruta_api.'api/Contenido?'
            .'_Pub_userTokenId='.Controller::token;
        //return $url;
        $res = $this->CallAPI('GET', $url);
        $r = array();
        foreach ($res as $item) {
            $t = array();
            $t['id'] = $item[0];
            $t['titulo'] = $item[1];
            $t['fechaPublicacion'] = $item[2];
            $t['codigo'] = $item[3];
            $t['fechaCreacion'] = $item[4];
            $t['estado'] = $item[5];
            $t['urlImagen'] = $item[6];
            $t['urlDoc'] = $item[7];
            $t['tipo'] = $item[9];
            $t['urlPub'] = $item[10];
            $r[] = $t;
        }
        return json_encode($r);
    }

    public function modificarEstado($id, $estado){
        $url = Controller::ruta_api.'api/Contenido?'
            .'userTokenId='.Controller::token
            .'&_Pub_estado='.$estado
            .'&_Pub_id='.$id;
        $res = $this->CallAPI('GET', $url);
        return json_encode($res);
    }
    public function eliminar($request){
        return $this::modificarEstado($request->get('id'), 'DESACTIVADO');
    }
    public function recuperar($request){
        return $this::modificarEstado($request->get('id'), 'GUARDADO');
    }
    public function noPrioritario($request){
        return $this::modificarEstado($request->get('id'), 'PUBLICADO');
    }

    public function getContenido($request){
        $url = Controller::ruta_api.'api/Contenido?'
            .'userTokenId='.Controller::token
            .'&_Pub_id='.$request->get('id');
        //return $url;
        $res = $this->CallAPI('GET', $url);
        //dd($res);
        $t = array();
        $t['id'] = $res[0];
        $t['titulo'] = $res[1];
        //$t['fechaPublicacion'] = $res[2];
        //dd($res[2].' . '.$res[4]);
        $fecha = date_create_from_format('d/m/Y H:i:s', $res[2]);
        $t['fecha'] = $fecha->format('Y-m-d');
        $t['hora'] = $fecha->format('H:i');
        //$t['codigo'] = $res[3];
        $t['contenido'] = $res[3];
        //$t['fechaCreacion'] = $res[4];
        //$t['estado'] = $res[5];
        switch ($res[5]) {
            case 'PUBLICADO':   $t['estado'] = 1;   break;
            case 'GUARDADO':    $t['estado'] = 2;   break;
            case 'PUBLICAR':    $t['estado'] = 3;   break;
            case 'PRIORITARIO': $t['estado'] = 4;   break;
            default:            $t['estado'] = '';  break;
        }
        $t['tipo'] = $res[6];
        $t['urlPub'] = $res[7];
        $t['slide'] = $res[8];
        //$t['urlImagen'] = $res[9];
        $t['urlImagen'] = array();
        $t['urlImagenOriginal'] = array();
        foreach (explode('|', $res[9]) as $item) {
            if ($item != ""){
                $t['urlImagen'][] = $item;
                $t['urlImagenOriginal'][] = $item;
            }
        }
        //$t['urlDoc'] = $res[10];
        $t['urlDoc'] = array();
        $t['urlDocOriginal'] = array();
        foreach (explode('|', $res[10]) as $item) {
            if ($item != ""){
                $t['urlDoc'][] = $item;
                $t['urlDocOriginal'][] = $item;
            }
        }
        //url para los archivos
        //$cDetalle = $prefijoRutaArchivosProduccion.'noticias/detalle';
        $cImagen = static::$prefijoRutaArchivosProduccion.'noticias/img';
        $cDocumento = static::$prefijoRutaArchivosProduccion.'noticias/doc';
        if($t['tipo']=='CORONAVIRUS'){
            //$cDetalle = static::$prefijoRutaArchivosProduccion.'coronavirus/detalle';
            $cImagen = static::$prefijoRutaArchivosProduccion.'coronavirus/img';
            $cDocumento = static::$prefijoRutaArchivosProduccion.'coronavirus/doc';
        }
        $t['prefijoImagen'] = $cImagen.'/';
        $t['prefijoDocumento'] = $cDocumento.'/';
        return json_encode($t);
    }





    public function updContenido($request){
        $archivos = $request->get('archivos');
        $publicacion = $request->get('publicacion');
        $titulo = $publicacion['titulo'];
        $contenido = $publicacion['contenido'];
        $tipo = $publicacion['tipo'];
        $slide = $publicacion['slide'];
        $estado = $publicacion['estado'];
        $fecha = $publicacion['fecha'];
        $hora = $publicacion['hora'];
        //pongo variables extras
        $idPublicacion = $publicacion['id'];
        $urlPub = $publicacion['urlPub'];
        $urlImagen = $publicacion['urlImagen'];
        //////////////////////$urlImagen = $publicacion['urlImagenOriginal'];
        $urlDoc = $publicacion['urlDoc'];
        //////////////////////$urlDoc = $publicacion['urlDocOriginal'];
        //pongo variables extras
        $r = static::convertirEstadoFechaHora($estado, $fecha, $hora);
        $estado = $r['estado'];
        $fechaHora = $r['fechaHora'];
        //imagenes nuevas que se van a subir
        $imagenes = '';
        $documentos = '';
        foreach ($archivos as $item) {
            $nombreArchivo = $item['upload']['data'];
            $extension = explode(".", $nombreArchivo);
            $extension = $extension[1];
            switch (strtolower($extension)) {
                case 'pdf': //documentos
                    $documentos .= $nombreArchivo.'|';
                    break;
                default: //imagenes
                    $imagenes .= $nombreArchivo.'|';
                    break;
            }
        }
        //concateno con despues de las imagenes antiguas
        $tempImagen = '';
        foreach ($urlImagen as $item) {
            $tempImagen .= $item.'|';
        }
        $urlImagen = $tempImagen.$imagenes;
        $tempDoc = '';
        foreach ($urlDoc as $item) {
            $tempDoc .= $item.'|';
        }
        $urlDoc = $tempDoc.$documentos;
        //nombre de noticia ya esta generado
        //$urlPub = static::generarNombreNoticia($tipo);
        $url = Controller::ruta_api.'api/Contenido?'
            .'userTokenId='.Controller::token
            .'&_Pub_tipo='.$tipo
            .'&_Pub_titulo='.$titulo
            .'&_Pub_contenido='.$contenido
            .'&_Pub_slide='.$slide
            .'&_Pub_estado='.$estado
            .'&_Pub_fechaPublicacion='.$fechaHora
            .'&_Pub_urlImagen='.(($urlImagen!='')?$urlImagen:'|')
            .'&_Pub_urlDoc='.(($urlDoc!='')?$urlDoc:'|')
            .'&_Pub_id='.$idPublicacion;
        //return $url;
        $res = json_encode($this->CallAPI('GET', $url));
        if ($res == true){
            static::generarNoticiaHtml($urlPub, $titulo, $tipo, $contenido, $imagenes, $documentos);
            static::moverArchivosNuevos($tipo, $imagenes, $documentos);
        }
        return $res;
    }



}
