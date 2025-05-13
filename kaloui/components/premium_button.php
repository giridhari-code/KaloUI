<?php

class premium_button {
    public static function render(
        string $label = "Click Me",
        string $type = "primary",
        string $size = "md",
        string $icon = "",
        bool $disabled = false,
        string $animation = "fade",
        bool $isLink = false,
        string $href = "#"
    ): string {

        $classes = [
            "inline-flex items-center justify-center font-medium transition-all duration-300 gap-2 rounded-xl shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2"
        ];

        $types = [
            "primary" => "bg-blue-600 text-white hover:bg-blue-700 hover:shadow-lg",
            "outline" => "border border-blue-600 text-blue-600 hover:bg-blue-600 hover:text-white hover:shadow",
            "gradient" => "bg-gradient-to-r from-purple-500 to-indigo-600 text-white hover:from-purple-600 hover:to-indigo-700 hover:shadow-lg",
            "icon-only" => "p-2 bg-gray-100 hover:bg-gray-200 text-gray-700 rounded-full hover:shadow-md",
            "glass" => "bg-white/10 backdrop-blur-md border border-white/30 text-white hover:bg-white/20",
            "neon" => "bg-black text-white border border-lime-400 hover:shadow-[0_0_15px_lime] hover:bg-lime-500 hover:text-black",
            "frosted" => "bg-white/5 backdrop-blur-sm border border-white/20 text-white hover:bg-white/10",
            "aurora" => "bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 bg-[length:200%_200%] animate-gradient text-white",
            "shadowglow" => "bg-indigo-700 text-white shadow-lg hover:shadow-[0_0_20px_4px_rgba(99,102,241,0.6)]",
            "elevated" => "bg-white text-black hover:shadow-xl hover:scale-105 border border-gray-200",
            "reflect" => "relative bg-gray-900 text-white overflow-hidden before:absolute before:bottom-0 before:left-0 before:w-full before:h-1 before:bg-gradient-to-t before:from-white/30 before:to-transparent",
            "gradient-border" => "bg-transparent text-white border-2 border-transparent hover:border-white bg-gradient-to-r from-blue-400 to-pink-500 bg-clip-border",
            "morphing" => "bg-purple-600 text-white transition-transform hover:rounded-3xl hover:scale-105"
        ];

        $sizes = [
            "sm" => "text-sm px-3 py-1.5",
            "md" => "text-base px-4 py-2",
            "lg" => "text-lg px-5 py-3",
            "xl" => "text-xl px-6 py-3.5"
        ];

        $animations = [
            "fade" => "hover:opacity-90",
            "pulse" => "hover:animate-pulse",
            "zoom" => "hover:scale-110",
            "slide" => "hover:translate-x-1",
            "spin" => "hover:animate-spin",
            "bounce" => "hover:animate-bounce"
        ];

        if (isset($types[$type])) $classes[] = $types[$type];
        if (isset($sizes[$size])) $classes[] = $sizes[$size];
        if (isset($animations[$animation])) $classes[] = $animations[$animation];
        if ($disabled) $classes[] = "opacity-50 cursor-not-allowed";

        $classStr = implode(" ", $classes);
        $content = $icon ? "<span class='flex items-center gap-2'>$icon<span>$label</span></span>" : $label;

        if ($isLink) {
            return "<a href='$href' class='$classStr' data-role='kalo-button'" . ($disabled ? " aria-disabled='true'" : "") . ">$content</a>";
        } else {
            return "<button class='$classStr' data-role='kalo-button'" . ($disabled ? " disabled" : "") . ">$content</button>";
        }
    }
}
