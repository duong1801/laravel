@extends('layouts.client')
@php
    $title = 'Trang chủ';
@endphp
@section('title',$title)

@section('content')

    <div class="container mt-4">
        @error('msg')
        <x-alert type="danger" :message="$message"/>
        @enderror
        <form action="{{route('product.add')}}" method="post">
            @csrf
            <x-forms.input field="name">Tên sản phẩm</x-forms.input>

            <x-forms.input field="description">Mô tả sản phẩm</x-forms.input>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
@section('js')
    <script>
        console.log('123');
    </script>
@endsection
@push('script')
    <script>
        console.log('dsdsds');
    </script>
@endpush
