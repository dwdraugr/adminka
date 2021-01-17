<?php

return [
    'admin-user' => [
        'title' => 'Users',

        'actions' => [
            'index' => 'Users',
            'create' => 'New User',
            'edit' => 'Edit :name',
            'edit_profile' => 'Edit Profile',
            'edit_password' => 'Edit Password',
        ],

        'columns' => [
            'id' => 'ID',
            'last_login_at' => 'Last login',
            'activated' => 'Activated',
            'email' => 'Email',
            'first_name' => 'First name',
            'forbidden' => 'Forbidden',
            'language' => 'Language',
            'last_name' => 'Last name',
            'password' => 'Password',
            'password_repeat' => 'Password Confirmation',
                
            //Belongs to many relations
            'roles' => 'Roles',
                
        ],
    ],

    'post' => [
        'title' => 'Posts',

        'actions' => [
            'index' => 'Posts',
            'create' => 'New Post',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'game' => [
        'title' => 'Games',

        'actions' => [
            'index' => 'Games',
            'create' => 'New Game',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'is_active' => 'Is active',
            'name' => 'Name',
            'owner_id' => 'Owner',
            'start_player_attempts' => 'Start player attempts',
            'start_player_hp' => 'Start player hp',
            
        ],
    ],

    'gamer' => [
        'title' => 'Gamers',

        'actions' => [
            'index' => 'Gamers',
            'create' => 'New Gamer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'donate_value' => 'Donate value',
            'energy' => 'Energy',
            'in_game_value' => 'In game value',
            'nickname' => 'Nickname',
            
        ],
    ],

    'item' => [
        'title' => 'Item',

        'actions' => [
            'index' => 'Item',
            'create' => 'New Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    'game' => [
        'title' => 'Games',

        'actions' => [
            'index' => 'Games',
            'create' => 'New Game',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'is_active' => 'Is active',
            'name' => 'Name',
            'owner_id' => 'Owner',
            'start_player_attempts' => 'Start player attempts',
            'start_player_hp' => 'Start player hp',
            
        ],
    ],

    'gamer' => [
        'title' => 'Gamers',

        'actions' => [
            'index' => 'Gamers',
            'create' => 'New Gamer',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            'donate_value' => 'Donate value',
            'energy' => 'Energy',
            'in_game_value' => 'In game value',
            'nickname' => 'Nickname',
            
        ],
    ],

    'item' => [
        'title' => 'Item',

        'actions' => [
            'index' => 'Item',
            'create' => 'New Item',
            'edit' => 'Edit :name',
        ],

        'columns' => [
            'id' => 'ID',
            
        ],
    ],

    // Do not delete me :) I'm used for auto-generation
];