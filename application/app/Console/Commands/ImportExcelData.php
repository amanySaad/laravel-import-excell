<?php

namespace App\Console\Commands;

use App\Imports\ProductsImport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class ImportExcelData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import-excel{--file_name=articles.csv}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Excel importer using command';

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
     */
    public function handle()
    {
        $this->output->title('Starting import');
        $file_name = $this->option('file_name');

        if (\Storage::exists($file_name)) {
            $this->importFile($file_name);
        } else{
            $this->output->error('File Not Found');
        }

    }


    private function importFile($file_name)
    {
        try {
            (new ProductsImport)->withOutput($this->output)->import($file_name);

        } catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $this->info("\n");
                $this->output->error($failure->errors()[0] . " at Row " . $failure->row());
                exit();

            }
        }
        $this->output->success('Import successful');
    }
}
