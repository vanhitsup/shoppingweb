<?php
//    echo '<pre>';
//    print_r($list_category_product);
//    echo '</pre>';
$i=1;
//?>
@extends('admin.blank')
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh Sách Danh Mục Sản Phẩm</h1>

        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <?php
                        $message= session()->get('message');
                        if($message){
                            echo '<p style="color:red ; font-weight: bold">' .$message.'</p>';
                            session()->put('message',null);
                        }
                        ?>
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                            <th width="15%" >Ẩn / Hiện</th>
                            <th width="14%">Hành động</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($list_category_product  as $key=>$value)
                            <tr>
                                <td align="center" width="10px"><?php echo $i; $i++; ?></td>
                                <td align="center">{{$value->category_name}}</td>
                                <td align="center" >

                                    <?php if( $value->category_status==1){ ?>

                                    <a style="text-decoration: none" href="{{\Illuminate\Support\Facades\URL::to('/unactive-category-product/'.$value->category_id)}}">
                                        <i style="color: #1AA162;font-size: 20px" class="fas fa-thumbs-up"></i>
                                    </a>
                                    <?php  } else { ?><a href="{{\Illuminate\Support\Facades\URL::to('/active-category-product/'.$value->category_id)}}"><i style="color: red;font-size: 20px" class="fas fa-thumbs-down"></i></a>
                                    <?php } ?>

                                </td>
                                <td align="center">
                                    <a href="{{\Illuminate\Support\Facades\URL::to('edit-category-product/'.$value->category_id)}}" class="active" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-success">Sửa</button>
                                    </a>
                                    <a onclick="return confirm('Bạn có chắc muốn xóa danh mục này không?')"  href="{{\Illuminate\Support\Facades\URL::to('delete-category-product/'.$value->category_id)}}" class="active" style="text-decoration: none">
                                        <button type="button" class="btn btn-outline-danger">Xóa</button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
