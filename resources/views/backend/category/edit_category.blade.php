@extends('admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                        <a href="{{ route('all.category') }}" class="btn btn-primary rounded-pill waves-effect waves-light">All Category </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Category</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="tab-pane" id="settings">
                            <form method="post" action="{{ route('category.update') }}">
                                @csrf

                                <input type="hidden" name="id" value="{{ $category->id }}">
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i>Edit Category</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="firstname" class="form-label">Category Name</label>
                                            <input type="text" name="category_name" class="form-control" id="category_name" value="{{ $category->category_name }}" >
                                        </div>
                                    </div>  

                                </div> <!-- end row -->

                                
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Update</button>
                                </div>
                            </form>
                        </div>
                        <!-- end settings content-->
                   
                    </div>
                </div> <!-- end card-->

            </div> <!-- end col -->
        </div>
        <!-- end row-->

    </div> <!-- container -->

</div> <!-- content -->

@endsection