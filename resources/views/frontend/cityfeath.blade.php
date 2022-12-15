<select name="city_id" id="city_id" class="form-control">
    @foreach ($countrys as $city)
        <option value="{{$city->id}}">{{$city->name}}</option>
    @endforeach
</select>