    <form class="form" id="filter">
        
        <div class="field" id="products">
            <label class="label">Виды продукции</label>
            <div class="field-wrapper-small">
                @foreach($products as $product) 
                    <label class="checkbox"><input type="checkbox" id="{{$product['value']}}">{{$product['value']}}</label>
                @endforeach
            </div>
            <div class="field-view-more is-size-7 has-text-info">Показать еще</div>
        </div>
        
        <div class="field" id="materials">
            <label class="label">Виды материалов</label>
            <div class="field-wrapper-small">
                @foreach($materials as $material)
                    <label class="checkbox"><input type="checkbox" id="{{$material['value']}}">{{$material['value']}}</label>
                @endforeach
            </div>
            <div class="field-view-more is-size-7 has-text-info">Показать еще</div>
        </div>

        <div class="field" id="machines">
            <label class="label">Оборудование</label>
            <div class="field-wrapper">
                @foreach($machines as $machine)
                    <label class="checkbox"><input type="checkbox" id="{{$machine['value']}}">{{$machine['value']}}</label>
                @endforeach
            </div>
        </div>

        <div class="field" id="size-width">
            <label class="label">Размеры изделия</label>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label has-text-weight-normal">Длина</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <p class="control">
                        <input class="input is-small" type="number" id="sizeLength">
                    </p>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label has-text-weight-normal">Ширина</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <p class="control">
                        <input class="input is-small" type="number" id="sizeWidth">
                    </p>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label has-text-weight-normal">Высота</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <p class="control">
                        <input class="input is-small" type="number" id="sizeHeight">
                    </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="field" id="size-knife">
            <label class="label">Размеры по ножам</label>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label has-text-weight-normal">Длина</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <p class="control">
                        <input class="input  is-small" type="number" id="knifeSizeLength">
                    </p>
                    </div>
                </div>
            </div>
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label has-text-weight-normal">Высота</label>
                </div>
                <div class="field-body">
                    <div class="field">
                    <p class="control">
                        <input class="input  is-small" type="number" id="knifeSizeWidth">
                    </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="field" id="year">
            <label class="label">Год</label>
            <div class="field-wrapper-small">
                @for ($i=date('Y'); $i>2012; $i--)
                    <label class="checkbox"><input type="checkbox" id="{{$i}}">{{$i}}</label>
                @endfor
            </div>
            <div class="field-view-more is-size-7 has-text-info">Показать еще</div>
        </div>

        <div class="field" >
            <label class="label">Номер заказа</label>
            <input type="text" class="input is-small" id="orderNum">
        </div>

    </form>
<script src="/resources/js/filter.js"></script>