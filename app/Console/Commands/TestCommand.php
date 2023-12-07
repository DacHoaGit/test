<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */


    public function quickSort($arr)
    {
        if (count($arr) < 2) {
            return $arr;
        }
    
        $left = $right = array();
    
        reset($arr);
        $pivot_key = key($arr);
        $pivot = array_shift($arr);
    
        foreach ($arr as $k => $v) {
            if ($v < $pivot)
                $left[$k] = $v;
            else
                $right[$k] = $v;
        }
    
        return array_merge($this->quickSort($left), array($pivot_key => $pivot), $this->quickSort($right));
    }

    public function handle()
    {
        //
        $my_array = array(3,3, 0, 2, 5, -1, 4, 1);
        dd($this->quickSort($my_array));
    }
}
