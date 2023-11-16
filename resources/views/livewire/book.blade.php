<div class="page-content-wrapper" x-data="
{ createForm: false , showTable:true ,
  bookName: '' , }
">
    <x-slot name="title">
        LMS - Books
    </x-slot>
    
    <div class="page-content">
        <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Books</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
              <li class="breadcrumb-item"><a href="javascript:;">
                  <ion-icon name="book-outline"></ion-icon>
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
          <div class="d-flex align-items-center">
            <form class="me-auto position-relative">
              <div class="position-absolute top-50 translate-middle-y search-icon px-3"><ion-icon name="search-sharp" role="img" class="md hydrated" aria-label="search sharp"></ion-icon></div>
              <input class="form-control ps-5" wire:model.live="search" type="text" placeholder="search">
            </form>
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button" x-on:click="createForm = true , showTable = false" class="btn btn-dark" >Add Book</button>
              </div>
            </div>
        </div>

        <div class="card mt-3">
          <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0">Book Details</h5>
            </div>
            <div class="table-responsive mt-3">
              <table class="table align-middle">
                <thead class="table-secondary">
                  <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Atuhor</th>
                    <th>Publisher</th>
                    <th>Category</th>
                    <th>Created At</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($books as $book)
                  <tr>
                    <td>BO-{{str_pad($book->id,6,"0",STR_PAD_LEFT)}}</td>
                    <td>
                      <div class="d-flex align-items-center gap-3 cursor-pointer">
                          <div class="">
                            <p class="mb-0">{{$book->book_name}}</p>
                          </div>
                      </div>
                    </td>
                    <td>{{$book->author->author_name}}</td>
                    <td>{{$book->publisher->publisher_name}}</td>
                    <td>{{$book->category->category_name}}</td>
                    <td>{{$book->created_at}}</td>
                    <td>
                      <div class="table-actions d-flex align-items-center gap-3 fs-6">
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Views" aria-label="Views"><i class="bi bi-eye-fill"></i></a>
                        <a href="javascript:;" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit" aria-label="Edit"><i class="bi bi-pencil-fill"></i></a>
                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                      </div>
                    </td>
                  </tr>
                  @empty
                    <td class="text-center" colspan="7"><h5>No Data Found</h5></td>
                  @endforelse
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    <div x-show="createForm" x-transition.delay.100ms>
        <!--start create form-->
        <div class="row px-4">
          <div class="d-flex align-items-center mb-3">
            
            <div class="ms-auto">
              <div class="btn-group">
                <button type="button"  x-on:click="createForm = false , showTable = true" class="btn btn-dark" >Go Back</button>
              </div>
            </div>
        </div>
          <div class="col-xl-12  mx-auto">
            <div class="card">
              <div class="card-header px-4 py-3">
                <h5 class="mb-0 text-center">Add Book</h5>
              </div>
              
              <div class="card-body p-4" >
                <form class="row g-3 needs-validation" @submit.prevent="
                createForm = false ;
                showTable = true ;
                bookName = '';
                "  wire:submit.prevent="store"  >
                  <div class="col-12">
                    <label for="bsValidation1" class="form-label">Book Name</label>
                    <input type="text" wire:model.lazy="book_name" x-model="bookName" class="form-control" id="bsValidation1" placeholder="Book Name" required>
                    
                  </div>

                  <div class="col-12" wire:ignore >
                      <label  class="form-label">Category</label>
                      <select     class="form-select single-select-field" id="category_id"  data-placeholder="Choose Category" required  >
                        <option value="" selected>Choose Category</option>
                        @foreach ($categories as $category)
                          <option value="{{$category->id}}">{{$category->category_name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-12"wire:ignore >
                      <label  class="form-label">Publisher</label>
                      <select   id="publisher_id"  class="form-select single-select-field"  data-placeholder="Choose Publisher" required  >
                        <option value="" selected></option>
                        @foreach ($publishers as $publisher)
                        <option value="{{$publisher->id}}">{{$publisher->publisher_name}}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="col-12" wire:ignore>
                      <label  class="form-label">Author</label>
                      <select  id="author_id" class="form-select single-select-field"data-placeholder="Choose Author" required >
                        <option value="" selected></option>
                        @foreach ($authors as $author)
                        <option value="{{$author->id}}">{{$author->author_name}}</option>
                        @endforeach
                      </select>
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
 
    </div>


    <script>
      document.addEventListener('livewire:navigated', () => { 
        $( '.single-select-field' ).select2( {
          theme: "bootstrap-5",
          width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
          placeholder: $( this ).data( 'placeholder' ),width: 'resolve'
          } );
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
        })()
      $(document).ready(function () {
          $('#category_id').on('change', function (e) {
              var data = $('#category_id').select2("val");
              console.log(data);
              @this.set('category_id', data);
          });
      });
      $(document).ready(function () {
          $('#publisher_id').on('change', function (e) {
              var data = $('#publisher_id').select2("val");
              @this.set('publisher_id', data);
          });
      });
      $(document).ready(function () {
          $('#author_id').on('change', function (e) {
              var data = $('#author_id').select2("val");
              @this.set('author_id', data);
          });
      });
})
    </script>
</div>
