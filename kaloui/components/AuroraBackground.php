<?php
namespace kaloui\components;

class AuroraBackground {
  public static function render(string $children = '', bool $showRadialGradient = true, string $className = ''): void {
    $maskClass = $showRadialGradient
      ? '[mask-image:radial-gradient(ellipse_at_100%_0%,black_10%,var(--transparent)_70%)]'
      : '';

    $styles = "
      --aurora: repeating-linear-gradient(100deg,#3b82f6_10%,#a5b4fc_15%,#93c5fd_20%,#ddd6fe_25%,#60a5fa_30%);
      --dark-gradient: repeating-linear-gradient(100deg,#000_0%,#000_7%,transparent_10%,transparent_12%,#000_16%);
      --white-gradient: repeating-linear-gradient(100deg,#fff_0%,#fff_7%,transparent_10%,transparent_12%,#fff_16%);
      --blue-300: #93c5fd;
      --blue-400: #60a5fa;
      --blue-500: #3b82f6;
      --indigo-300: #a5b4fc;
      --violet-200: #ddd6fe;
      --black: #000;
      --white: #fff;
      --transparent: transparent;
    ";

    echo <<<HTML
    <main>
      <div class="transition-bg relative flex h-[100vh] flex-col items-center justify-center bg-zinc-50 text-slate-950 dark:bg-zinc-900 $className" style="$styles">
        <div class="absolute inset-0 overflow-hidden">
          <div class="pointer-events-none absolute -inset-[10px]
            [background-image:var(--white-gradient),var(--aurora)]
            [background-size:300%,_200%]
            [background-position:50%_50%,50%_50%]
            opacity-50 blur-[10px] invert filter will-change-transform
            after:animate-aurora
            after:absolute after:inset-0
            after:[background-image:var(--white-gradient),var(--aurora)]
            after:[background-size:200%,_100%]
            after:[background-attachment:fixed]
            after:mix-blend-difference after:content-['']
            dark:[background-image:var(--dark-gradient),var(--aurora)]
            dark:invert-0
            after:dark:[background-image:var(--dark-gradient),var(--aurora)]
            $maskClass"></div>
        </div>
        $children
      </div>
    </main>
HTML;
  }
}


// new

class AuroraBackground2 {
  public static function render(string $children = '', bool $showRadialGradient = true, string $className = ''): void {
    $maskClass = $showRadialGradient
      ? '[mask-image:radial-gradient(ellipse_at_100%_0%,black_10%,var(--transparent)_70%)]'
      : '';

    $styles = "
      --aurora: repeating-linear-gradient(100deg,#3b82f6_10%,#a5b4fc_15%,#93c5fd_20%,#ddd6fe_25%,#60a5fa_30%);
      --dark-gradient: repeating-linear-gradient(100deg,#000_0%,#000_7%,transparent_10%,transparent_12%,#000_16%);
      --white-gradient: repeating-linear-gradient(100deg,#fff_0%,#fff_7%,transparent_10%,transparent_12%,#fff_16%);
      --blue-300: #93c5fd;
      --blue-400: #60a5fa;
      --blue-500: #3b82f6;
      --indigo-300: #a5b4fc;
      --violet-200: #ddd6fe;
      --black: #000;
      --white: #fff;
      --transparent: transparent;
    ";

    echo <<<HTML
    <main>
      <div class="transition-bg relative flex h-[100vh] flex-col items-center justify-center bg-zinc-50 text-slate-950 dark:bg-zinc-900 $className" style="$styles">
        <!-- Aurora Gradient Layer -->
        <div class="absolute inset-0 overflow-hidden">
          <div class="pointer-events-none absolute -inset-[10px]
            [background-image:var(--white-gradient),var(--aurora)]
            [background-size:300%,_200%]
            [background-position:50%_50%,50%_50%]
            opacity-50 blur-[10px] invert filter will-change-transform
            after:animate-aurora
            after:absolute after:inset-0
            after:[background-image:var(--white-gradient),var(--aurora)]
            after:[background-size:200%,_100%]
            after:[background-attachment:fixed]
            after:mix-blend-difference after:content-['']
            dark:[background-image:var(--dark-gradient),var(--aurora)]
            dark:invert-0
            after:dark:[background-image:var(--dark-gradient),var(--aurora)]
            $maskClass"></div>
        </div>

        <!-- Stars / Sparks SVG Layer -->
        <svg class="absolute inset-0 w-full h-full -z-10 pointer-events-none opacity-20 animate-stars" viewBox="0 0 800 600" preserveAspectRatio="xMidYMid slice">
          <defs>
            <radialGradient id="starGradient" cx="50%" cy="50%" r="50%">
              <stop offset="0%" stop-color="white" stop-opacity="1" />
              <stop offset="100%" stop-color="white" stop-opacity="0" />
            </radialGradient>
          </defs>
          <!-- Random stars -->
          <g fill="url(#starGradient)">
HTML;

    for ($i = 0; $i < 50; $i++) {
      $x = rand(0, 800);
      $y = rand(0, 600);
      $r = rand(1, 3);
      echo "<circle cx=\"$x\" cy=\"$y\" r=\"$r\" />\n";
    }

    echo <<<HTML
          </g>
        </svg>

        <!-- Content -->
        $children
      </div>
    </main>
HTML;
  }
}

// new 3

class ShootingStars
{
    public static function render(string $content = '<h1>Improved UI</h1><p>More SVG variety and animations!</p>', array $options = []): void
    {
        $gradientColors = $options['gradient'] ?? [
            '#E0E5EC', '#F0F2F5', '#D1D5DB', '#B8C2CC', '#E0E5EC'
        ];
        $gradientCss = "repeating-linear-gradient(135deg," . implode(',', array_map(fn($c, $i) => "$c " . (($i + 1) * 12) . "%", $gradientColors, array_keys($gradientColors))) . ")";

        $svgViewBoxWidth = 800;
        $svgViewBoxHeight = 600;

        // Define an array of different rock meteor paths (scaled to be small)
        $rockMeteorPaths = [
            "M5,0 C0,0 0,5 2,7 S3,12 5,12 S10,12 8,7 S10,0 5,0 Z M4,4.5 A0.5,0.5 0 1,0 5,5.5 A0.5,0.5 0 0,0 4,4.5 Z", // Original rock
            "M0,5 Q5,-2 10,5 Q15,12 10,10 Q5,12 0,5 Z M4,6 A0.8,0.8 0 1,0 5.6,6 A0.8,0.8 0 0,0 4,6 Z", // Smoother, droplet like
            "M2,2 L8,0 L10,6 L4,10 L0,8 L2,2 Z M5,4.5 A0.7,0.7 0 1,1 6.4,4.5 A0.7,0.7 0 0,1 5,4.5 Z", // Angular rock
            "M0,5 L6,0 L12,5 L9,11 L3,11 L0,5 Z M6,3 L7,5 L5,5 Z" // Crystal like
        ];

        ob_start();
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        @keyframes aurora {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        @keyframes shooting-star {
            0% { opacity: 0; transform: translate(0, 0) scaleX(1); }
            10% { opacity: 1; }
            100% { opacity: 0; transform: translate(var(--tx), var(--ty)) scaleX(0.3); }
        }

        @keyframes meteor {
            0% { opacity: 0; transform: translate(0, 0) scale(1); }
            10% { opacity: 1; }
            100% { opacity: 0; transform: translate(var(--tx-meteor), var(--ty-meteor)) scale(0.5); }
        }

        @keyframes rock-meteor-anim {
            0% {
                opacity: 0;
                transform: translate(0,0) scale(var(--rock-scale, 1)) rotate(0deg);
            }
            10% { opacity: 1; }
            100% {
                opacity: 0;
                transform: translate(var(--tx-rock), var(--ty-rock))
                           scale(var(--rock-scale-end, calc(var(--rock-scale, 1) * 0.4))) /* Shrinks more at end */
                           rotate(var(--rock-rotate-end, 270deg));
            }
        }
        
        @keyframes pulsate-star {
            0% { opacity: var(--star-opacity-base, 0.3); transform: scale(1); }
            100% { opacity: var(--star-opacity-pulse, 0.7); transform: scale(1.18); } /* Increased pulse scale */
        }

        .shooting-star {
            stroke: #2563EB;
            stroke-width: 1.5;
            stroke-linecap: round;
            filter: drop-shadow(0 0 4px #60A5FA);
            animation: shooting-star ease-in-out infinite;
            transform-origin: var(--origin-x, 0%) 50%;
            transform-box: fill-box;
        }

        .meteor {
            stroke: #1D4ED8;
            stroke-width: 2.5;
            stroke-linecap: round;
            filter: drop-shadow(0 0 5px #3B82F6);
            animation: meteor ease-out infinite;
        }

        .rock-meteor {
            fill: #7D8A99;
            stroke: #4A5568;
            stroke-width: 0.3;
            animation: rock-meteor-anim ease-out infinite;
            filter: drop-shadow(0 0 3px #2D3748);
        }

        .static-star-pulsate {
            animation: pulsate-star ease-in-out infinite alternate; /* Added alternate for smooth back and forth */
        }
    </style>
</head>
<body class="h-screen w-screen overflow-hidden bg-gradient-to-br from-[#E5E7EB] via-[#F3F4F6] to-[#D1D5DB] text-gray-800 dark:text-gray-700 relative">

<div class="absolute inset-0 -z-20">
    <div class="w-full h-full blur-3xl opacity-70"
         style="background-image: <?php echo htmlspecialchars($gradientCss); ?>;
                background-size: 300% 300%;
                animation: aurora 60s ease-in-out infinite;">
    </div>
</div>

<svg class="absolute inset-0 w-full h-full -z-10" viewBox="0 0 <?php echo $svgViewBoxWidth; ?> <?php echo $svgViewBoxHeight; ?>" preserveAspectRatio="xMidYMid slice">
    <g>
    <?php
    // Static Stars
    $numStaticStars = $options['staticStarsCount'] ?? 40;
    for ($i = 0; $i < $numStaticStars; $i++) {
        $cx = rand(0, $svgViewBoxWidth);
        $cy = rand(0, $svgViewBoxHeight);
        $r = rand(10, 40) / 30.0; // Adjusted size for better visibility
        $baseOpacity = rand(25, 55) / 100.0;
        $isPulsating = (rand(1, 4) == 1); // 25% chance to pulsate

        if ($isPulsating) {
            $pulsateOpacityMax = min(1, $baseOpacity + (rand(20, 40)/100.0));
            echo "<circle cx='$cx' cy='$cy' r='$r' fill='#4A5568' class='static-star-pulsate' ".
                 "style='--star-opacity-base:{$baseOpacity}; --star-opacity-pulse:{$pulsateOpacityMax}; animation-duration:".(rand(20,50)/10.0)."s; animation-delay:-".(rand(0,50)/10.0)."s;'/>\n";
        } else {
            echo "<circle cx='$cx' cy='$cy' r='$r' fill='#4A5568' opacity='{$baseOpacity}'/>\n";
        }
    }

    // Shooting stars (lines) - Reduced count for cleaner look with rocks
    $numShootingStars = $options['shootingStarsCount'] ?? 8;
    for ($i = 0; $i < $numShootingStars; $i++) {
        $x1 = rand(0, $svgViewBoxWidth); $y1 = rand(0, (int)($svgViewBoxHeight * 0.4));
        $angleDeg = rand(220, 320); $angleRad = deg2rad($angleDeg);
        $len = rand(50, 120);
        $x2 = $x1 + $len * cos($angleRad); $y2 = $y1 + $len * sin($angleRad);
        $dx = $x2 - $x1; $dy = $y2 - $y1;
        $travelFactor = 1.8 + (rand(0,12)/10.0);
        $animTx = $dx * $travelFactor; $animTy = $dy * $travelFactor;
        $transformOriginX = ($dx >= 0) ? '0%' : '100%';
        $delay = rand(0, 150) / 10.0; // Increased max delay
        $duration = rand(6, 12) + (rand(0,10)/10.0);
        echo "<line x1='$x1' y1='$y1' x2='$x2' y2='$y2' class='shooting-star' style='--tx:{$animTx}; --ty:{$animTy}; --origin-x:{$transformOriginX}; animation-delay:{$delay}s; animation-duration:{$duration}s;' />\n";
    }

    // Meteors (lines) - Reduced count
    $numMeteors = $options['meteorsCount'] ?? 5;
    for ($i = 0; $i < $numMeteors; $i++) {
        $x1_meteor = rand(0, $svgViewBoxWidth); $y1_meteor = rand(0, (int)($svgViewBoxHeight * 0.6));
        $meteorAngleDeg = rand(230, 310); $meteorAngleRad = deg2rad($meteorAngleDeg);
        $meteorLen = rand(30, 60);
        $x2_meteor = $x1_meteor + $meteorLen * cos($meteorAngleRad); $y2_meteor = $y1_meteor + $meteorLen * sin($meteorAngleRad);
        $dx_meteor = $x2_meteor - $x1_meteor; $dy_meteor = $y2_meteor - $y1_meteor;
        $meteorTravelFactor = 2.2 + (rand(0,10)/10.0);
        $animTxMeteor = $dx_meteor * $meteorTravelFactor; $animTyMeteor = $dy_meteor * $meteorTravelFactor;
        $delay_meteor = rand(0, 200) / 10.0; // Increased max delay
        $duration_meteor = rand(8, 16) + (rand(0,10)/10.0);
        echo "<line x1='$x1_meteor' y1='$y1_meteor' x2='$x2_meteor' y2='$y2_meteor' class='meteor' style='--tx-meteor:{$animTxMeteor}; --ty-meteor:{$animTyMeteor}; animation-delay:{$delay_meteor}s; animation-duration:{$duration_meteor}s;' />\n";
    }

    // Rock Meteors (paths)
    $numRockMeteors = $options['rockMeteorsCount'] ?? 5; // Slightly increased rock meteors
    for ($i = 0; $i < $numRockMeteors; $i++) {
        $rockX = rand(0, $svgViewBoxWidth); $rockY = rand(0, (int)($svgViewBoxHeight * 0.2));
        $rockScale = (rand(10, 22) / 10.0); // Scale factor 1.0x to 2.2x
        $rockAngleDeg = rand(240, 300); $rockAngleRad = deg2rad($rockAngleDeg);
        $rockTravelDist = rand( (int)($svgViewBoxHeight * 0.7), (int)($svgViewBoxHeight * 1.4) );
        
        $animTxRock = $rockTravelDist * cos($rockAngleRad);
        $animTyRock = $rockTravelDist * sin($rockAngleRad);
        $rockRotateEnd = rand(-450, 450); // More varied end rotation

        $delay_rock = rand(0, 220) / 10.0; // Increased max delay
        $duration_rock = rand(8, 18) + (rand(0,10)/10.0); // Slightly longer duration possible
        
        $currentRockPath = $rockMeteorPaths[array_rand($rockMeteorPaths)]; // Randomly select a path

        echo "<g transform='translate({$rockX}, {$rockY})' class='rock-meteor' style='--rock-scale:{$rockScale}; --tx-rock:{$animTxRock}; --ty-rock:{$animTyRock}; --rock-rotate-end:{$rockRotateEnd}deg; animation-delay:{$delay_rock}s; animation-duration:{$duration_rock}s;'>";
        echo "<path d='{$currentRockPath}' />";
        echo "</g>\n";
    }
    ?>
    </g>
</svg>

<?php echo $content; ?>


</body>
</html>
        <?php
        echo ob_get_clean();
    }
}

// Example Usage:
/*
ShootingStars::render(
    '<h1>UI Version 3</h1><p>Featuring varied rock meteors and pulsating stars.</p>',
    [
        'staticStarsCount' => 50,
        'shootingStarsCount' => 7,
        'meteorsCount' => 4,
        'rockMeteorsCount' => 6
    ]
);
*/

