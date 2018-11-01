<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Workerman\Worker;
use PHPSocketIO\SocketIO;
use App\Services\Socket;

class SocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'socket:start';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    protected $socket;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Socket $socket)
    {
        parent::__construct();
        $this->socket = $socket;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->socket->emits();
    }
}
