
  tailwind.config = {
    theme: {
      extend: {
        colors: {
          clifford: '#da373d',
          ocean: '#1fb6ff',
        },
      },
    },
    corePlugins: {
      preflight: false, // Disable base styles if desired
    },
    experimental: {
      optimizeUniversalDefaults: true,
    },
  };

