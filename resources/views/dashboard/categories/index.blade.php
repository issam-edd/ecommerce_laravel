@extends('layouts.dashboard.app')
@section('content')
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>

<div class="row" id="basic-table">
  <div class="col-12">
    <div class="card">
      @include('layouts.partials.alerts')
      <div class="card-header">
        <h4 class="card-title">List Categories</h4>
        <a type="button" href="{{ route('categories.create') }}" class="btn btn-gradient-primary"><i data-feather="plus"></i> Add New Category</a>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
            <tr>
              <td>
                {{ $category->id }}
              </td>
              <td>
                {{ $category->title }}
              </td>
              <td>
                <div class="dropdown">
                  <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                    <i data-feather="more-vertical"></i>
                  </button>
                  <div class="dropdown-menu">
                    <a
                    class="dropdown-item"
                    href="javascript::void(0)"
                    id="edit-category"
                    data-url="{{ route("categories.edit", $category->id) }}"
                    class="action-icon">
                        <i data-feather="edit-2" class="mr-50"></i>
                        <span>Edit</span>
                    </a>
                      <a class="dropdown-item" onclick="deleteitem({{$category->id}});">
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
    </div>
  </div>
</div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>

            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
            <p>You Really want to Delete this Catgory ?</p>
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

{{-- // modal start // --}}
<div class="modal fade" id="editcategoryModal" tabindex="-1" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Category</h5>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
            </button>
        </div>
        <div class="modal-body">
          <form id="updateCategoryForm" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
              <label class="form-label" for="id">Category Id :</label>
              <strong><span id="id"></span></strong><br>
              <label class="form-label" for="title">Category Title :</label><br>
              <input class="form-control" class="form-control-sm col-12" type="text" name="title" id="title">
              <div class="modal-footer pt-1">
              <input type="submit" value="Update" class="btn btn-warning">
            </div>
            </form>
            </div>
        </div>

    </div>
</div>
</div>
{{-- // modal end // --}}
<script type="text/javascript">
    $(document).ready(function(){
        $('tbody').on('click','#edit-category',function(){
            var companyURL = $(this).data('url');
            $.get(companyURL,function (data){
                $('#editcategoryModal').modal('toggle');
                $('#updateCategoryForm').attr('action', '/dashboard/categories/' + data.id);
                $('#id').text(data.id);
                $('#title').val(data.title);
            })
        });
    });
    function deleteitem(id) {
                $('#deleteModal').modal('toggle');
                $('#deleteForm').attr('action', 'categories/' + id);
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