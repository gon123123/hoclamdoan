@extends('admin_layout')
@section('admin_content')
<style>
    .message_update {
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
                    Cập Nhật Danh Mục Sản Phẩm
                </header>
                <?php
                $message = Session::get('message_capnhat');
                if ($message) {
                    echo '<span class="message_update">' . $message . '</span>';
                    Session::get('message_capnhat', null);
                }
                ?>
                <div class="panel-body">
                   @foreach ($edit_category_product as $key => $edit_value)
                    <div class="position-center">
                        <form role="form" action="{{ URL::to('/update-category-product/'.$edit_value->category_id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên Danh Mục</label>
                                <input type="text" name="category_product_name" class="form-control"
                                    id="exampleInputEmail1" placeholder="Tên Danh Mục"
                                    value="{{$edit_value->category_name}}">
                            </div>
                            <div class="form-group">
                                <label for="">Mô Tả Danh Mục</label>
                                <textarea style="resize: none;" rows="8" class="form-control" id=""
                                    name="category_product_desc">{{$edit_value->category_desc}}</textarea>
                            </div>
                            <button type="submit" name="update_category_product" class="btn btn-info">Cập Nhật Danh Mục</button>
                        </form>
                    </div>
                    @endforeach
                </div>
            </section>

        </div>
    </div>
@endsection
