<?php

use Carbon\Carbon;

if (! function_exists('versioned_asset')) {
    /**
     * Generate an asset path for the application with timestamp
     * Ele atualiza o nome do arquivo (mantém o cache atualizado).
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function versioned_asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure) .  '?v=' . filemtime(public_path($path));
    }

}


if (! function_exists('convert_date_time')) {
    /**
     * Generate an asset path for the application with timestamp
     * Converte data e hora padrão PT-BR para o Padrão do Banco de Dados
     *
     * @param  dateTime  $date
     */
    function convert_date_time($date = null)
    {
        $dataFormat = Carbon::createFromFormat('d/m/Y H:i', $date);        
        return $dataFormat;
    }

}

if (! function_exists('convert_date')) {
    /**
     * Generate an asset path for the application with timestamp
     * Converte data padrão PT-BR para o Padrão do Banco de Dados
     *
     * @param  date  $date
     */
    function convert_date($date = null)
    {
        $dataFormat = Carbon::createFromFormat('d/m/Y', $date);        
        return $dataFormat;
    }

}
