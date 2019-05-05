<?php
return [
    /* Example
    'phone_types' => [
        'CELL' => "Cellular",
        'HOME' => "Home",
        'WORK' => "Work",
    ]
    // Use it anywhere in the code with 
    config('enums.phone_types')
    */

    // Status the task can have
    'task_status' => [
        0 => 'open',
        1 => 'in progress',
        2 => 'implemented'
    ],
    
    // Which impact has this task? Only on a single site or on the hole domain.
    'task_impact' => [
        0 => 'on this site',
        1 => 'on the domain'
    ]
];