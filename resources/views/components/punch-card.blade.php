<div class="media box">
    <figure class="media-left">
        <div class="image is-128x128" id="pic">
            @foreach($pics as $key=>$pic)
                <img class="card-image @if($key>0) {{'is-hidden'}} @endif" src="{{ $pic['value'] }}">
            @endforeach
        </div>
    </figure>
    <div class="media-content">
        <div class="content">
            <div class="has-text-weight-bold is-size-5">{{$name}}</div>
            <div>{{ $products }}</div>
            <div class="columns">
                <div class="column">
                    <span class="has-text-weight-bold">Заказ № {{$orderNum}}<?php if ($year) echo "/{$year}";?></span>
                    <br> Материал: {{ $materials }}
                    <br> Машина: {{ $machines }}
                </div>
                <div class="column">
                    <span class="has-text-weight-bold">Размеры изделия</span>
                    <br>Длина, мм: {{$sizeLength}}
                    <br>Ширина, мм: {{$sizeWidth}}
                    @if ($sizeHeight)
                        <br>Высота, мм: {{$sizeHeight}}
                    @endif
                </div>
                <div class="column">
                    <span class="has-text-weight-bold">Размер по ножам</span>
                    <br>Длина, мм: {{$knifeSizeLength}}
                    <br>Ширина, мм: {{$knifeSizeWidth}}
                </div>
            </div>                        
        </div>
    </div>
    <div class="media-right">
        @if($isAdmin)
            <button class="button is-small">Редактировать</button>
        @endIf
    </div>
</div>
