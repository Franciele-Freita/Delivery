<div>
    <form class="mb-3" wire:submit.prevent="savePayment">
        <input wire:model="image" type="file" name="" id=""><br>
        <input wire:model="name" type="text"><br>
        <button type="submit">Salvar</button>
    </form>

        <div class="mb-3">
            @foreach ($payments as $payment)
            <div class="anchor-pointer p-3 rounded border mb-1 bg-white">
                <img  src="{{ asset('storage/'.$payment->image) }}" alt="" style="width: 30px;"> {{$payment->name}}
            </div>
            @endforeach
        </div>
</div>
