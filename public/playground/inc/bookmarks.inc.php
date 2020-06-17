<?php
/**
 * Data file.
 *
 * @link https://epi.chojna.info.pl
 * @author EPI UJ <epi@uj.edu.pl>
 * @copyright (c) 2017-2020
 */

/**
 * Find all records.
 *
 * @return array Result
 */
function find_all() : array
{
    return [
        [
            'title' => 'PHP manual',
            'url'   => 'http://php.net',
            'tags'  => [
                'PHP',
                'manual',
            ],
        ],
        [
            'title' => 'Silex',
            'url'   => 'http://silex.sensiolabs.org',
            'tags'  => [
                'PHP',
                'framework',
                'Silex',
            ],
        ],
        [
            'title' => 'Learn Git Branching',
            'url'   => 'http://learngitbranching.js.org',
            'tags'  => [
                'tools',
                'Git',
                'VCS',
                'tutorials',
            ],
        ],
        [
            'title' => 'PhpStorm',
            'url'  => 'https://www.jetbrains.com/phpstorm',
            'tags' => [
                'tools',
                'IDE',
                'PHP',
            ],
        ],
        [
            'title' => 'Twig',
            'url'  => 'http://twig.sensiolabs.org',
            'tags' => [
                'tools',
                'templates',
                'Twig',
                'Silex',
                'PHP',
            ],
        ],
    ];
}

function get_by_id(int $int): array {
    $data = find_all();

    if(isset($data[$int]) && count($data[$int])) {
        return $data[$int];
    } else {
        return [];
    }
}