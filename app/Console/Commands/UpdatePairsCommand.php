<?php

namespace App\Console\Commands;

use App\Jobs\UpdatePairJob;
use ccxt\pro\binance;
use Illuminate\Console\Command;

use function React\Async\await;

class UpdatePairsCommand extends Command
{
    protected $signature = 'pairs:update';

    protected $description = 'Update trading pairs information';

    public function handle()
    {
        $this->info('Trading pairs have been updated successfully.');

        $binance = new binance;

        $pairs = [
            'BTC/USDT',
            'ETH/USDT',
            'BNB/USDT',
            'XRP/USDT',
            'ADA/USDT',
            'SOL/USDT',
            'DOGE/USDT',
            'DOT/USDT',
            'USDC/USDT',
            'LTC/USDT',
        ];

        while(true) {
            $response = await($binance->watch_tickers($pairs));

            foreach($response as $data) {
                $this->info(json_encode($data));
                dispatch(new UpdatePairJob($data));
            }
        }
    }
}
