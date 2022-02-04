<div>
    <form wire:submit.prevent="store">
        {{-- @csrf --}}
        <div class="row">
            <div class="col">
                <div class="mb-3">
                    <input wire:model="name" type="text" class="form-control @error('name') ? is-invalid @enderror" placeholder="name" id="name" required>
                    @error('name')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="mb-3">
                    <input wire:model="phone" type="text" class="form-control @error('phone') ? is-invalid @enderror" placeholder="phone" id="phone" required>
                    @error('phone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
        </div>
        <button class="btn btn-sm btn-primary mb-3">Submit</button>
    </form>
</div>
