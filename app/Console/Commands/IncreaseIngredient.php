<?php

namespace App\Console\Commands;

use App\Models\Ingredient;
use Illuminate\Console\Command;

class IncreaseIngredient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ingredient:increase';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Increase ingredient';

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
     * @return int
     */
    public function handle()
    {
        Ingredient::query()->where('stock', 0)->increment('stock', 4);
    }
}
