<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('admin.menu.store')}}">
                    @csrf
                    <div class="form-group">
                        <label for="inputAddress">type</label>
                        <select id="inputState" class="form-control" name="type">
                            <option name="about">about</option>
                            <option name="contact">contact</option>
                            <option name="portfolio">portfolio</option>
                            <option name="services">services</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" placeholder="title" name="title" value="{{old('title')}}">
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" placeholder="slug" name="slug" value="{{old('slug')}}">
                    </div>
                    <div class="form-group">
                        <label for="ucin">ucin</label>
                        <input type="text" class="form-control" id="ucin" placeholder="ucin" name="ucin" value="{{old('ucin')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">save</button>
                </form>
                <br>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>

