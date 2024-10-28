<?php

return [
'show_custom_fields' => true,

    'custom_fields' => [
        'First Name' => [
            'type' => 'text',
            'label' => 'First Name',
            'placeholder' => '',
            'required' => true,
            'rules' => 'required|string|max:255',
        ],
        'Middle Initial' => [
            'type' => 'password',
            'label' => 'Middile Initial',
            'placeholder' => '',
            'required' => true,
            'rules' => 'required|string|max:255',
        ],
        'Last Name' => [
            'type' => 'password',
            'label' => 'Last Name',
            'placeholder' => '',
            'required' => true,
            'rules' => 'required|string|max:255',
        ],
        'Gender' => [
            'type' => 'select',
            'label' => 'Gender',
            'placeholder' => 'Select',
            'required' => true,
            'options' => [
                'Male' => 'Male',
                'Female' => 'Female',
            ],
        ],
        'About Your Self' => [
            'type' =>'textarea',
            'label' => 'About Your Self',
            'placeholder' => '',
            'rows' => '3',
            'required' => true,
        ],
        'Date of Birth' => [
            'type' => 'datetime',
            'placeholder' => '',
            'label' => 'Date of Birth',
            'seconds' => false,
        ],
        'Agree in Confidentiality' => [
            'type' => 'boolean',
            'placeholder' => '',
            'label' => 'Agree in Confidentiality',
        ],



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
