<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <label> Только доступные
        <input type="checkbox" value="?availableOnly" id="availableOnly" @checked((\request()->has('availableOnly')))>
    </label>
    <table style="width: 50%">
        <thead>
            <tr>
                <th style="padding-left: 20px">Артикул</th>
                <th>Название</th>
                <th>Статус</th>
                <th>Атрибуты</th>
                <th>Действие</th>
            </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr class="border-b border-[#C4C4C4] bg-white h-16">
                <td style="padding-left: 20px">{{$product->article}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->getAvailable()}}</td>
                <td>{!! $product->getAttrDescr() !!}</td>
                <td>
                    <a href="#" @click="p_name = '{{$product->name}}'; p_article = '{{$product->article}}';  p_available = '{{$product->status}}'; p_data={{$product->data}}; openEditModal = true;openCreateModal = false; p_id={{$product->id}}">
                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path opacity="0.15" d="M4 20H8L18 10L14 6L4 16V20Z" fill="#000000"></path> <path d="M18 10L21 7L17 3L14 6M18 10L8 20H4V16L14 6M18 10L14 6" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </a>
                    <a href="{{route('product.destroy',['id'=>$product->id])}}">
                        <svg width="16px" height="16px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M10 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M14 11V17" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M4 7H20" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M6 7H12H18V18C18 19.6569 16.6569 21 15 21H9C7.34315 21 6 19.6569 6 18V7Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M9 5C9 3.89543 9.89543 3 11 3H13C14.1046 3 15 3.89543 15 5V7H9V5Z" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
        <button @click="openCreateModal =! openCreateModal; openEditModal = false" class="btn" type="button">
            Добавить
        </button>
    @include('product.create')
    @include('product.edit')
    @if(session('success'))
        <script>
            $(function(){
                $.notify("{{session('message')}}","success")

            })
        </script>
    @endif
</x-app-layout>
