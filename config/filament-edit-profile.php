<?php

return [
'show_custom_fields' => true,

    'custom_fields' => [
        'github' => [
            'type' => 'text',
            'label' => 'Github Account',
            'preload' =>  true,
            'placeholder' => 'Github username',
            'required' => false,
            'columnspan' => 4,
            'hint' => 'Enter your github username',
            'hintIcon' => 'heroicon-m-question-mark-circle',
            'tooltip' => 'This is the github username it will show in the system',
            'rules' => 'nullable|string|max:255',
       ],

        'Itch.io' => [
            'type' => 'text',
            'label' => 'Itch.io Account',
            'placeholder' => 'Itch.io Username',
            'required' => false,
            'columnspan' => 4,
            'rules' => 'nullable|string|max:255',
       ],

        'linkedin' => [
            'type' => 'text',
            'label' => 'LinkedIn Account',
            'placeholder' => 'LinkedIn Username',
            'required' => false,
            'columnspan' => 4,
            'rules' => 'nullable|string|max:255',
       ],
       'facebook' => [
        'type' => 'text',
        'label' => 'Facebook Account',
        'placeholder' => 'Facebook Username',
        'required' => false,
        'columnspan' => 4,
        'rules' => 'nullable|string|max:255',
   ],

       

       //run this php artisan make:migration add_custom_fields_to_users_table --table=users
       //php artisan migrate
       //add mnore custom fields here
    ],
];
