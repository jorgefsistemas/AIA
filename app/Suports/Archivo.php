<?php

namespace App\Suports;

use Str;
use ErrorException;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Livewire\TemporaryUploadedFile;

class Archivo
{
    public $path = '';
    public $name = '';
    public $extension = '';
    public $sistema = 'autos';

    public $prefix;
    public $sufix;

    private $file = null;

    protected $success = false;

    function __construct($file, $prefix, $sufix)
    {
        $this->file = $file;
        $this->prefix = $prefix;
        $this->sufix = $sufix;
    }

    static function guardarAmbos($file, $prefix, $sufix){
        if ($file instanceof TemporaryUploadedFile) {
            return self::guardar($file,$prefix, $sufix);
        }elseif(trim($file) != ''){
            dd("No llega");
            return self::guardarFromInput($file,$prefix, $sufix);
        }

        return null;
    }

    static function guardar($file, $prefix, $sufix)
    {
        $archivo = new Archivo($file, $prefix, $sufix);
        $archivo->storeAs();
        
        return $archivo;
    }

    static function guardarFromInput($file, $prefix, $sufix)
    {
        $img = explode(";base64,", $file);

        $fileData = base64_decode($img[1]);
        // save it to temporary dir first.
        $tmpFilePath = sys_get_temp_dir() . '/' . Str::uuid()->toString();
        file_put_contents($tmpFilePath, $fileData);

        // this just to help us get file info.
        $tmpFile = new File($tmpFilePath);

        $file = new UploadedFile(
            $tmpFile->getPathname(),
            $tmpFile->getFilename(),
            $tmpFile->getMimeType(),
            0,
            true // Mark it as test, since the file isn't from real HTTP POST.
        );

        $archivo = new Archivo($file, $prefix, $sufix);
        $archivo->storeAs();

        return $archivo;
    }

    private function path()
    {
        $now = now();
        return $this->sistema . '/' . $this->prefix . '/' . $now->year . '/' . $now->month . '/' . $now->day . '/' . $this->sufix;
    }

    private function storeAs()
    {
        if ($this->file instanceof UploadedFile) {
            $n = $this->file->getClientOriginalName();
            $this->name = pathinfo($n, PATHINFO_FILENAME);
            $this->extension = $this->file->getClientOriginalExtension();
            $this->path = $this->file->store($this->path());
        }
        return $this->path;
    }
}
