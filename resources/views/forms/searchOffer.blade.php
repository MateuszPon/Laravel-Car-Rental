<form method="get" action="{{route('searchFindCar')}}">
    <div class="form-group">
        <label>{{__('dictionary.Brand')}}</label>
        <select class="select2 form-control" id="brandCar" name="brandCar"></select>
    </div>
    <div class="form-group">
        <label>{{__('dictionary.Model')}}</label>
        <select class="select2 form-control" id="modelCar" name="modelCar"></select>
    </div>
    <div class="form-group">
        <label>{{__('dictionary.Equipments')}}</label>
        <select multiple class="select2 form-control" name="equipment" id="equipments">
            @foreach($equipments as $equipment)
                <option value="{{$equipment}}">{{$equipment}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>{{__('dictionary.PriceMin')}}</label>
        <input type="number" class="form-control" min="0.01" step="0.01" name="priceMin">
    </div>
    <div class="form-group">
        <label>{{__('dictionary.PriceMax')}}</label>
        <input type="number" class="form-control" min="0.01" step="0.01" name="priceMax">
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">{{__('dictionary.Search')}}</button>
    </div>


</form>
