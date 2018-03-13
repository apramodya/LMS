<?php

// return the full degree name
function degreeName($degree){
    if ($degree == 'CS' || $degree == 'cs') return 'Computer Science';
    elseif ($degree == 'IS' || $degree == 'is') return 'Information Systems';
}