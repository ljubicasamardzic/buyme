<tbody class="align-middle">
    @foreach($products as $product)
        <tr>
            <td class="align-middle"><img src="{{ $product->path }}" alt="" style="width: 50px;">{{ $product->name }}</td>
            <td class="align-middle">{{ $product->price(2) }}€</td>
            <td class="align-middle">{{ $product->tax(2) }}€</td>
            <td class="align-middle">
                <div class="input-group quantity mx-auto" style="width: 100px;">
                    <div class="input-group-btn">
                        <form wire:submit.prevent="reduceQuantity('{{ $product->rowId }}')">
                            <button class="btn btn-sm btn-primary btn-minus">
                                <i class="fa fa-minus"></i>
                            </button>
                        </form>
                    </div>
                    <input type="text" class="form-control form-control-sm bg-secondary text-center" value="{{ $product->qty }}">
                    <div class="input-group-btn">
                        <form wire:submit.prevent="increaseQuantity('{{ $product->rowId }}')">
                            <button class="btn btn-sm btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </td>
            <td class="align-middle">{{ $product->total }}€</td>
            <td class="align-middle">
                <button class="btn btn-sm btn-primary btn-remove" id="{{ $product->rowId }}">
                    <i class="fa fa-times"></i>
                </button>
            </td>
        </tr>
    @endforeach
</tbody>

@push('scripts')
    <script>
        let removeButtons = document.getElementsByClassName('btn-remove');

        for (let button of removeButtons) {
            button.addEventListener('click', function() {
                this.disabled = true;
                @this.call('removeItem', this.id);
            })
        };
    </script>
@endpush

