<?php

namespace App\Console\Commands;

use App\Mail\CierrePostulacion;
use App\Models\Postulacion;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $postulaciones = Postulacion::get();
        foreach($postulaciones as $p){
            if((Carbon::parse($p->vacante->fechaLimite)->diffInDays(Carbon::now()) == 0) && isset($p->usuario->user)){ //Or however your date field on user is called
                Mail::to($p->usuario->user->email)->send(new CierrePostulacion($p));
            }
        }
    }
}
