<?php
$initialArray = [
    ['id' => '1', 'parent_id' => '2'],
    ['id' => '2', 'parent_id' => '3'],
    ['id' => '3', 'parent_id' => '4'],
    ['id' => '4', 'parent_id' => '2'],
    ['id' => '5', 'parent_id' => '2'],
    ['id' => '6', 'parent_id' => '3'],
    ['id' => '7', 'parent_id' => '4'],
    ['id' => '8', 'parent_id' => '5'],
    ['id' => '9', 'parent_id' => '6'],
    ['id' => '10', 'parent_id' => '3'],
    ['id' => '11', 'parent_id' => '3'],
    ['id' => '12', 'parent_id' => '2'],
    ['id' => '13', 'parent_id' => '2'],
    ['id' => '14', 'parent_id' => '2'],
    ['id' => '15', 'parent_id' => '3'],
    ['id' => '16', 'parent_id' => '4'],
    ['id' => '17', 'parent_id' => '2'],
    ['id' => '18', 'parent_id' => '2'],
    ['id' => '19', 'parent_id' => '3'],
    ['id' => '20', 'parent_id' => '4'],
    ['id' => '21', 'parent_id' => '5'],
    ['id' => '22', 'parent_id' => '6'],
    ['id' => '23', 'parent_id' => '3'],
    ['id' => '24', 'parent_id' => '3'],
    ['id' => '25', 'parent_id' => '2'],
    ['id' => '26', 'parent_id' => '23'],
];


function createTree($arr)
{
    $parents_arr = array();
    foreach ($arr as $key => $item) {
        $parents_arr[$item['parent_id']][$item['id']] = $item;
    }
    $treeElem = $parents_arr[array_key_first($parents_arr)];
    generateElemTree($treeElem, $parents_arr);
    return $treeElem;
}
function generateElemTree(&$treeElem, $parents_arr)
{
    foreach ($treeElem as $key => $item) {
        if (array_key_exists($key, $parents_arr)) {
            $treeElem[$key]['childs'] = $parents_arr[$key];
            unset($parents_arr[$key]);
            generateElemTree($treeElem[$key]['childs'], $parents_arr);
        }
    }
}

var_dump(createTree($initialArray));
