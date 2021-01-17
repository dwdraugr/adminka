import AppForm from '../app-components/Form/AppForm';

Vue.component('gamer-form', {
    mixins: [AppForm],
    data: function() {
        return {
            form: {
                donate_value:  '' ,
                energy:  '' ,
                in_game_value:  '' ,
                nickname:  '' ,
                
            }
        }
    }

});