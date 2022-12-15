    <select name="state_id" id="state_idd"z class="form-control">
        @foreach ($countrys as $state)
            <option value="{{$state->id}}">{{$state->name}}</option>
        @endforeach
    </select>