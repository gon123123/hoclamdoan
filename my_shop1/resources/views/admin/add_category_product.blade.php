@extends('admin_layout')
@section('admin_content')
<style>
    .message_admin_dangnhap {
    color: red !important;
    font-size: 17px !important;
    text-align: center !important;
    width: 100% !important;
}
</style>
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm Danh Mục Sản Phẩm
                </header>
                <div class="panel-body">
                    <?php
                    $message = Session::get('message_category');
                    if ($message) {
                        echo '<span class="message_admin_dangnhap">' . $message . '</span>';
                        Session::get('message', null);
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/save-category-product') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh Mục</label>
                                <input type="text" name="category_product_name" class="form-control"
                                    id="exampleInputEmail1" placeholder="Tên Danh Mục">
                            </div>
                            <div class="form-group">
                                <label for="">Mô Tả Danh Mục</label>
                                <textarea style="resize: none;" rows="8" class="form-control" id=""
                                    name="category_product_desc" placeholder="Mô ta danh muc"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Hiển Thị</label>
                                <select name="category_product_status" class="form-control input-sm m-bot15">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển Thị</option>
                                </select>
                            </div>
                            <button type="submit" name="add_category_product" class="btn btn-info">Thêm Danh Mục</button>
                        </form>
                    </div>

                </div>
            </section>

        </div>
    </div>
@endsection
