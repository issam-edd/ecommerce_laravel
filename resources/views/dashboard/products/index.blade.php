@extends('layouts.dashboard.app')
@section('content')
<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      @include('layouts.partials.alerts')
      <div class="card-header">
        <h4 class="card-title">List Products</h4>
        <a type="button" href="{{ route('products.create') }}" class="btn btn-gradient-primary"><i data-feather="plus"></i> Add New Product</a>
        
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Image</th>
              <th>Title</th>
              <th>Description</th>
              <th>Price</th>
              <th>Available</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
            @foreach($products as $product)
            <tr>
              <td>
                {{ $product->id }}
              </td>
              <td>
                <div class="avatar-group">
                  <div
                    data-toggle="tooltip"
                    data-popup="tooltip-custom"
                    data-placement="top"
                    title=""
                    class=" pull-up my-0"
                    data-original-title="Alberto Glotzbach"
                  >
                    <img
                      src="{{ asset($product->image) }}"
                      alt="border"
                      height="150"
                      width="150"
                    />
                  </div>
                </div>
              </td>
              <td>{{ $product->title }}<br><hr>Category: <span class="badge badge-pill badge-light-primary mr-1">{{Str::limit($product->category->title,10)}}</span></td>
              <td>{{ Str::limit($product->description,50) }}</td>
              <td>Main <span class="text-primary"> {{ $product->price. ' DH' }}</span><br><hr>Old<span class="text-danger"> {{ $product->old_price.' DH' }}</span></td>
              @if($product->inStock>0)
              <td><span class="badge badge-pill badge-light-success mr-1">InStock : {{$product->inStock}}</span></td>
              @else
              <td><span class="badge badge-pill badge-light-danger mr-1">Out Of Stock : 0</span></td>
              @endif
              <td>
                <div class="dropdown">
                  <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('products.edit',$product->slug) }}">
                      <i data-feather="edit-2" class="mr-50"></i>
                      <span>Edit</span>
                    </a>
                    <a class="dropdown-item" onclick="deleteitem('{{$product->slug}}');">
                      <i data-feather="trash" class="mr-50"></i>
                      <span>Delete</span>
                    </a>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <div class="d-flex justify-content-center pt-3 pb-5">
        {{$products->links()}}
    </div>
    </div>
  </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>

            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <p id="msg"></p>
            <small class="font-weight-bold" style="color:#edb200;">
                <i class="fas fa-exclamation-triangle"></i>
                You can not deny this action !
            </small>
            <div class="modal-footer">
                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="Supprimer" class="btn btn-danger">
                </form>
            </div>
        </div>

    </div>
</div>
</div>
<script>
      function deleteitem(id) {
                $('#deleteModal').modal('toggle');
                $('#deleteForm').attr('action', 'products/' + id);
                $('#msg').text('You really want to delete this Product '+ id +' ?')
            }
</script>
{{-- <section class="app-user-list">
    <!-- users filter start -->
    <div class="card">
      <h5 class="card-header">Search Filter</h5>
      <div class="d-flex justify-content-between align-items-center mx-50 row pt-0 pb-2">
        <div class="col-md-4 user_role"></div>
        <div class="col-md-4 user_plan"></div>
        <div class="col-md-4 user_status"></div>
      </div>
    </div>
    <!-- users filter end -->
    <!-- list section start -->
    <div class="card">
      <div class="card-datatable table-responsive pt-0">
        <table class="user-list-table table">
          <thead class="thead-light">
            <tr>
              <th></th>
              <th>User</th>
              <th>Email</th>
              <th>Role</th>
              <th>Plan</th>
              <th>Status</th>
              <th>Actions</th>
            </tr>
          </thead>
        </table>
      </div>
      <!-- Modal to add new user starts-->
      <div class="modal modal-slide-in new-user-modal fade" id="modals-slide-in">
        <div class="modal-dialog">
          <form class="add-new-user modal-content pt-0">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
            <div class="modal-header mb-1">
              <h5 class="modal-title" id="exampleModalLabel">New User</h5>
            </div>
            <div class="modal-body flex-grow-1">
              <div class="form-group">
                <label class="form-label" for="basic-icon-default-fullname">Full Name</label>
                <input
                  type="text"
                  class="form-control dt-full-name"
                  id="basic-icon-default-fullname"
                  placeholder="John Doe"
                  name="user-fullname"
                  aria-label="John Doe"
                  aria-describedby="basic-icon-default-fullname2"
                />
              </div>
              <div class="form-group">
                <label class="form-label" for="basic-icon-default-uname">Username</label>
                <input
                  type="text"
                  id="basic-icon-default-uname"
                  class="form-control dt-uname"
                  placeholder="Web Developer"
                  aria-label="jdoe1"
                  aria-describedby="basic-icon-default-uname2"
                  name="user-name"
                />
              </div>
              <div class="form-group">
                <label class="form-label" for="basic-icon-default-email">Email</label>
                <input
                  type="text"
                  id="basic-icon-default-email"
                  class="form-control dt-email"
                  placeholder="john.doe@example.com"
                  aria-label="john.doe@example.com"
                  aria-describedby="basic-icon-default-email2"
                  name="user-email"
                />
                <small class="form-text text-muted"> You can use letters, numbers & periods </small>
              </div>
              <div class="form-group">
                <label class="form-label" for="user-role">User Role</label>
                <select id="user-role" class="form-control">
                  <option value="subscriber">Subscriber</option>
                  <option value="editor">Editor</option>
                  <option value="maintainer">Maintainer</option>
                  <option value="author">Author</option>
                  <option value="admin">Admin</option>
                </select>
              </div>
              <div class="form-group mb-2">
                <label class="form-label" for="user-plan">Select Plan</label>
                <select id="user-plan" class="form-control">
                  <option value="basic">Basic</option>
                  <option value="enterprise">Enterprise</option>
                  <option value="company">Company</option>
                  <option value="team">Team</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mr-1 data-submit">Submit</button>
              <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
            </div>
          </form>
        </div>
      </div>
      <!-- Modal to add new user Ends-->
    </div>
    <!-- list section end -->
</section> --}}
@endsection
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-validation.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/pages/app-user.min.css') }}">
@endsection
@section('page-scripts')
<script src="{{ asset('app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{ asset('app-assets/js/scripts/pages/app-user-list.min.js') }}"></script>
<script src="{{asset('app-assets/js/core/app-menu.min.js')}}"></script>
<script src="{{ asset('app-assets/js/core/app.min.js') }}"></script>
<script src="{{ asset('app-assets/js/scripts/customizer.min.js') }}"></script>
@endsection