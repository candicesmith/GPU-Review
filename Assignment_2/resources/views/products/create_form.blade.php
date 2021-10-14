@extends('layouts.master')

@section('title')
  Create Product
@endsection


@section('content')
    <div class="mt-4 mb-4"><a href='{{ url("product") }}'><i class="bi bi-arrow-left"></i></a></div>    
    <div class="product-title mb-4 ml-4">Create a Graphics Card</div>
    <div class="ml-3 mr-4">
        @if(count($errors) > 0)
            <div class="alert">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action='{{ url("product") }}' enctype="multipart/form-data">
            {{ csrf_field() }}
            <p><label>Name: </label><input type="text" name="name" value="{{ old('name') }}"></p>
            <p><label>Price: </label><input type="text" name="price" value="{{ old('price') }}"></p>
            <p><label>Video RAM: </label><input type="text" name="vram" value="{{ old('vram') }}"></p>
            <p><label>Chipset: </label></p>
            <select name="chipset" value="{{ old('chipset')}}">
                <option value="NVIDIA" selected="selected">NVIDIA</option>
                <option value="AMD">AMD</option>
            </select>
            <p><label>Manufacturer: </label></p>
            <select name="manufacturer">
                @foreach($manufacturers as $manufacturer)
                    @if($manufacturer->id == old('manufacturer'))
                        <option value="{{ $manufacturer->id }}" selected="selected">{{ $manufacturer->name }}</option>
                    @else
                        <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                    @endif
                @endforeach
            </select>
            <p><label>URL: </label><input type="text" name="url" value="{{ old('url') }}"></p>
            <p><label>Description: </label></p>
            <textarea type="text" name="description" value="{{ old('description') }}" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">{{ old('description') }}</textarea>
            <p><label>Image: </label></p>
            <p><input type="file" name="image" value="{{ old('image') }}"></p>
            <input class="btn btn-dark mt-4 mb-4" type="submit" value="Create">
        </form>
    </div>
@endsection