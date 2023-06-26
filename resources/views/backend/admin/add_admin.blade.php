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
                        <a href="{{ route('all.admin') }}" class="btn btn-primary rounded-pill waves-effect waves-light">All Admin </a>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Admin</h4>
                </div>
            </div>
        </div>     
        <!-- end page title -->

        <div class="row">

            <div class="col-lg-8 col-xl-8">
                <div class="card">
                    <div class="card-body">
                        
                        <div class="tab-pane" id="settings">
                            <form id="myForm" method="post" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                                @csrf
                                <h5 class="mb-4 text-uppercase"><i class="mdi mdi-account-circle me-1"></i> Add Admin</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Name</label>
                                            <input type="text" name="name" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Phone</label>
                                            <input type="text" name="phone" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control" >
                                            
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="firstname" class="form-label">Assign Roles</label>
                                            <select name="roles" class="form-control select2-hidden-accessible" data-toggle="select2" data-width="100%" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                                <option selected disabled>Select Roles</option>
                                                
                                                @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach

                                            </select>
                                            
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="example-fileinput" class="form-label">Admin Photo</label>
                                            <input type="file" name="photo" id="image" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label for="example-fileinput" class="form-label"></label>
                                            <img id="showImage" src="{{ url('upload/no_image.jpg') }}" class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                        </div>
                                    </div> -->

                                </div> <!-- end row -->
           
                                <div class="text-end">
                                    <button type="submit" class="btn btn-success waves-effect waves-light mt-2"><i class="mdi mdi-content-save"></i>Save</button>
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

<script type="text/javascript">
	
	$(document).ready(function(){
		$('#image').change(function(e){
			var reader = new FileReader();
			reader.onload =  function(e){
				$('#showImage').attr('src',e.target.result);
			}
			reader.readAsDataURL(e.target.files['0']);
		});
	});
</script>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                    minlength: 3,
                },
                email: {
                    required : true,
                    email : true,
                }, 
                phone: {
                    required : true,
                }, 
                photo: {
                    required : true,
                }, 
                password: {
                    required : true,
                }, 
                roles: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'Please Enter User Name',
                    minlength: 'Too Short, At Least 4 Character',
                },
                email: {
                    required : 'Please Enter User Email',
                    email : 'Enter Correct Email',
                },
                phone: {
                    required : 'Please Enter User Phone',
                },
                photo: {
                    required : 'Please Select User Photo',
                },
                password: {
                    required : 'Please Enter User Password',
                },
                roles: {
                    required : 'Please Select User role',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    
    });
    
</script>

@endsection