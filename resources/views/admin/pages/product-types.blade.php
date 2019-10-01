@extends('admin.layouts.master')
@section('title')
    product_type
@endsection

@section('content')
<div class="card shadow mb-4">
    
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary d-block float-left">Product Type</h6>
        <a href="#" class="btn btn-success btn-icon-split float-right" data-toggle="modal" data-target="#modelId">
            <span class="text">Add Product Type</span>
        </a>
        
        <!-- Modal -->
        <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Product Type</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                    <div class="modal-body">
                        <form action="{{route('productType.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                              <label for="">Product Type Name</label>
                              <input type="text" name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                              <label for="">Category</label>
                              <select class="form-control" name="category_id" id="">
                                  @foreach ($categories as $item)
                                      <option value="{{$item->id}}" id="{{$item->id}}">{{$item->name}}</option>
                                  @endforeach
                              </select>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Save</button>
                            </div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <div class="dataTables_length" id="dataTable_length">
                            <label>Show
                                <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select> entries</label>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-6">
                        <div id="dataTable_filter" class="dataTables_filter">
                            <label>Search:
                                <input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable">
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                        @include('errors.errors')    
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th>#</th>
                                    <th>product_type Name</th>
                                    <th>Slug</th>
                                    <th>Create at</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>product_type Name</th>
                                    <th>Slug</th>
                                    <th>Create at</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach ($product_types as $product_type)
                                <tr role="row">
                                    <td class="sorting_1">{{ $product_type->id }}</td>
                                    <td>{{ $product_type->name }}</td>
                                    <td>{{ $product_type->slug }}</td>
                                    <td>{{ $product_type->created_at }}</td>
                                    <td>
                                        <button  type="submit" class="btn btn-info btn-circle float-left mr-1" data-toggle="modal" data-target="#edit{{$product_type->id}}">
                                            <i class="far fa-edit"></i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <form action="{{route('productType.update', $product_type->id)}}" method="post">
                                            @csrf
                                            @method("PUT")
                                            <div class="modal fade" id="edit{{$product_type->id}}" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Edit Product Type</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="">Id</label>
                                                                <input readonly type="text" name="id" id="id" class="form-control" value="{{ $product_type->id}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Product Type Name</label>
                                                                <input type="text" name="name" id="name" class="form-control" value="{{ $product_type->name}}">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="">Category</label>
                                                                <select class="form-control" name="category_id" id="">
                                                                    @foreach ($categories as $item)
                                                                        <option value="{{$item->id}}" id="{{$item->id}}">{{$item->name}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>


                                        <form action="{{route('productType.destroy', $product_type->id)}}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button  type="submit" class="btn btn-danger btn-circle">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                    </div>
                    <div class="col-sm-12 col-md-7">
                            {{-- {{ $product_types->links() }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
