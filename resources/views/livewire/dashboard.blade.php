<div class="page-content-wrapper">
    <x-slot name="title">
      LMS - Dashboard
    </x-slot>
    <!-- start page content-->
    <div class="page-content">

      <!--start breadcrumb-->
      <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Dashboard</div>
        <div class="ps-3">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0 align-items-center">
              <li class="breadcrumb-item"><a href="javascript:;">
                  <ion-icon name="home-outline"></ion-icon>
                </a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">LMS</li>
            </ol>
          </nav>
        </div>
      </div>
      <!--end breadcrumb-->


      <div class="row row-cols-2 row-cols-lg-4 row-cols-xxl-4">
        <div class="col">
            <div class="card radius-10 bg-primary">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1 text-white">Total Categories</p>
                    <h4 class="mb-0 text-white">{{$totalCategories}}</h4>
                  </div>
                  <div class="ms-auto text-white fs-2">
                    <ion-icon name="list" role="img" class="md hydrated" aria-label="accessibility sharp"></ion-icon>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-danger">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1 text-white">Total Authors</p>
                    <h4 class="mb-0 text-white">{{$totalAuthors}}</h4>
                  </div>
                  <div class="ms-auto text-white fs-2">
                    <ion-icon name="pencil" role="img" class="md hydrated" aria-label="leaf sharp"></ion-icon>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-success">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1 text-white">Total Publishers</p>
                    <h4 class="mb-0 text-white">{{$totalPublishers}}</h4>
                  </div>
                  <div class="ms-auto text-white fs-2">
                    <ion-icon name="people-circle" role="img" class="md hydrated" aria-label="shield checkmark sharp"></ion-icon>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <div class="col">
            <div class="card radius-10 bg-dark">
              <div class="card-body">
                <div class="d-flex align-items-center">
                  <div class="">
                    <p class="mb-1 text-white">Total Books</p>
                    <h4 class="mb-0 text-white">{{$totalBooks}}</h4>
                  </div>
                  <div class="ms-auto text-white fs-2">
                    <ion-icon name="book" role="img" class="md hydrated" aria-label="trophy sharp"></ion-icon>
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
      <!--end row-->
      <div class="card radius-10 w-100">
        <div class="card-body">
          <div class="d-flex align-items-center">
            <h6 class="mb-0">Recent Books</h6>
          </div>
          <div class="table-responsive mt-2">
            <table class="table align-middle mb-0">
              <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Atuhor</th>
                    <th>Publisher</th>
                    <th>Category</th>
                    <th>Created At</th>
                </tr>
              </thead>
              <tbody >
                @forelse ($recentBooks as $book)
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
                  </tr>
                  @empty
                    <td class="text-center" colspan="6"><h5>No Data Found</h5></td>
                  @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- end page content-->
  </div>