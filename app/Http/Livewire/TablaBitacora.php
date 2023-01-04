<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Bitacora;
use Livewire\WithPagination;

class TablaBitacora extends Component
{   use WithPagination;
    protected $paginationTheme = 'bootstrap';
   public $buscar;
    public function render()
    {   $buscar='%'.$this->buscar.'%';
        $bitacora=Bitacora::
        where('tabla','LIKE','%'.$buscar.'%')->
       orWhere('transaccion','LIKE','%'.$buscar.'%')->paginate(10);


        return view('livewire.tabla-bitacora',[
            'data'=>$bitacora
        ]);
    }
}
