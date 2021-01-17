<div class="form-check row" :class="{'has-danger': errors.has('is_active'), 'has-success': fields.is_active && fields.is_active.valid }">
    <div class="ml-md-auto" :class="isFormLocalized ? 'col-md-8' : 'col-md-10'">
        <input class="form-check-input" id="is_active" type="checkbox" v-model="form.is_active" v-validate="''" data-vv-name="is_active"  name="is_active_fake_element">
        <label class="form-check-label" for="is_active">
            {{ trans('admin.game.columns.is_active') }}
        </label>
        <input type="hidden" name="is_active" :value="form.is_active">
        <div v-if="errors.has('is_active')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('is_active') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('name'), 'has-success': fields.name && fields.name.valid }">
    <label for="name" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.game.columns.name') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.name" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('name'), 'form-control-success': fields.name && fields.name.valid}" id="name" name="name" placeholder="{{ trans('admin.game.columns.name') }}">
        <div v-if="errors.has('name')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('name') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('owner_id'), 'has-success': fields.owner_id && fields.owner_id.valid }">
    <label for="owner_id" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.game.columns.owner_id') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.owner_id" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('owner_id'), 'form-control-success': fields.owner_id && fields.owner_id.valid}" id="owner_id" name="owner_id" placeholder="{{ trans('admin.game.columns.owner_id') }}">
        <div v-if="errors.has('owner_id')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('owner_id') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_player_attempts'), 'has-success': fields.start_player_attempts && fields.start_player_attempts.valid }">
    <label for="start_player_attempts" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.game.columns.start_player_attempts') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_player_attempts" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_player_attempts'), 'form-control-success': fields.start_player_attempts && fields.start_player_attempts.valid}" id="start_player_attempts" name="start_player_attempts" placeholder="{{ trans('admin.game.columns.start_player_attempts') }}">
        <div v-if="errors.has('start_player_attempts')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_player_attempts') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('start_player_hp'), 'has-success': fields.start_player_hp && fields.start_player_hp.valid }">
    <label for="start_player_hp" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.game.columns.start_player_hp') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.start_player_hp" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('start_player_hp'), 'form-control-success': fields.start_player_hp && fields.start_player_hp.valid}" id="start_player_hp" name="start_player_hp" placeholder="{{ trans('admin.game.columns.start_player_hp') }}">
        <div v-if="errors.has('start_player_hp')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('start_player_hp') }}</div>
    </div>
</div>


