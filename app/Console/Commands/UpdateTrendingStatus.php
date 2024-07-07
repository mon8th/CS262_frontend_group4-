<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Product;

class UpdateTrendingStatus extends Command
{
    protected $signature = 'update:trending';
    protected $description = 'Update trending status of events';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Example criteria: Events with more than 100 views in the last 7 days are trending
        $trendingProducts = Product::where('views', '>', 100)->get();

        foreach ($trendingProducts as $product) {
            $product->trending = true;
            $product->save();
        }

        // Reset the trending status for all other products
        Product::where('views', '<=', 100)->update(['trending' => false]);

        $this->info('Trending status updated successfully.');
    }
}
