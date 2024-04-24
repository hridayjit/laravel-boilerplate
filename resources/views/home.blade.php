@include('layout.header')
<style>
    /* :root{
        --video-width:100%;
    }
    video{
        width: var(--video-width);
        height: calc(15 / 16 * var(--video-width));
    } */
</style>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                
                <div class="col-lg-3 col-xs-12 col-sm-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary"><i class="fa-solid fa-user-plus"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">No. of Registrations</span>
                            <span class="info-box-number">3</span>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-3 col-xs-6 col-sm-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success" id="changeColor"><i class="fa-solid fa-satellite-dish"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Connection Status</span>
                            <span class="info-box-number" id="conStatus"></span>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="col-lg-3 col-6">
                    
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>0</h3>
                            <p>Dealer Visits today</p>
                        </div>
                    </div>
                </div> -->
            </div>
            <!-- <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success" id="changeColor"><i class="fa-solid fa-satellite-dish"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Connection Status</span>
                            <span class="info-box-number" id="conStatus"></span>
                        </div>
                    </div>
                </div>
            </div> -->
            
        </div>
    </section>
    <!-- <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">WhatPress Status</h1>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                
            </div>
        </div>
    </section> -->
    <!-- <div class="content-header">
        <div class="container-fluid">
            <div class="row  mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Connection</h1>
                </div>
            </div>
        </div>
    </div> -->
    <!-- <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12 mb-3 justify-content-center" id="">
                    
                    <div id="visible" style="display: none;">
                        <p>Connecting with the system may take upto 5 minutes. Please be patient.</p>
                        <p id="inputText"></p>
                        <div id="dynamicdiv">
                        </div>
                    </div>
                </div>
                <?php
                ?>
                <div class="col-md-6 col-sm-12 col-lg-6 col-xs-12">
                    <video controls autoplay muted loop>
                        <source src="assets/img/manual.mp4" type="video/mp4">
                    </video>
                </div>
            </div>
        </div>
    </section> -->
</div>


@include('layout.footer')

<script>
    $('.nav-link[href="{{route("home")}}"]').addClass('active');

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    window.onload=function(){
        
    }

    

 

  

</script>