<?php

function Skeleton($width = 'w-full', $height = 'h-4', $rounded = 'rounded-md', $extraClasses = '') {
    return "<div class=\"bg-gray-300 animate-pulse $width $height $rounded $extraClasses\"></div>";
}
