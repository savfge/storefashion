
    <label for="">{{__('Sub Category Name')}}</label>
    <select name="subcategory_id" class="form-control" id="subcategory_id">
        @foreach ($categorys as $category)
            <option value="{{$category->id}}">{{$category->en_name}}</option>
        @endforeach
    </select>