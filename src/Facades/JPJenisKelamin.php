<?php namespace Bantenprov\JPJenisKelamin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * The JPJenisKelamin facade.
 *
 * @package Bantenprov\JPJenisKelamin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisKelamin extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'jumlah-penduduk-jenis-kelamin';
    }
}
