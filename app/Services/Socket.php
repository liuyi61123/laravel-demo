<?php
namespace App\Services;

use Workerman\Worker;
use PHPSocketIO\SocketIO;

class Socket{
    protected $io;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
         $this->io = new SocketIO(2021);
    }

    public function emits()
    {
        $io = $this->io;
        $io->on('connection', function($socket)use($io){
            $socket->on('chat message', function($msg)use($io,$socket){
                //处理msg
                $return = $msg.strlen($msg);
                $socket->emit('chat message', $return);
            });
        });

        Worker::runAll();
    }
}
