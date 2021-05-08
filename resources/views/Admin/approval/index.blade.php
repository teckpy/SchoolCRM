<x-admin-layout>
    <div>
     <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1> Hi -:  <b>{{ Auth::user()->name }}</b> </h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#"></a></li>
                <li class="breadcrumb-item active"></li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  
      <!-- Main content -->
      <section class="content">
        <div class="error-page">
          <h2 class="headline text-danger">!</h2>
  
          <div class="error-content">
            <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Your Account is Waiting for Administrator Approval</h3>
  
            <p>
              Please check back later
              Or  &nbsp;&nbsp; <a href="">Contact Administrator</a> 
            </p>
          </div>
        </div>
        <!-- /.error-page -->
  
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
  
    </div>
  </x-admin-layout>