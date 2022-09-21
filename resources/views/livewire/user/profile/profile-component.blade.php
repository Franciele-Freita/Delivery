<div>
    <h4 class="text-Dark mb-1 fw-bold py-3">Minha conta</h4>

    <div class="row">
        <div style="width: 300px">
            <div class="anchor-pointer bg-white p-3 rounded mb-1 shadow">
                <b>Olá, aqui é sua conta ;)</b>
            </div>
            <div class="anchor-pointer p-3 rounded mb-1 shadow fw-bold @if ($tab == 'purchases') text-AzulPiscina h-tab @else text-CinzaClaro bg-white @endif " wire:click="tab('purchases')">
                    Pedidos
            </div>
            <div class="anchor-pointer p-3 rounded mb-1 shadow fw-bold @if ($tab == 'favorite') text-AzulPiscina h-tab @else text-CinzaClaro bg-white @endif " wire:click="tab('favorite')">
                    Favoritos
            </div>
            <div class="anchor-pointer p-3 rounded mb-1 shadow fw-bold @if ($tab == 'coupons') text-AzulPiscina h-tab @else text-CinzaClaro bg-white @endif " wire:click="tab('coupons')">
                    Cupons
            </div>
            <div class="anchor-pointer p-3 rounded mb-1 shadow fw-bold @if ($tab == 'registration') text-AzulPiscina h-tab @else text-CinzaClaro bg-white @endif " wire:click="tab('registration')">
                    Cadastro
            </div>
            <div class="anchor-pointer p-3 rounded mb-1 shadow fw-bold @if ($tab == 'address') text-AzulPiscina h-tab @else text-CinzaClaro bg-white @endif " wire:click="tab('address')">
                    Endereços
            </div>
            <div class="anchor-pointer p-3 rounded mb-1 shadow fw-bold @if ($tab == 'fac') text-AzulPiscina h-tab @else text-CinzaClaro bg-white @endif " wire:click="tab('fac')">
                Perguntas Frequentes
            </div>
            <div class="anchor-pointer p-3 rounded mb-1 shadow fw-bold @if ($tab == 'help') text-AzulPiscina h-tab @else text-CinzaClaro bg-white @endif " wire:click="tab('help')">
                Ajuda
            </div>
        </div>
        <div class="tab-content col" id="myTabContent">
            <div class="tab-pane fade @if ($tab == 'purchases') show active @endif bg-white p-3 rounded mb-1 shadow" id="purchases" role="tabpanel" aria-labelledby="purchases-tab">
                @livewire('user.profile.purchase-component')
            </div>
            <div class="tab-pane fade @if ($tab == 'favorite') show active @endif bg-white p-3 rounded mb-1 shadow" id="favorite" role="tabpanel" aria-labelledby="favorite-tab">
                @livewire('user.profile.favorite-component')
            </div>
            <div class="tab-pane fade @if ($tab == 'coupons') show active @endif bg-white p-3 rounded mb-1 shadow" id="coupons" role="tabpanel" aria-labelledby="coupons-tab">
                @livewire('user.profile.coupom-component')
            </div>
            <div class="tab-pane fade @if ($tab == 'registration') show active @endif bg-white p-3 rounded mb-1 shadow" id="registration" role="tabpanel" aria-labelledby="registration-tab">
                @livewire('user.profile.registration-component')
            </div>
            <div class="tab-pane fade @if ($tab == 'address') show active @endif bg-white p-3 rounded mb-1 shadow" id="address" role="tabpanel" aria-labelledby="address-tab">
                @livewire('user.profile.address-component')
            </div>
            <div class="tab-pane fade @if ($tab == 'fac') show active @endif bg-white p-3 rounded mb-1 shadow text-CinzaMedio" id="fac" role="tabpanel" aria-labelledby="fac-tab">
                @livewire('user.profile.faq-component')
            </div>
            <div class="tab-pane fade @if ($tab == 'help') show active @endif bg-white p-3 rounded mb-1 shadow text-CinzaMedio" id="help" role="tabpanel" aria-labelledby="help-tab">
                {{-- @livewire('user.profile.faq-component') --}}
            </div>
        </div>
    </div>
</div>
