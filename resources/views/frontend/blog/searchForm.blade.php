<div class="row pt-5 mb-2 justify-end mr-2">
    <div class="col-md-3 float-right">
        <div class="widget search md:hidden">
            <form role="form" action="/blogs" method="post">
                @csrf
                <input type="text" class="form-control search_box" placeholder="Search Here" name="query"
                    value="{{ old('query') }}">
                <button type="submit"><i class="fa fa-search"></i></button>
            </form>
        </div>
    </div>

</div>
