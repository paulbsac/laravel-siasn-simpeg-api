<?php

namespace Kanekescom\Siasn\Api\Simpeg\Commands;

use Illuminate\Console\Command;
use Kanekescom\Siasn\Api\Simpeg\Facades\Simpeg;

class GetRwPendidikanCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'siasn-simpeg:get-rw-pendidikan
                            {nipBaru : NIP Baru}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send GET request to /pns/rw-pendidikan/{nipBaru} endpoint';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $start = now();
        $nipBaru = $this->argument('nipBaru');
        $paths = [
            'nipBaru' => $nipBaru,
        ];

        $this->info(json_encode(
            Simpeg::getRwPendidikan($paths)->object(),
            JSON_PRETTY_PRINT
        ));

        $this->newLine();
        $this->comment("Processed in {$start->shortAbsoluteDiffForHumans(now(), 1)}");

        return self::SUCCESS;
    }
}
