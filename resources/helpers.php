<?php

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
