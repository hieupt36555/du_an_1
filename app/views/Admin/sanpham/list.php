<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sản Phẩm</h1>
          </div><!-- /.col -->
          
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Danh sách Sản Phẩm</h3>
              </div>
              <form action="enhanced-results.html">
                <div class="row">
                    <div class="col-md-10 offset-md-1">
                        <div class="row">
                            <div class="col-3">
                              <p></p>
                                <h5>Tìm Kiếm</h5>
                            </div>
                            <div class="col-9">
                                <div class="form-group">
                                    <label>Danh Mục</label>
                                    <select class="select2" style="width: 100%;">
                                        <option selected>iPhone</option>
                                        <option>iPad</option>
                                        <option>MacBook</option>
                                        <option>Watch</option>
                                    </select>
                                </div>
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <div class="input-group input-group-lg">
                                <input type="search" class="form-control form-control-lg" placeholder="Tìm kiếm theo từ khóa" value="">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Hình ảnh</th>
                    <th>Chọn</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>1</td>
                    <td>iPhone 15 pro
                    </td>
                    <td>27.550.000 VND</td>
                    <td><img style="width: 150px; object-fit: contain;" src="../../../public/images/iphone15.webp" alt=""></td>
                    <td><div class="btn-group">
                      <a class="btn btn-outline-success" href="index.php?act=detailsp" role="button">Xem</a>
                      <a class="btn btn-outline-secondary" href="index.php?act=updatesp" role="button">Sửa</a>
                      <a class="btn btn-outline-danger" href="#" role="button">Xóa</a>

                    </div></td>
                  </tr>
                 
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
       
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>