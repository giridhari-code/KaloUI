<?php

function createHeroComponent(string $title, string $subtitle, string $imageUrl, string $buttonText = null, string $buttonUrl = null, string $customClasses = ''): string
{
    $buttonHtml = '';
    if ($buttonText && $buttonUrl) {
        $buttonHtml = '<a href="' . htmlspecialchars($buttonUrl) . '" class="inline-block bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">' . htmlspecialchars($buttonText) . '</a>';
    }

    return <<<HTML
    <div class="hero-component relative {$customClasses}">
        <div class="absolute inset-0">
            <img src="{$imageUrl}" alt="{$title}" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black opacity-50"></div>
        </div>
        <div class="relative z-10 text-center text-white py-16">
            <h1 class="text-4xl font-bold mb-4">{$title}</h1>
            <p class="text-lg mb-8">{$subtitle}</p>
            {$buttonHtml}
        </div>
    </div>
    HTML;
}

// Example usage:
$hero = createHeroComponent(
    "Welcome to Our Awesome Site",
    "Discover amazing things and join our community.",
    "/images/hero-background.jpg",
    "Learn More",
    "/about",
    "min-h-screen flex items-center justify-center" // Custom Tailwind classes
);

echo $hero;

?>