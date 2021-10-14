@extends('layouts.master')

@section('title')
  Editing {{ $product->manufacturer->name }} {{$product->name}}
@endsection


@section('content')
    <div class="mt-4 mb-2"><a href='{{ url("product/$product->id/1") }}'><i class="bi bi-arrow-left"></i></a></div>
    <div class="mb-4 ml-4 product-title">Editing {{ $product->manufacturer->name }} {{ $product->name }}</div>
    <div class="ml-3 mr-4">
        <form method="POST" action='{{ url("product/$product->id") }}' enctype="multipart/form-data">
            {{ csrf_field() }}
            {{ method_field('PUT') }}
            @if(count($errors) > 0)
                <p><label>Name: </label><input type="text" name="name" value="{{ old('name') }}"><span class="alert"> {{ $errors->first('name') }}</span></p>
                <p><label>Price: </label><input type="text" name="price" value="{{ old('price') }}"><span class="alert"> {{ $errors->first('price') }}</span></p>
                <p><label>Video RAM: </label><input type="text" name="vram" value="{{ old('vram') }}"><span class="alert"> {{ $errors->first('vram') }}</span></p>
                <p><label>Chipset: </label><select name="chipset" value="{{ old('chipset')}}"><span class="alert"> {{ $errors->first('chipset') }}</span></p>
                    <option value="NVIDIA" selected="selected">NVIDIA</option>
                    <option value="AMD">AMD</option>
                </select></p>
                <p><label>Manufacturer: </label><select name="manufacturer"><span class="alert"> {{ $errors->first('manufacturer') }}</span></p>
                    @foreach($manufacturers as $manufacturer)
                        @if($manufacturer->id == old('manufacturer'))
                            <option value="{{ $manufacturer->id }}" selected="selected">{{ $manufacturer->name }}</option>
                        @else
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endif
                    @endforeach
                </select></p>
                <p><label>URL: </label><input type="text" name="url" value="{{ old('url') }}"><span class="alert"> {{ $errors->first('url') }}</span></p>
                <p><label>Description: </label><textarea type="text" name="description" value="">{{ old('description') }}</textarea><span class="alert"> {{ $errors->first('description') }}</span></p>
                <p><label>Image: </label><input type="file" name="image" value="{{ old('image') }}"></p>
                <input class="btn btn-dark mt-4 mb-4" type="submit" value="Update">
            @else
                <p><label>Name: </label><input type="text" name="name" value="{{ $product->name }}"></p>
                <p><label>Price: </label><input type="text" name="price" value="{{ $product->price }}"></p>
                <p><label>Video RAM: </label><input type="text" name="vram" value="{{ $product->vram }}"></p>
                <p><label>Chipset: </label><select name="chipset" value="{{ $product->chipset }}">
                    <option value="NVIDIA" selected="selected">NVIDIA</option>
                    <option value="AMD">AMD</option>
                </select></p>
                <p><label>Manufacturer: </label><select name="manufacturer">
                    @foreach($manufacturers as $manufacturer)
                        @if($manufacturer->id == $product->manufacturer_id)
                            <option value="{{ $manufacturer->id }}" selected="selected">{{ $manufacturer->name }}</option>
                        @else
                            <option value="{{ $manufacturer->id }}">{{ $manufacturer->name }}</option>
                        @endif
                    @endforeach
                </select></p>
                <p><label>URL: </label><input type="text" name="url" value="{{ $product->url }}"></p>
                <p><label>Description: </label></p>
                <textarea type="text" name="description" value="{{ old('description') }}" id="styled" onfocus="this.value=''; setbg('#e5fff3');" onblur="setbg('white')">{{ $product->description }}</textarea>
                <p><label>Image: </label></p>
                <p><input type="file" name="image" value="{{ old('image') }}"></p>
                <input class="btn btn-dark mt-4 mb-4" type="submit" value="Update">
            @endif
        </form>
    </div>
@endsection