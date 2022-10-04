<?php

namespace App\Http\Livewire\Partner\Requests;

use App\Models\Purchase;
use App\Models\PurchaseStatus;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class RequestComponent extends Component
{
    public $new, $now, $purchase_id, $reason, $commit, $created_at_date, $created_at_hour;
    public function render()
    {
        $purchases = Purchase::where('store_id', Auth::guard('partner')->user()->stores->first()->id)->get();
        //dd($purchases->count());
        $this->now = $purchases->count();

        if( $this->now > $this->new){
            $this->dispatchBrowserEvent('play-bip');
            $this->new = $this->now;
        }


        return view('livewire.partner.requests.request-component', ['purchases' => $purchases])->layout('layouts.painel-partner');
    }

    public function showDetails($purchase_id)
    {
        # code...
    }

    public function convertData($purchase_id)
    {
        $selPurchase = Purchase::find($purchase_id);
        $data = $selPurchase->created_at->format('D');
        $mes = $selPurchase->created_at->format('M');
        $dia =$selPurchase->created_at->format('d');
        $ano = $selPurchase->created_at->format('Y');

        $semana = array(
            'Sun' => 'Domingo',
            'Mon' => 'Segunda-Feira',
            'Tue' => 'Terca-Feira',
            'Wed' => 'Quarta-Feira',
            'Thu' => 'Quinta-Feira',
            'Fri' => 'Sexta-Feira',
                    'Sat' => 'Sábado'
        );

        $mes_extenso = array(
            'Jan' => 'Janeiro',
            'Feb' => 'Fevereiro',
            'Mar' => 'Marco',
            'Apr' => 'Abril',
            'May' => 'Maio',
            'Jun' => 'Junho',
            'Jul' => 'Julho',
            'Aug' => 'Agosto',
            'Nov' => 'Novembro',
            'Sep' => 'Setembro',
            'Oct' => 'Outubro',
            'Dec' => 'Dezembro'
        );
        return $data= $semana["$data"] . ", {$dia} de " . $mes_extenso["$mes"];

    }
    public function selectPurchase($purchase_id)
    {
        $selPurchase = Purchase::find($purchase_id);
        $data = $this->convertData($purchase_id);
        $this->purchase_id = $selPurchase->purchase_id;
        $this->created_at_date = $data;
        $this->created_at_hour = $selPurchase->created_at->format('h:i');

    }

    public function cancelPurchase()
    {
        PurchaseStatus::where('id',$this->selPurchase)->update([
            'status_id' => 5,
            'reason' => $this->reason,
            'commit' => $this->commit,
        ]);
    }

    public function resetModal()
    {
        # code...
    }

}
