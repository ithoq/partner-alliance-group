<!-- Hidden Fields -->
<input type="hidden" name="_token" value="{{ csrf_token() }}" />

<!-- Form Fields -->
<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="property_estate">Estate</label>
            <span class="label label-danger pull-right text-uppercase">Required</span>
            <select class="form-control" id="property_estate" name="property_estate">
                @foreach($estates as $estate)
                    <option value="{{ $estate->id }}">{{ $estate->estate_name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="property_lot_number">Lot Number</label>
            <input type="text" class="form-control" id="property_lot_number" name="property_lot_number" value="{{ old('property_lot_number') }}" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="property_street">Street</label>
            <input type="text" class="form-control" id="property_street" name="property_street" value="{{ old('property_street') }}" />
        </div>
    </div>
</div>

<div class="form-group">
    <label for="is_published"><strong>Visibility</strong></label>
    <span class="label label-danger pull-right text-uppercase">Required</span>
    <select class="form-control" id="is_published" name="is_published">
        <option value="0">Unpublished</option>
        <option value="1">Published</option>
    </select>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="property_price">Price</label>
            <input type="text" class="form-control" id="property_price" name="property_price" value="{{ old('property_price') }}" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="property_design">Design</label>
            <input type="text" class="form-control" id="property_design" name="property_design" value="{{ old('property_design') }}" />
        </div>
    </div>
</div>


<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="property_size">Property Size</label>
            <input type="text" class="form-control" id="property_size" name="property_size" value="{{ old('property_size') }}" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="property_land">Land Size</label>
            <input type="text" class="form-control" id="property_land" name="property_land" value="{{ old('property_land') }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="property_bed">Bed</label>
            <input type="number" class="form-control" id="property_bed" name="property_bed" value="{{ old('property_bed') }}" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="property_bath">Bath</label>
            <input type="number" class="form-control" id="property_bath" name="property_bath" value="{{ old('property_bath') }}" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="property_car">Car</label>
            <input type="number" class="form-control" id="property_car" name="property_car" value="{{ old('property_car') }}" />
        </div>
    </div>
</div>

<div class="form-group">
    <label for="property_status">Status</label>
    <select class="form-control" id="property_status" name="property_status">
        <option value="available">Available</option>
        <option value="reserved">Reserved</option>
        <option value="signed">Signed</option>
        <option value="sold">Sold</option>
    </select>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="land_price">Land Price</label>
            <input type="number" class="form-control" id="land_price" name="land_price" value="{{ old('land_price') }}" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="house_price">House Price</label>
            <input type="number" class="form-control" id="house_price" name="house_price" value="{{ old('house_price') }}" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="total_price">Total Price</label>
            <input type="number" class="form-control" id="total_price" name="total_price" placeholder="Auto calculated house + land price" value="{{ old('total_price') }}" readonly="readonly" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="house_design">House Design</label>
            <input type="text" class="form-control" id="house_design" name="house_design" value="{{ old('house_design') }}" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="facade">Facade</label>
            <input type="text" class="form-control" id="facade" name="facade" value="{{ old('facade') }}" />
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="colour_scheme">Colour Scheme</label>
            <input type="text" class="form-control" id="colour_scheme" name="colour_scheme" value="{{ old('colour_scheme') }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="total_area">Total Area</label>
            <input type="text" class="form-control" id="total_area" name="total_area" value="{{ old('total_area') }}" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="width">Width</label>
            <input type="text" class="form-control" id="width" name="width" value="{{ old('width') }}" />
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <label for="depth">Depth</label>
            <input type="text" class="form-control" id="depth" name="depth" value="{{ old('depth') }}" />
        </div>
    </div>
</div>

<div class="form-group">
    <label for="contract">Contact</label>
    <input type="text" class="form-control" id="contract" name="contract" value="{{ old('contract') }}" />
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="property_titled">Titled</label>
            <input type="text" class="form-control" id="property_titled" name="property_titled" value="{{ old('property_titled') }}" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="frontage">Frontage</label>
            <input type="text" class="form-control" id="frontage" name="frontage" value="{{ old('frontage') }}" />
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="approx_rent">Approx Rent</label>
            <input type="text" class="form-control" id="approx_rent" name="approx_rent" value="{{ old('approx_rent') }}" />
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label for="council_rates">Council Rates</label>
            <input type="text" class="form-control" id="council_rates" name="council_rates" value="{{ old('council_rates') }}" />
        </div>
    </div>
</div>