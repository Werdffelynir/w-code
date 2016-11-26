<?php

return array(
    'type'      => 'group',
    'resolvers' => array(
        
        'action' => array(
            'type'     => 'pattern',
            'path'     => '<processor>/<action>'
        ),
        
        'processor' => array(
            'type'     => 'pattern',
            'path'     => '(<processor>)',
            'defaults' => array(
                'processor' => 'greet',
                'action'    => 'default'
            )
        )
    )
);
