<?php namespace Bantenprov\JPJenisKelamin\Console\Commands;

use Illuminate\Console\Command;

/**
 * The JPJenisKelaminCommand class.
 *
 * @package Bantenprov\JPJenisKelamin
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPJenisKelaminCommand extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bantenprov:jumlah-penduduk-jenis-kelamin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Demo command for Bantenprov\JPJenisKelamin package';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Welcome to command for Bantenprov\JPJenisKelamin package');
    }
}
