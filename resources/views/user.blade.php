@include('layout.header')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Manage
                <small>Users</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="card">
            <div class="card-header">
                <input type="hidden" id="param" name="param" class="form-control" value="{{ session('param') }}">
                <!--<h3 class="card-title">Datatable for User management</h3>-->
                @if(session('role')==1 || session('role')==2)
                <div class="row">
                    <div class="col">
                        <div class="float-md-right">
                            <a href="{{route('create_user')}}" class="btn btn-primary" role="button"><i class="fa fa-plus"></i> Add new</a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            <div class="card-body">
                <table id="arsapos" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Action</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Role</th>
                        <!--<th>Created on</th>
                        <th>Updated on</th>-->
                    </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
    <!-- /.content -->
    <section class="content">
        <!----------------------Default Modal-------------------------------------------->
      <div class="modal fade" id="defaultModal" role="dialog">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-primary">
              <h4 class="modal-title">Update User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="" class="ajaxform_reset_form" enctype="multipart/form-data">
					@csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="hidden" id="current_id" name="current_id" class="form-control" value="" required>

                            <div class="form-group">
                                <label>Name *</label>
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Name" required autofocus>
                            </div>

                            <div class="form-group">
                                <label>Role *</label>
                                <select id="roleid" name="roleid" class="select2 form-control select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" required onchange=""></select>
                            </div>

                            <div class="form-group">
                                <label>Phone *</label>
                                <input type="number" id="phone" name="phone" class="form-control" placeholder="10 digits Phone No." oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength = "10" required autofocus>
                            </div>

                        </div>
                        <div class="col-md-6">
                            

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="email" name="email" class="form-control" placeholder="Email" autofocus>
                            </div>
                            
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" value="" required autofocus>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button type="button" id="btn-submit-c" class="btn btn-primary">Save changes</button>
                </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
    </section>
  </div>

  @include('layout.footer')
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        //page specific codes
        $('.nav-link[href="{{route("user")}}"]').addClass('active');
        $('#nav-open-close').addClass('menu-is-opening menu-open');
        $('#nav-treeview').attr({style: 'display: block;'});



        

        window.onload = function() {
            var p = $('#param').val();
            console.log(p);
            if(p!=''){
                if(p==1){
                    toastShow('User Successfully Registered', 'success');
                }
                else if(p==2){
                    toastShow("Error!. Please try again!", "error");
                }
                else if(p==3){
                    toastShow('User already registered.', 'error');
                }
            }
        
            getTable();
        }

        function getTable()
        {
            //var csrfToken = $('meta[name="csrf-token"]').attr('content');
            $('#arsapos').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copyHtml5',
                    'excelHtml5',
                    'csvHtml5',
                    'pdfHtml5',
                ],
                "scrollX": false,
                "destroy": true,
                "fixedHeader": true,
                //from adminlte-3.2 start
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
                language: {
                    emptyTable: "No data available.", //
                    loadingRecords: "Please wait...", // default Loading...
                    zeroRecords: "No matching records found"
                },
                tableTools: {
                    "sSwfPath": "swf/copy_csv_xls_pdf.swf",
                    "aButtons": [
                    {
                            "sExtends": "copy",
                            "oSelectorOpts": { filter: "applied", order: "current" }
                    },
                    {
                            'sExtends': 'xls',
                            "oSelectorOpts": { filter: 'applied', order: 'current' }
                    },
                    {
                            'sExtends': 'print',
                            "oSelectorOpts": { filter: 'applied', order: 'current' }
                    },
                    {
                            'sExtends': 'pdf',
                            "oSelectorOpts": { filter: 'applied', order: 'current'}
                    },
                    ]
                },
                "aaSorting": [], // Prevent initial sorting
                "cache":false,
                //
                "sAjaxSource": "{{route('getusers')}}",
                "fnServerParams": function ( aoData ) {
                        //aoData.push( {"name": "csrf_token", "value":$('meta[name="csrf-token"]').attr('content')} );
                },
                "sAjaxDataProp": "",
                "sServerMethod" : "POST", // Default sServerMethod is GET.
                "bProcessing": true,
                "rowCallback" : function(row, data, index){
                    /*if(data['user_locked']==1){
                        $(row).css('background', 'red');//blue
                    }*/
                },
                "aoColumns": [
                    {
                        "mData": "id",
                        "bSortable": false,
                        "mRender": function(data, type, full) {
                        //console..log(data);
                            if(data == "No data available.")
                            {
                                return data;
                            }
                            else
                            {
                                return '<div style="display: flex;"><button data-id="'+data+'" class="btn btn-primary btn-update" data-toggle="tooltip" data-placement="right" title="Update"><i class="fa fa-pencil-square"></i></button>&nbsp&nbsp&nbsp<button data-id="'+data+'" class="btn btn-danger btn-delete" data-toggle="tooltip" data-placement="right" title="Delete"><i class="fa fa-trash"></i></button></div>';
                            }
                        }
                    },
                    // { 
                    //     "mData": "photo",
                    //     "bSortable": false,
                    //     "mRender": function(data, type, full) {
                    //     //console..log(data);
                    //         if(data == "")
                    //         {
                    //             return data;
                    //         }
                    //         else
                    //         {
                    //             return '<a href="'+data+'"><img src="'+data+'" width="150" height="" alt=""></a>';
                    //         }
                    //     }
                    // },
                    { "mData": "name" },
                    { "mData": "phone" },
                    { "mData": "email" },
                    { "mData": "role_name" },
                   
                ]
            });
        }

        $('#arsapos').on('click','.btn-update' ,function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            //window.open('create_user.php?id='+id,'_self');
            $('#defaultModal').modal('show', {id: id});
        });
        $('#arsapos').on('click','.btn-delete' ,function(e) {
            e.preventDefault();
            var id = $(this).data('id');
            //var table="business_master";
            var table="user_master";
            if(confirm('Deleting this data will also result in deletion of other related data.Are you sure you want to delete this data?'))
            {
                var queryParams = { id:id, table:table, redirect:window.location.href };
                const queryString = Object.keys(queryParams)
                    .map(key => `${encodeURIComponent(key)}=${encodeURIComponent(queryParams[key])}`)
                    .join('&');
                    
                const destinationURL = '{{ route("delete") }}' + '?' + queryString;

                window.location.href = destinationURL;
            }
        });

        $('#defaultModal').on('show.bs.modal', function(e){
            $('.select2').select2();
            $('#password').val('');
            role_data();
           
            var id = e.relatedTarget.id;
            if(id!=0)
            {
                update_data(id);
            }
            $('#current_id').val(id);
        });

        function role_data(){
            $select5 = $('#roleid');
            $select5.html('');
            $.ajax({
                url: '{{route("getroles")}}',
                dataType:'JSON',
                type: "POST",
                success:function(data){
                    //console.log(data);
                    $select5.append('<option value="">---Select Roles---</option>');
                    $.each(data, function(key, val){
                        //if(val.id!=2){
                            $select5.append('<option value="' + val.id + '">' + val.name + '</option>');
                        //}
                    })
                    //$select5.selectpicker('refresh');
                },
                error:function(){
                    $select5.html('<option id="-1">Not Available</option>');
                }
            });
        }

    function update_data(id)
    {
        $.ajax({
            url: '{{route("getusers")}}',
            type: 'POST',
            data: {
                id : id,
            },
            success: function (results) {
                var result = JSON.parse(results);
                setTimeout(() => {
                    $('#name').val(result[0].name);
                    $('#phone').val(result[0].phone);
                    $('#email').val(result[0].email);
                    $('#roleid').val(result[0].role_id).select2().trigger('change');
                }, 500);
            }
        });
    }

    $('#btn-submit-c').click(function(){
        var current_id=$('#current_id').val();
        var name=$('#name').val();
        var phone=$('#phone').val();
        var email=$('#email').val();
        var roleid=$('#roleid').val();
        var pwd=$('#password').val();

        var allow=false;
        if(roleid!='' && roleid!=null && roleid!=undefined){
            if(roleid==1){
                if(current_id!='' && name!='' && phone!=''){
                    allow=true;
                }
            }
            else{
                if(current_id!='' && name!='' && phone!=''){
                    allow=true;
                }
            }
        }
        
        if(allow){
            var sendArr = {current_id:current_id, name:name, phone:phone, email:email, pwd:pwd, roleid:roleid};
            //console.log(sendArr);
            // const formData = new FormData();
            // Object.keys(sendArr).forEach(element => {
            //     formData.append(element, sendArr[element]);
            // });
            $.ajax({
                type: "POST",
                url: '{{route("updateuser")}}',
                data: sendArr,
                //contentType: false,
                //processData: false,
                success: function(data)
                {
                    $("#defaultModal").modal('hide');
                    if(data==1){
                        toastShow("The User has been Updated", 'success');
                    }
                    else if(data==2){
                        toastShow("The credentials are already registered!", "error");
                    }
                    else if(data==0){
                        toastShow("Error in POST query", "error");
                    }
                    getTable();
                },
                error: function(xhr, status, error)
                {
                    console.error(xhr);
                    $("#defaultModal").modal('hide');
                    toastShow("Couldn't create. Please try again", "error");
                }
            });
        }
        else{
            toastShow("The required fields are not filled", "error");
            //alert("The required fields are not filled");
        }
    });
    


    </script>


