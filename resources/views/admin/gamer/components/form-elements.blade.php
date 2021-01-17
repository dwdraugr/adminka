<div class="form-group row align-items-center" :class="{'has-danger': errors.has('donate_value'), 'has-success': fields.donate_value && fields.donate_value.valid }">
    <label for="donate_value" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gamer.columns.donate_value') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.donate_value" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('donate_value'), 'form-control-success': fields.donate_value && fields.donate_value.valid}" id="donate_value" name="donate_value" placeholder="{{ trans('admin.gamer.columns.donate_value') }}">
        <div v-if="errors.has('donate_value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('donate_value') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('energy'), 'has-success': fields.energy && fields.energy.valid }">
    <label for="energy" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gamer.columns.energy') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.energy" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('energy'), 'form-control-success': fields.energy && fields.energy.valid}" id="energy" name="energy" placeholder="{{ trans('admin.gamer.columns.energy') }}">
        <div v-if="errors.has('energy')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('energy') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('in_game_value'), 'has-success': fields.in_game_value && fields.in_game_value.valid }">
    <label for="in_game_value" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gamer.columns.in_game_value') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.in_game_value" v-validate="'required|integer'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('in_game_value'), 'form-control-success': fields.in_game_value && fields.in_game_value.valid}" id="in_game_value" name="in_game_value" placeholder="{{ trans('admin.gamer.columns.in_game_value') }}">
        <div v-if="errors.has('in_game_value')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('in_game_value') }}</div>
    </div>
</div>

<div class="form-group row align-items-center" :class="{'has-danger': errors.has('nickname'), 'has-success': fields.nickname && fields.nickname.valid }">
    <label for="nickname" class="col-form-label text-md-right" :class="isFormLocalized ? 'col-md-4' : 'col-md-2'">{{ trans('admin.gamer.columns.nickname') }}</label>
        <div :class="isFormLocalized ? 'col-md-4' : 'col-md-9 col-xl-8'">
        <input type="text" v-model="form.nickname" v-validate="'required'" @input="validate($event)" class="form-control" :class="{'form-control-danger': errors.has('nickname'), 'form-control-success': fields.nickname && fields.nickname.valid}" id="nickname" name="nickname" placeholder="{{ trans('admin.gamer.columns.nickname') }}">
        <div v-if="errors.has('nickname')" class="form-control-feedback form-text" v-cloak>@{{ errors.first('nickname') }}</div>
    </div>
</div>


