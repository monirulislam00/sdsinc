<div class="row pt-5 mb-2 justify-end mr-2">
    <div class="col-md-3 float-right">
        <form role="form" action="/blogs" method="post">
            @csrf
            <div class="widget search md:hidden ring-1 ring-primary  flex">
                <input type="text" class="border-none" placeholder="Search Here" name="query"
                    value="{{ old('query') }}">
                <button type="submit" style="background: #F47A3E;color:white"
                    class="p-[10px] px-[11.5px] font-medium">Search</button>
            </div>
        </form>
    </div>

</div>
