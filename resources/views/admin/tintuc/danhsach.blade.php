@extends('admin.layout.index')

@section('title')
    Danh sách Tin tức
@endsection

@section('content')
<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            @if(session('thongbaothanhcong'))
            <div class="col-lg-12 alert alert-success">
                {{ session('thongbaothanhcong') }}
            </div>
            @endif
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Tóm tăt</th>
                        <th>Thể loại</th>
                        <th>Loại tin</th>
                        <th>Số lượt xem</th>
                        <th>Nổi bật</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tintuc as $tt)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $tt->id }}</td>
                        <td>
                            <p>{{ $tt->TieuDe }}</p>
                        <img width="100px" src="upload/tintuc/{{$tt->Hinh}}" />
                        </td>
                        <td>{{ $tt->TomTat }}</td>
                        <td>{{ $tt->loaitin->theloai->Ten }}</td>
                        <td>{{ $tt->loaitin->Ten }}</td>
                        <td>{{ $tt->SoLuotXem }}</td>
                        <td>
                            @if($tt->NoiBat == 0)
                                {{ 'không' }}
                            @else {{ 'có' }}
                            @endif
                        </td>
                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="admin/tintuc/xoa/{{$tt->id}}">Delete</a></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/tintuc/sua/{{$tt->id}}">Edit</a></td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

@endsection