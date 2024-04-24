@include('layout.header')


<div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Create
                <small>User</small>
            </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
            <!-- left column -->
                <div class="col-md-12">
                <!-- jquery validation -->
                    <div class="card card-primary">
                      <div class="card-header">
                          <h3 class="card-title">User <small>Create</small></h3>
                      </div>
                  <!-- /.card-header -->
                    <!-- form start -->
                      <form id="quickForm" action="{{ route('createuser') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="row">
                              <div class="col-md-6">
                                <input type="hidden" id="current_id" name="current_id" class="form-control" value="">

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

                                <!-- <div class="form-group" id="eventdiv">
                                  <label>Event</label>
                                  <select id="eventid" name="eventid" class="select2 form-control select2-info" data-dropdown-css-class="select2-info" style="width: 100%;" required onchange=""></select>
                                </div> -->

                              </div>
                              <div class="col-md-6">
                                

                                <div class="form-group">
                                  <label>Email</label>
                                  <input type="email" id="email" name="email" class="form-control" placeholder="Email" autofocus>
                                </div>
                                
                                <div class="form-group">
                                  <label>Password *</label>
                                  <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" value="" required autofocus>
                                </div>
                              </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" id="btn-create" class="btn btn-primary">Done</button>
                        </div>
                      </form>
                <!--</form>-->
                </div>
                <!-- /.card -->
                </div>
            <!--/.col (left) -->
            <!-- right column -->
            <div class="col-md-6">

            </div>
            <!--/.col (right) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    
    </section>
</div><!----content-wrapper-->


@include('layout.footer')

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.nav-link[href="{{ route("user") }}"]').addClass('active');
    $('#nav-open-close').addClass('menu-is-opening menu-open');
    $('#nav-treeview').attr({style: 'display: block;'});

    window.onload = function() {
  $('.select2').select2();
  role_data();
  // event_data();
}

function role_data(){
    $select5 = $('#roleid');
    $select5.html('');
    $.ajax({
        url: '{{ route("getroles") }}',
        dataType:'JSON',
        type: "POST",
        success:function(data){
          $select5.append('<option value="">---Select Roles---</option>');
          $.each(data, function(key, val){
            $select5.append('<option value="' + val.id + '">' + val.name + '</option>');
          });
        },
        error:function(){
            $select5.html('<option id="-1">Not Available</option>');
        }
    });
}






</script>