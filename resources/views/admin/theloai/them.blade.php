@extends('admin.layout.index')

@section('title')
    Thêm Thể loại
@endsection

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Category
                    <small>thêm</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    @foreach($errors->all() as $err)
                        {{ $err }}<br>
                    @endforeach
                </div>
                @endif
                @if(session('thongbaothanhcong'))
                <div class="alert alert-success">
                    {{ session('thongbaothanhcong') }}
                </div>
                @endif
                <form action="admin/theloai/them" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tên thể loại</label>
                        <input class="form-control" name="Ten" placeholder="Nhập tên thể loại" />
                    </div>
                    <button type="submit" class="btn btn-default">Thêm</button>
                    <button type="reset" class="btn btn-default">Làm mới</button>
                </form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->
@endsection