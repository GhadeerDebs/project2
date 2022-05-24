<div>

    <div class="form-group row">
        <label for="state" class="col-md-4 col-form-label text-md-right">Make</label>
        <div class="col-md-6">
            <select wire:model="selectedmake" class="form-control">
                <option value="" selected>Choose Make Company</option>
                @foreach($makes as $make)
                    <option value="{{ $make->id }}">{{ $make->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    @if (!is_null($selectedmake))
        <div class="form-group row">
            <label for="city" class="col-md-4 col-form-label text-md-right">make years</label>

            <div class="col-md-6">
                <select wire:model="selectedmakeyears" class="form-control" name="make_years_id">
                    <option value="" selected>Choose make years</option>
                    @foreach($makes_years as $make_years)
                        <option value="{{ $make_years->id }}">{{ $make_years->year }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    @endif
    @if (!is_null($selectedmakeyears))
    <div class="form-group row">
        <label for="city" class="col-md-4 col-form-label text-md-right">model</label>

        <div class="col-md-6">
            <select class="form-control" name="model_id">
                <option value="" selected>Choose model</option>
                @foreach($moodels as $moodel)
                    <option value="{{ $moodel->id }}">{{ $moodel->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
@endif
</div>
