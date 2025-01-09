<?php

namespace App\Filament\Widgets;

use App\Models\Transaction;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $pemasukan  = Transaction::incomes()->get()->sum('amount');
        $pengeluaran = Transaction::expenses()->get()->sum('amount');
        $selisih = $pemasukan - $pengeluaran;
        
        return [
            Stat::make('Total Pemasukan', $pemasukan),
            Stat::make('Total Pengeluaran', $pengeluaran),
            Stat::make('Selisih', $selisih),
        ];
    }
}
