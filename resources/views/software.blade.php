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
                <h3 class="card-title">Datatable for Software management</h3>
            </div>
            <div class="card-body">
                <table id="arsapos" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Action</th>
                        <th>Client Name</th>
                        <th>Project Name</th>
                        <th>Project Logo</th>
                        <th>Software Version</th>
                        <th>Client Logo</th>
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
              <h4 class="modal-title">Update Software</h4>
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
                                <label>Client Name *</label>
                                    <input type="text" id="clientname" name="clientname" class="form-control" placeholder="Client Name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label>Project Name</label>
                                <input type="text" id="projectname" name="projectname" class="form-control" placeholder="Project Name" autofocus>
                            </div>

                        </div>
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>Software Version</label>
                                <input type="text" id="softwareversion" class="form-control" name="softwareversion" placeholder="Software Version" value="" required autofocus>
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
        $('.nav-link[href="{{route("software")}}"]').addClass('active');
        $('#nav-open-close').addClass('menu-is-opening menu-open');
        $('#nav-treeview').attr({style: 'display: block;'});

        window.onload = function() {
            var p = $('#param').val();
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
                "sAjaxSource": "{{route('getsoftwares')}}",
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
                                return '<div style="display: flex;"><button data-id="'+data+'" class="btn btn-primary btn-update" data-toggle="tooltip" data-placement="right" title="Update"><i class="fa fa-pencil-square"></i></button></div>';
                            }
                        }
                    },
                    { "mData": "client_name" },
                    { "mData": "project_name" },
                    { 
                        "mData": "project_logo",
                        "bSortable": false,
                        "mRender": function(data, type, full) {
                            if(data == "")
                            {
                                return data;
                            }
                            else
                            {
                                return '<a href="assets/'+data+'"><img src="assets/'+data+'" width="150" height="" alt=""></a>';
                            }
                        }
                    },
                    { "mData": "software_version" },
                    { 
                        "mData": "client_logo",
                        "bSortable": false,
                        "mRender": function(data, type, full) {
                            if(data == "")
                            {
                                return data;
                            }
                            else
                            {
                                return '<a href="assets/'+data+'"><img src="assets/'+data+'" width="150" height="" alt=""></a>';
                            }
                        }
                    },
                   
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
            var table="software_master";
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
           
            var id = e.relatedTarget.id;
            if(id!=0)
            {
                update_data(id);
            }
            $('#current_id').val(id);
        });

    function update_data(id)
    {
        $.ajax({
            url: '{{route("getsoftwares")}}',
            type: 'POST',
            data: {
                id : id,
            },
            success: function (results) {
                var result = JSON.parse(results);
                setTimeout(() => {
                    $('#clientname').val(result[0].client_name);
                    $('#projectname').val(result[0].project_name);
                    $('#softwareversion').val(result[0].software_version);
                }, 500);
            }
        });
    }

    $('#btn-submit-c').click(function(){
        var current_id=$('#current_id').val();
        var clientname=$('#clientname').val();
        var projectname=$('#projectname').val();
        var softwareversion=$('#softwareversion').val();

        var allow=false;
        if(current_id!='' && current_id!=null && current_id!=undefined && clientname!='' && clientname!=null && clientname!=undefined){
           allow = true;
        }
        
        if(allow){
            var sendArr = {current_id:current_id, clientname:clientname, projectname:projectname, softwareversion:softwareversion};
            console.log(sendArr);
            // const formData = new FormData();
            // Object.keys(sendArr).forEach(element => {
            //     formData.append(element, sendArr[element]);
            // });
            $.ajax({
                type: "POST",
                url: '{{route("updatesoftware")}}',
                data: sendArr,
                //contentType: false,
                //processData: false,
                success: function(data)
                {
                    $("#defaultModal").modal('hide');
                    if(data==1){
                        toastShow("The Software has been Updated", 'success');
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


