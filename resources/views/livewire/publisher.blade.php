<div class="page-content-wrapper" x-data="{ createForm: false , showTable:true , publisherName: '' }">
    
  <x-slot name="title">
        LMS - Publishers
    </x-slot>
    <div class="page-content">
        <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Publishers</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
              <li class="breadcrumb-item"><a href="javascript:;">
                  <ion-icon name="people-circle-outline"></ion-icon>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">LMS</li>
            </ol>
          </nav>
        </div>
        
      </div>
      @if (session()->has('success'))
        <div class="alert alert-dismissible fade show py-2 bg-success">
          <div class="d-flex align-items-center">
            <div class="fs-3 text-white"><ion-icon name="checkmark-circle-sharp" role="img" class="md hydrated" aria-label="checkmark circle sharp"></ion-icon>
            </div>
            <div class="ms-3">
              <div class="text-white">{{ session('success') }}</div>
            </div>
          </div>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
      
      <!--end breadcrumb-->
      <div x-show="showTable" x-transition.delay.100ms>

          <div class="d-flex align-items-center" >
            <form class="me-auto position-relative">
              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp" role="img" class="md hydrated" aria-label="search sharp"></ion-icon></div>
              <input class="form-control ps-5" wire:model.live="search" type="text" placeholder="search">
            </form>
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-dark" x-on:click="createForm = true , showTable = false" >Add Publisher</button>
              </div>
            </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Publisher Details</h5>
            </div>
            <div class="table-responsive mt-3">
              <table class="table align-middle">
                <thead class="table-secondary">
                  <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created At</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($publishers as $publisher)
                  <tr>
                    <td>PU-{{str_pad($publisher->id,6,"0",STR_PAD_LEFT)}}</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="">
                            <p class="mb-0">{{$publisher->publisher_name}}</p>
                          </div>
                      </div>
                    </td>
                    <td>{{$publisher->created_at}}</td>
                    <td>
                      <div class="table-actions d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                      </div>
                    </td>
                  </tr>
                  @empty
                    <td class="text-center" colspan="4"><h5>No Data Found</h5></td>
                  @endforelse
                </tbody>
              </table>
            </div>
            {{ $publishers->links() }}
          </div>
        </div>
      </div>
    </div>
      
    <div x-show="createForm" x-transition.delay.100ms>

        <!--start create form-->
        <div class="row px-4" >
          <div class="d-flex align-items-center mb-3">
            
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" class="btn btn-dark"x-on:click="createForm = false , showTable = true  ">Go Back</button>
              </div>
            </div>
        </div>
          <div class="col-xl-12  mx-auto">
            <div class="card">
              <div class="card-header px-4 py-3">
                <h5 class="mb-0 text-center">Add Publisher</h5>
              </div>
              <div class="card-body p-4">
                <form class="row g-3 needs-validation" @submit.prevent="
                createForm = false ;
                showTable = true ;
                publisherName = '';
                "  wire:submit.prevent="store" >
                  <div class="col-12">
                    <label for="bsValidation1" class="form-label">Publisher Name</label>
                    <input type="text" class="form-control" id="bsValidation1" placeholder="Publisher Name" x-model="publisherName" wire:model.lazy="publisher_name" required>
                    
                  </div>
                  <div class="col-md-12 d-flex justify-content-center">
                    <div class="d-md-flex d-grid align-items-center gap-3">
                      <button type="submit" class="btn btn-dark px-4">Submit</button>
                      <button type="reset" class="btn btn-light px-4">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
      </div>
      <!--end Create Form-->

      <script>
        document.addEventListener('livewire:navigated', () => { 
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
            'use strict'
      
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.querySelectorAll('.needs-validation')
      
            // Loop over them and prevent submission
            Array.prototype.slice.call(forms)
            .forEach(function (form) {
              form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }
      
              form.classList.add('was-validated')
              }, false)
            })
          })()})
        
      </script>
    </div>
</div>
