<?php

namespace App\Console\Commands;
use Ratchet\Server\IoServer;
use Ratchet\Http\HttpServer;
use Ratchet\WebSocket\WsServer;
use Illuminate\Console\Command;
use App\Http\Controllers\WebSocketController;
class WebSocketServer extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'websocket:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initializing Websocket server to receive and manage connections';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
       
        $server = IoServer::factory(
            new HttpServer(
                new WsServer(
                    new WebSocketController()
                )
            ),
            8080 
       );  echo "STarted Server At Port 8090";
       $server->run();
     
    }
}
