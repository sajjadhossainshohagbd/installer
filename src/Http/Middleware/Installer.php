<?php

namespace Nirapodsoft\Installer\Http\Middleware;

use Closure;

class Installer 
{
    public function handle($request, Closure $next)
    {
        if($this->alreadyInstalled()){
            return $next($request);
        }
        return redirect()->route('installation');
    }
    
    /**
     * If application is already installed.
     *
     * @return boolean
     */
    public function alreadyInstalled()
    {
        return file_exists(storage_path('installed'));
    }
}