
<style>
    .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: var(--bs-nav-tabs-link-active-color);
    background-color: transparent;
    font-weight: 700;
    border-color: transparent;
}
    .nav-tabs .nav-link:focus, .nav-tabs .nav-link:hover {
        isolation: isolate;
        border-color: transparent;
    }


</style>
<nav>
    <div class="nav nav-tabs bg-white" id="nav-tab" role="tablist">
      <button class="nav-link text-CinzaMedio @if($tab == 1) active @endif" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Categorias</button>
      <button class="nav-link text-CinzaMedio @if($tab == 2) active @endif" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Cadastro</button>

    </div>
  </nav>

