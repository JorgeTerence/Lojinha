<?php
function get($field, $filter = FILTER_DEFAULT) {
    return filter_input(INPUT_GET, $field, $filter);
}
