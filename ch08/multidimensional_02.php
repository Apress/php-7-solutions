<?php
$wines = [
    'White' => [
        'California' => [
            'Chardonnay', 'Sauvignon blanc'
        ],
        'Burgundy' => [
            'Chardonnay', 'Pinot blanc'
        ]
    ],
    'Red' => [
        'California' => [
            'Merlot', 'Zinfandel'
        ],
        'Burgundy' => [
            'Pinot noir', 'Gamay'
        ]
    ]
];

/*
 * Rename ListBuilder_end.php if you haven't created
 * your own definition of the ListBuilder class.
 */
require './ListBuilder.php';
echo new ListBuilder($wines);
