import AppForm from '../app-components/Form/AppForm';

Vue.component('game-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                is_active:  false ,
                name:  '' ,
                owner_id:  '' ,
                start_player_attempts:  '' ,
                start_player_hp:  '' ,
                
            }
        }
    }

});