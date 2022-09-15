@extends('layouts.app')

@section('conteudo')
    <div class="container">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            @foreach ($regions as $region)
            @foreach ($region->states as $states)
            <li class="nav-item" role="presentation">
              <button class="nav-link" id="{{$states->name}}-tab" data-bs-toggle="tab" data-bs-target="#{{$states->name}}" type="button" role="tab" aria-controls="{{$states->name}}" aria-selected="true">{{$states->name}}</button>
            </li>
            @endforeach
            @endforeach
          </ul>
          <div class="tab-content" id="myTabContent">
            @foreach ($regions as $region)
            @foreach ($region->statess as $states)
                <div class="tab-pane fade" id="{{$states->name}}" role="tabpanel" aria-labelledby="{{$states->name}}-tab">


                                {{$statess->name}}</div>


                </div>
                @endforeach
            @endforeach
          </div>
    </div>
@endsection




