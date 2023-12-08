<div class="sm:container px-3 py-7 containerModal" id="createModal" x-show="openCreateModal"  x-transition:enter="transition ease-out duration-300"
     x-transition:enter-start="opacity-0 scale-90"
     x-transition:enter-end="opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-300"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-90">
    <div class="flex justify-between">
        <h1 class="text-white font-bold">Добавить продукт</h1>
        <a href="#" @click=" openCreateModal = false">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                <path d="M22.5 7.5L7.5 22.5" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M7.5 7.5L22.5 22.5" stroke="#C4C4C4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg>
        </a>
    </div>
    <form action="{{route('product.store')}}" method="post" class="w-3/4" id="formCreate">
        @csrf
        <div class="form-group">
            <label for="article">Артикул</label>
            <input type="text" name="article" id="article" required>
        </div>
        <div class="form-group">
            <label for="name">Название</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="status">Статус</label>
            <select id="status" class="text-black py-0" name="status">
                <option value="available" checked>Доступен</option>
                <option value="unavailable">Недоступен</option>
            </select>
        </div>
        <h2>Атрибуты</h2>
        <a href="#" class="addAttr">+ Добавить атрибут</a>
        <div class="attributes">
            <x-product.attributes-row></x-product.attributes-row>
        </div>
        <div>
            <button class="btn btn-submit" id="submit" >
                Добавить
            </button>
        </div>
    </form>
</div>
