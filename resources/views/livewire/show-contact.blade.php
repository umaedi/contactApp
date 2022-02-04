<div>
  @if (session()->has('msg'))
  <div class="alert alert-success">
      {{ session('msg') }}
  </div>
  @endif

    @if (session('statusUpdate'))
        <livewire:contact-update>
    @else
        <livewire:contact-create>    
    @endif
      <div class="row">
        <div class="col-2">
          <select wire:model="paginate" class="form-select form-select-sm">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="15">15</option>
          </select>
        </div>
        <div class="col">
          <div class="mb-3">
            <input wire:model="search" type="search" type="text" class="form-control form-select-sm" placeholder="search here...">
          </div>
        </div>
      </div>
    <table class="table">
        <thead class="table-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Phone</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php  $i = 1 + (5 * ($contacts->currentPage() - 1)) ?>
            @foreach ($contacts as $contact)
            <tr>
                <th scope="row">{{ $i ++ }}</th>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->phone }}</td>
                <td>
                    <button wire:click="getContact({{ $contact->id }})" class="btn btn-sm btn-warning">Edit</button>
                    <button wire:click="destory({{ $contact->id }})" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
                </td>
              </tr>
            @endforeach
        </tbody>
      </table>
      {{ $contacts->links() }}
</div>
