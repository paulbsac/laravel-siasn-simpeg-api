<?php

namespace Kanekescom\Siasn\Api\Simpeg\Commands;

use Illuminate\Console\Command;
use Kanekescom\Siasn\Api\Simpeg\Facades\Simpeg;

class GetRwPindahInstansiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:get-rw-pindah-instansi
                            {nipBaru : NIP Baru}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send GET request to /pns/rw-pindahinstansi/{nipBaru} endpoint';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $nipBaru = $this->argument('nipBaru');
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $this->info(json_encode(
            Simpeg::getRwPindahInstansi($paths)->object(),
            JSON_PRETTY_PRINT
        ));

        return self::SUCCESS;
    }
}
