<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;  /* 2 */

class ChartComponent extends Component
{
   public function render()
    {
        $columnChartModel = (new ColumnChartModel())
        ->setTitle('My Chart')
        ->addColumn('Jan',100,'#f6ad55')
        ->addColumn('Jul',500,'#fc8181')
        ->addColumn('Ago',300,'#90cdf4');

        return view('livewire.search-components.chart-component',[
            'columnChartModel' => $columnChartModel
        ]);
    }
}