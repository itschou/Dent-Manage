<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Notify Theme
    |--------------------------------------------------------------------------
    |
    | You can change the theme of notifications by specifying the desired theme.
    | By default the theme light is activated, but you can change it by
    | specifying the dark mode. To change theme, update the global variable to `dark`
    |
    */

    'theme' => env('NOTIFY_THEME', 'light'),

    /*
    |--------------------------------------------------------------------------
    | Notification timeout
    |--------------------------------------------------------------------------
    |
    | Defines the number of seconds during which the notification will be visible.
    |
    */

    'timeout' => 5000,

    /*
    |--------------------------------------------------------------------------
    | Preset Messages
    |--------------------------------------------------------------------------
    |
    | Define any preset messages here that can be reused.
    | Available model: connect, drake, emotify, smiley, toast
    |
    */

    'preset-messages' => [
        // An example preset 'user updated' Connectify notification.
        'user-updated' => [
            'message' => 'The user has been updated successfully.',
            'type' => 'success',
            'model' => 'connect',
            'title' => 'User Updated',
        ],
        'modif-erreur' => [
            'message' => "Une erreur est survenue durant la modification.",
            'type' => 'error',
            'model' => 'emotify',
            'title' => 'Erreur de modification',
        ],
        'delete-erreur' => [
            'message' => "Une erreur est survenue durant la suppression.",
            'type' => 'error',
            'model' => 'emotify',
            'title' => 'Erreur de suppression',
        ],
    ],

];
