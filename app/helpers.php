<?php

if (! function_exists('list_implode')) {
    function list_implode($list, $conjunction = 'and', $oxford = true) {
        $list = collect()->wrap($list);

        switch ($list->count()) {
            case 0:
                return '';
            case 1:
                return $list->first();
            case 2:
                return "{$list->first()} {$conjunction} {$list->last()}";
            default:
                $last = $list->pop();
                return implode($list->all(), ', ') . ($oxford ? ',' : '') . " {$conjunction} {$last}";
        }
    }
}
