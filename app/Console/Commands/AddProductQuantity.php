<?php

namespace App\Console\Commands;

use App\Models\Product;
use Illuminate\Console\Command;

class AddProductQuantity extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'product:quantity';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add product quantity in exist product table';

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
        $quantity = $this->ask('Add product quantity:');

        Product::query()->update(['quantity' => $quantity]);

        $this->info('Product Quantity Updated!');


    }
}
