@if(isset ($errors) && count($errors) > 0)
    <div class="alert alert-danger alert-dismissable">
        <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
        <strong>ERROR: </strong>
        @foreach($errors->all() as $error)
            @if ($loop->count > 1)
                <br /> {{ $error }}
            @else
                {{ $error }}
            @endif
        @endforeach
    </div>
@endif

@if(Session::get('success', false))
    <?php $data = Session::get('success'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <strong>SUCCESS: </strong>
                {{ $msg }}
            </div>
        @endforeach
    @else
        <div class="alert alert-success alert-dismissable">
            <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
            <strong>SUCCESS: </strong>
            {{ $data }}
        </div>
    @endif
@endif